<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\User;
use App\Models\Appointment;

class GraphController extends Controller
{
    // Gets inventory category distribution data for analytics
    private function getCategoryDistributionData()
    {
        $categoryData = DB::table('inventory')
            ->select('category', DB::raw('COUNT(*) as item_count'), DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('category')
            ->orderByDesc('item_count')
            ->get();
            
        if ($categoryData->isEmpty()) {
            return collect([]);
        }
        return $categoryData;
    }

    // Gets inventory quantity data for stock level monitoring
    private function getInventoryQuantityData()
    {
        $inventoryItems = DB::table('inventory')
            ->select('id', 'item_name', 'category', 'quantity', 'unit', 'minimum_stock_level')
            ->orderByDesc('quantity')
            ->get();
            
        if ($inventoryItems->isEmpty()) {
            return collect([]);
        }
        return $inventoryItems;
    }

    // Displays inventory usage analytics dashboard
    public function inventoryGraphs(Request $request)
    {
        $period = $request->input('period', 'overall');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        
        $query = DB::table('inventory_usage')
            ->join('inventory', 'inventory_usage.inventory_id', '=', 'inventory.id')
            ->select('inventory.item_name', 'inventory.category', 'inventory.unit', DB::raw('SUM(inventory_usage.quantity) as total_used'))
            ->groupBy('inventory.id', 'inventory.item_name', 'inventory.category', 'inventory.unit');
        
        $title = 'Overall';
        if ($fromDate && $toDate) {
            $query->whereBetween('inventory_usage.created_at', [
                Carbon::parse($fromDate)->startOfDay(),
                Carbon::parse($toDate)->endOfDay()
            ]);
            $title = "Custom Range: " . Carbon::parse($fromDate)->format('M d, Y') . " - " . Carbon::parse($toDate)->format('M d, Y');
        } else {
            switch ($period) {
                case 'today':
                    $query->whereDate('inventory_usage.created_at', Carbon::today());
                    $title = 'Today';
                    break;
                case 'week':
                    $query->whereBetween('inventory_usage.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    $title = 'This Week';
                    break;
                case 'month':
                    $query->whereMonth('inventory_usage.created_at', Carbon::now()->month)
                        ->whereYear('inventory_usage.created_at', Carbon::now()->year);
                    $title = 'This Month';
                    break;
                case 'year':
                    $query->whereYear('inventory_usage.created_at', Carbon::now()->year);
                    $title = 'This Year';
                    break;
            }
        }
        
        $allItems = $query->orderByDesc('total_used')->get();
        $inventoryQuantityData = $this->getInventoryQuantityData();
        $categoryData = $this->getCategoryDistributionData();
        
        return view('admin.graphs.inventory_graphs', compact(
            'allItems',
            'period',
            'title',
            'fromDate',
            'toDate',
            'inventoryQuantityData',
            'categoryData'
        ));
    }

    // Generates PDF report for inventory usage
    public function generatePDF(Request $request)
    {
        $period = $request->input('period', 'overall');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        
        $query = DB::table('inventory_usage')
            ->join('inventory', 'inventory_usage.inventory_id', '=', 'inventory.id')
            ->select('inventory.item_name', 'inventory.category', 'inventory.unit', DB::raw('SUM(inventory_usage.quantity) as total_used'))
            ->groupBy('inventory.id', 'inventory.item_name', 'inventory.category', 'inventory.unit');
        
        $title = 'Overall';
        if ($fromDate && $toDate) {
            $query->whereBetween('inventory_usage.created_at', [
                Carbon::parse($fromDate)->startOfDay(),
                Carbon::parse($toDate)->endOfDay()
            ]);
            $title = "Custom Range: " . Carbon::parse($fromDate)->format('M d, Y') . " - " . Carbon::parse($toDate)->format('M d, Y');
        } else {
            switch ($period) {
                case 'today':
                    $query->whereDate('inventory_usage.created_at', Carbon::today());
                    $title = 'Today';
                    break;
                case 'week':
                    $query->whereBetween('inventory_usage.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    $title = 'This Week';
                    break;
                case 'month':
                    $query->whereMonth('inventory_usage.created_at', Carbon::now()->month)
                        ->whereYear('inventory_usage.created_at', Carbon::now()->year);
                    $title = 'This Month';
                    break;
                case 'year':
                    $query->whereYear('inventory_usage.created_at', Carbon::now()->year);
                    $title = 'This Year';
                    break;
            }
        }
        
        $allItems = $query->orderByDesc('total_used')->get();
        $pdf = PDF::loadView('pdf.report', compact('allItems', 'title', 'fromDate', 'toDate', 'period'));
        $filename = "inventory_usage_report_" . ($fromDate && $toDate ? "custom_range" : $period) . ".pdf";
        
        return $pdf->download($filename);
    }

    // Generates PDF report for inventory quantities
    public function generateQuantityPDF()
    {
        $inventoryItems = $this->getInventoryQuantityData();
        $pdf = PDF::loadView('pdf.quantity_report', compact('inventoryItems'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download("inventory_quantity_report.pdf");
    }

    // Generates PDF report for category distribution
    public function generateCategoryPDF()
    {
        $categoryData = $this->getCategoryDistributionData();
        $categoriesWithItems = [];
        
        foreach ($categoryData as $category) {
            $items = DB::table('inventory')
                ->where('category', $category->category)
                ->select('item_name', 'quantity', 'unit', 'minimum_stock_level')
                ->orderBy('item_name')
                ->get();
                
            $categoriesWithItems[] = [
                'category' => $category->category,
                'item_count' => $category->item_count,
                'total_quantity' => $category->total_quantity,
                'items' => $items
            ];
        }
        
        $pdf = PDF::loadView('pdf.category_report', [
            'categoryData' => $categoryData,
            'categoriesWithItems' => $categoriesWithItems
        ]);
        
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download("inventory_category_report.pdf");
    }

    // Displays user registration analytics dashboard
    public function userGraphs(Request $request)
    {
        $period = $request->input('period', 'month');
        $title = 'User Registration Analytics';
        $fromDate = null;
        $toDate = null;
        $now = Carbon::now();
        $dateLabels = [];
        
        switch ($period) {
            case 'week':
                $fromDate = $now->copy()->startOfWeek()->format('Y-m-d');
                $toDate = $now->copy()->endOfWeek()->format('Y-m-d');
                $title = 'This Week\'s User Registrations';
                
                $startDay = $now->copy()->startOfWeek();
                for ($i = 0; $i < 7; $i++) {
                    $dateLabels[] = $startDay->copy()->addDays($i)->format('Y-m-d');
                }
                break;
                
            case 'month':
                $fromDate = $now->copy()->startOfMonth()->format('Y-m-d');
                $toDate = $now->copy()->endOfMonth()->format('Y-m-d');
                $title = 'This Month\'s User Registrations';
                
                $daysInMonth = $now->daysInMonth;
                $startDay = $now->copy()->startOfMonth();
                for ($i = 0; $i < $daysInMonth; $i++) {
                    $dateLabels[] = $startDay->copy()->addDays($i)->format('Y-m-d');
                }
                break;
                
            case 'last3months':
                $fromDate = $now->copy()->subMonths(3)->startOfDay()->format('Y-m-d');
                $toDate = $now->format('Y-m-d');
                $title = 'Last 3 Months\' User Registrations';
                
                $startDate = $now->copy()->subMonths(3)->startOfDay();
                $endDate = $now->copy();
                $currentDate = $startDate->copy();
                while ($currentDate <= $endDate) {
                    $dateLabels[] = $currentDate->format('Y-m-d');
                    $currentDate->addWeek();
                }
                break;
                
            case 'last6months':
                $fromDate = $now->copy()->subMonths(6)->startOfDay()->format('Y-m-d');
                $toDate = $now->format('Y-m-d');
                $title = 'Last 6 Months\' User Registrations';
                
                $startDate = $now->copy()->subMonths(6)->startOfDay();
                $endDate = $now->copy();
                $currentDate = $startDate->copy();
                while ($currentDate <= $endDate) {
                    $dateLabels[] = $currentDate->format('Y-m-d');
                    $currentDate->addWeek();
                }
                break;
                
            case 'year':
                $fromDate = $now->copy()->startOfYear()->format('Y-m-d');
                $toDate = $now->copy()->endOfYear()->format('Y-m-d');
                $title = 'This Year\'s User Registrations';
                
                $startMonth = $now->copy()->startOfYear();
                for ($i = 0; $i < 12; $i++) {
                    $dateLabels[] = $startMonth->copy()->addMonths($i)->format('Y-m');
                }
                break;
                
            default:
                $fromDate = $now->copy()->startOfMonth()->format('Y-m-d');
                $toDate = $now->copy()->endOfMonth()->format('Y-m-d');
                $title = 'This Month\'s User Registrations';
                
                $daysInMonth = $now->daysInMonth;
                $startDay = $now->copy()->startOfMonth();
                for ($i = 0; $i < $daysInMonth; $i++) {
                    $dateLabels[] = $startDay->copy()->addDays($i)->format('Y-m-d');
                }
        }
        
        $query = User::where('user_type', 'patient')
            ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
                return $query->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59']);
            });
            
        $totalRegistrations = $query->count();
        $registrationsByDay = [];
        $connection = DB::connection()->getDriverName();
        
        if ($period === 'year') {
            if ($connection === 'mysql') {
                $registrationData = User::where('user_type', 'patient')
                    ->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
                    ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as date, COUNT(*) as count')
                    ->groupBy('date')
                    ->get()
                    ->keyBy('date');
            } else {
                $registrationData = User::where('user_type', 'patient')
                    ->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
                    ->selectRaw("strftime('%Y-%m', created_at) as date, COUNT(*) as count")
                    ->groupBy('date')
                    ->get()
                    ->keyBy('date');
            }
            
            foreach ($dateLabels as $month) {
                $registrationsByDay[] = [
                    'date' => $month,
                    'count' => $registrationData->get($month) ? $registrationData->get($month)->count : 0
                ];
            }
        } else {
            $registrationData = User::where('user_type', 'patient')
                ->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->get()
                ->keyBy('date');
                
            foreach ($dateLabels as $day) {
                $registrationsByDay[] = [
                    'date' => $day,
                    'count' => $registrationData->get($day) ? $registrationData->get($day)->count : 0
                ];
            }
        }
        
        $registrationsByGender = User::where('user_type', 'patient')
            ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
                return $query->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59']);
            })
            ->selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();
            
        $latestUsers = User::where('user_type', 'patient')
            ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
                return $query->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59']);
            })
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.graphs.user_graphs', compact(
            'period', 'fromDate', 'toDate', 'title',
            'totalRegistrations', 'registrationsByDay',
            'registrationsByGender', 'latestUsers'
        ));
    }

    // Generates PDF report for user registrations
    public function userGraphsPdf(Request $request)
    {
        $period = $request->input('period', 'month');
        $now = Carbon::now();
        $fromDate = null;
        $toDate = null;
        
        switch ($period) {
            case 'week':
                $fromDate = $now->copy()->startOfWeek()->format('Y-m-d');
                $toDate = $now->copy()->endOfWeek()->format('Y-m-d');
                $title = 'This Week\'s User Registrations';
                break;
            case 'month':
                $fromDate = $now->copy()->startOfMonth()->format('Y-m-d');
                $toDate = $now->copy()->endOfMonth()->format('Y-m-d');
                $title = 'This Month\'s User Registrations';
                break;
            case 'last3months':
                $fromDate = $now->copy()->subMonths(3)->startOfDay()->format('Y-m-d');
                $toDate = $now->format('Y-m-d');
                $title = 'Last 3 Months\' User Registrations';
                break;
            case 'last6months':
                $fromDate = $now->copy()->subMonths(6)->startOfDay()->format('Y-m-d');
                $toDate = $now->format('Y-m-d');
                $title = 'Last 6 Months\' User Registrations';
                break;
            case 'year':
                $fromDate = $now->copy()->startOfYear()->format('Y-m-d');
                $toDate = $now->copy()->endOfYear()->format('Y-m-d');
                $title = 'This Year\'s User Registrations';
                break;
            default:
                $fromDate = $now->copy()->startOfMonth()->format('Y-m-d');
                $toDate = $now->copy()->endOfMonth()->format('Y-m-d');
                $title = 'This Month\'s User Registrations';
        }
        
        $users = User::where('user_type', 'patient')
            ->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        $registrationsByGender = User::where('user_type', 'patient')
            ->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
            ->selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();
            
        $pdf = PDF::loadView('pdf.users_report', compact('users', 'title', 'fromDate', 'toDate', 'registrationsByGender'));
        return $pdf->download('user_registrations_report.pdf');
    }

    // Displays appointment analytics dashboard by status
    public function appointmentGraphs(Request $request)
    {
        $filter = $request->filter ?? 'today';
        $status = $request->status ?? 'Pending';
        
        $dateRange = $this->getDateRange($filter);
        $startDate = $dateRange['start_date'];
        $endDate = $dateRange['end_date'];
        
        $baseQuery = Appointment::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date');
            
        switch ($status) {
            case 'Pending':
                $appointments = $baseQuery->get();
                break;
            case 'Approved':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Approved')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Approved');
                        });
                })->get();
                break;
            case 'Attended':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Attended')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Attended');
                        });
                })->get();
                break;
            case 'Unattended':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Unattended')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Unattended');
                        });
                })->get();
                break;
            case 'Cancelled':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Cancelled')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Cancelled');
                        });
                })->get();
                break;
            default:
                $appointments = $baseQuery->where('status', $status)->get();
        }
        
        $period = new \DatePeriod(
            new \DateTime($startDate),
            new \DateInterval('P1D'),
            (new \DateTime($endDate))->modify('+1 day')
        );
        
        $dates = [];
        $counts = [];
        $formattedDates = [];
        
        if ($status === 'Pending') {
            $appointmentsByDate = $appointments->groupBy(function($appointment) {
                return Carbon::parse($appointment->created_at)->format('Y-m-d');
            })->map->count();
        } else {
            $appointmentsByDate = [];
            foreach ($appointments as $appointment) {
                if ($appointment->status === $status) {
                    $statusChange = $appointment->statusHistory()
                        ->where('to_status', $status)
                        ->orderBy('created_at', 'desc')
                        ->first();
                    $dateEntered = $statusChange ?
                        Carbon::parse($statusChange->created_at) :
                        Carbon::parse($appointment->updated_at);
                } else {
                    $statusChange = $appointment->statusHistory()
                        ->where('to_status', $status)
                        ->orderBy('created_at', 'asc')
                        ->first();
                    if (!$statusChange) continue;
                    $dateEntered = Carbon::parse($statusChange->created_at);
                }
                
                if ($dateEntered->between(Carbon::parse($startDate), Carbon::parse($endDate)->endOfDay())) {
                    $dateKey = $dateEntered->format('Y-m-d');
                    if (!isset($appointmentsByDate[$dateKey])) {
                        $appointmentsByDate[$dateKey] = 0;
                    }
                    $appointmentsByDate[$dateKey]++;
                }
            }
        }
        
        foreach ($period as $date) {
            $dateString = $date->format('Y-m-d');
            $formattedDate = $date->format('M d');
            
            if ($filter == 'this_month' || $filter == 'last_3_months' || $filter == 'last_6_months') {
                $formattedDate = $date->format('M d');
            } elseif ($filter == 'this_year') {
                $formattedDate = $date->format('M');
                if (isset($dates[$formattedDate])) {
                    $counts[$formattedDate] += $appointmentsByDate[$dateString] ?? 0;
                    continue;
                }
            }
            
            $dates[] = $formattedDate;
            $counts[] = $appointmentsByDate[$dateString] ?? 0;
            $formattedDates[$dateString] = $formattedDate;
        }
        
        if ($filter == 'all_time') {
            $dates = [];
            $counts = [];
            
            if ($status === 'Pending') {
                $groupedByMonthYear = $appointments->groupBy(function($appointment) {
                    return Carbon::parse($appointment->created_at)->format('Y-m');
                });
            } else {
                $groupedByMonthYear = [];
                
                foreach ($appointments as $appointment) {
                    if ($appointment->status === $status) {
                        $statusChange = $appointment->statusHistory()
                            ->where('to_status', $status)
                            ->orderBy('created_at', 'desc')
                            ->first();
                        $dateEntered = $statusChange ?
                            Carbon::parse($statusChange->created_at) :
                            Carbon::parse($appointment->updated_at);
                    } else {
                        $statusChange = $appointment->statusHistory()
                            ->where('to_status', $status)
                            ->orderBy('created_at', 'asc')
                            ->first();
                        if (!$statusChange) continue;
                        $dateEntered = Carbon::parse($statusChange->created_at);
                    }
                    
                    $monthYearKey = $dateEntered->format('Y-m');
                    if (!isset($groupedByMonthYear[$monthYearKey])) {
                        $groupedByMonthYear[$monthYearKey] = [];
                    }
                    $groupedByMonthYear[$monthYearKey][] = $appointment;
                }
            }
            
            foreach ($groupedByMonthYear as $monthYear => $appointmentsInMonth) {
                $dates[] = Carbon::parse($monthYear . '-01')->format('M Y');
                $counts[] = count($appointmentsInMonth);
            }
        }
        
        return view('admin.graphs.appointments_graphs', [
            'appointments' => $appointments,
            'dates' => json_encode($dates),
            'counts' => json_encode($counts),
            'filter' => $filter,
            'status' => $status,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    // Generates PDF report for appointments by status
    public function appointmentGraphsPdf(Request $request)
    {
        $filter = $request->filter ?? 'today';
        $status = $request->status ?? 'Pending';
        
        $dateRange = $this->getDateRange($filter);
        $startDate = $dateRange['start_date'];
        $endDate = $dateRange['end_date'];
        
        $baseQuery = Appointment::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date');
            
        switch ($status) {
            case 'Pending':
                $appointments = $baseQuery->get();
                break;
            case 'Approved':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Approved')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Approved');
                        });
                })->get();
                break;
            case 'Attended':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Attended')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Attended');
                        });
                })->get();
                break;
            case 'Unattended':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Unattended')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Unattended');
                        });
                })->get();
                break;
            case 'Cancelled':
                $appointments = $baseQuery->where(function($query) {
                    $query->where('status', 'Cancelled')
                        ->orWhereHas('statusHistory', function($q) {
                            $q->where('to_status', 'Cancelled');
                        });
                })->get();
                break;
            default:
                $appointments = $baseQuery->where('status', $status)->get();
        }
        
        $pdf = PDF::loadView('pdf.appointments_graphs_pdf', [
            'appointments' => $appointments,
            'filter' => $filter,
            'status' => $status,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream($status . '_appointments_' . $filter . '.pdf');
    }

    // Helper function to get date range based on filter
    private function getDateRange($filter)
    {
        $now = Carbon::now();
        
        switch ($filter) {
            case 'today':
                $startDate = $now->copy()->startOfDay();
                $endDate = $now->copy()->endOfDay();
                break;
            case 'this_week':
                $startDate = $now->copy()->startOfWeek();
                $endDate = $now->copy()->endOfWeek();
                break;
            case 'this_month':
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;
            case 'last_30_days':
                $startDate = $now->copy()->subDays(29)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                break;
            case 'last_3_months':
                $startDate = $now->copy()->subMonths(3)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                break;
            case 'last_90_days':
                $startDate = $now->copy()->subDays(89)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                break;
            case 'last_6_months':
                $startDate = $now->copy()->subMonths(6)->startOfDay();
                $endDate = $now->copy()->endOfDay();
                break;
            case 'this_year':
                $startDate = $now->copy()->startOfYear();
                $endDate = $now->copy()->endOfYear();
                break;
            case 'all_time':
                $firstAppointment = Appointment::orderBy('date', 'asc')->first();
                $startDate = $firstAppointment ? Carbon::parse($firstAppointment->date)->startOfMonth() : $now->copy()->subYear()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;
            default:
                $startDate = $now->copy()->startOfDay();
                $endDate = $now->copy()->endOfDay();
        }
        
        return [
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d')
        ];
    }
}