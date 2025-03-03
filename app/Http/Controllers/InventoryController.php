<?php
namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\InventoryUsage;
use App\Models\Appointment;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventoryController extends Controller
{
    /* Display a listing of the inventory items.*/
    public function index()
    {
        // Get inventory items (excluding hidden placeholder items)
        $inventoryItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->get();

        // Get counts for stat cards
        $totalItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->count();

        $lowStockItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->whereRaw('quantity <= minimum_stock_level AND quantity > 0')
            ->count();

        $outOfStockItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->where('quantity', '<=', 0)
            ->count();

        // Get unique categories from inventory table
        $existingCategories = DB::table('inventory')
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Default categories that should always be available
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];

        // Combine existing and default categories, remove duplicates
        $allCategories = array_unique(array_merge($existingCategories, $defaultCategories));
        sort($allCategories); // Sort alphabetically

        // Get today's appointments
        $todaysAppointments = DB::table('appointments')
            ->whereDate('date', date('Y-m-d'))
            ->orderBy('time')
            ->get();

        // Get upcoming appointments (next 7 days)
        $upcomingAppointments = DB::table('appointments')
            ->whereDate('date', '>', date('Y-m-d'))
            ->whereDate('date', '<=', date('Y-m-d', strtotime('+7 days')))
            ->orderBy('date')
            ->orderBy('time')
            ->get();
            
        // Fetch recent activities
        $recentActivities = Activity::with('user', 'item')
            ->latest()
            ->get();

        return view('admin.inventory', compact(
            'inventoryItems',
            'totalItems',
            'lowStockItems',
            'outOfStockItems',
            'allCategories',
            'todaysAppointments',
            'upcomingAppointments',
            'recentActivities'
        ));
    }

    /* Store a newly created inventory item in storage. */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'minimum_stock_level' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // Check if an item with the same name and category already exists
        $existingItem = DB::table('inventory')
            ->where('item_name', $request->item_name)
            ->where('category', $request->category)
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->first();

        if ($existingItem) {
            // Calculate new quantity
            $newQuantity = $existingItem->quantity + $request->quantity;

            // Determine status based on quantity and minimum stock level
            $status = 'In Stock';
            if ($newQuantity <= 0) {
                $status = 'Out of Stock';
            } elseif ($newQuantity <= $request->minimum_stock_level) {
                $status = 'Low Stock';
            }

            // Add note about the addition
            $additionNote = Carbon::now()->format('Y-m-d H:i') .
                " - Added " . $request->quantity . " " . $request->unit;
            if ($request->notes) {
                $additionNote .= ". Notes: " . $request->notes;
            }
            $notes = $existingItem->notes ? $existingItem->notes . "\n" . $additionNote : $additionNote;

            // Update existing item
            DB::table('inventory')
                ->where('id', $existingItem->id)
                ->update([
                    'quantity' => $newQuantity,
                    'unit' => $request->unit,
                    'minimum_stock_level' => $request->minimum_stock_level,
                    'expiry_date' => $request->expiry_date,
                    'status' => $status,
                    'notes' => $notes,
                ]);
                
            // Log the activity
            $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> added ' .
                          '<span class="font-medium">' . e($request->quantity) . ' ' . e($request->unit) . ' of ' . e($existingItem->item_name) . '</span> to inventory';
            
            Activity::log('add', $description, Auth::id(), $existingItem->id);

            return redirect()->route('admin.inventory')
                ->with('success', 'Inventory item updated successfully.');
        }

        // If no existing item, create a new one
        // Determine status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($request->quantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($request->quantity <= $request->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Create data array
        $data = [
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'minimum_stock_level' => $request->minimum_stock_level,
            'expiry_date' => $request->expiry_date,
            'status' => $status,
            'notes' => $request->notes,
        ];

        $itemId = DB::table('inventory')->insertGetId($data);
        
        // Log the activity
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> created new item ' .
                      '<span class="font-medium">' . e($request->item_name) . '</span> with quantity ' .
                      '<span class="font-medium">' . e($request->quantity) . ' ' . e($request->unit) . '</span>';
        
        Activity::log('add', $description, Auth::id(), $itemId);

        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item created successfully.');
    }

    /*  Show the form for editing the specified inventory item. */
    public function edit($id)
    {
        $item = DB::table('inventory')->where('id', $id)->first();
        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        return response()->json(['item' => $item]);
    }

    /* Update the specified inventory item in storage. */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'minimum_stock_level' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // Get the current item to compare values
        $currentItem = DB::table('inventory')->where('id', $id)->first();
        if (!$currentItem) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }

        // Determine status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($request->quantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($request->quantity <= $request->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Add note about quantity change if it's different
        $notes = $request->notes;
        if ($currentItem->quantity != $request->quantity) {
            $changeNote = Carbon::now()->format('Y-m-d H:i') .
                " - Quantity changed from " . $currentItem->quantity .
                " to " . $request->quantity;
            $notes = $notes ? $notes . "\n" . $changeNote : $changeNote;
        }

        // Update data array
        $data = [
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'minimum_stock_level' => $request->minimum_stock_level,
            'expiry_date' => $request->expiry_date,
            'status' => $status,
            'notes' => $notes,
        ];

        DB::table('inventory')
            ->where('id', $id)
            ->update($data);
            
        // Log the activity
        $changes = [];
        if ($currentItem->item_name != $request->item_name) {
            $changes[] = 'name';
        }
        if ($currentItem->quantity != $request->quantity) {
            $changes[] = 'quantity';
        }
        if ($currentItem->minimum_stock_level != $request->minimum_stock_level) {
            $changes[] = 'minimum stock level';
        }
        if ($currentItem->category != $request->category) {
            $changes[] = 'category';
        }
        
        $changeText = count($changes) > 0 
            ? ' (' . implode(', ', $changes) . ')' 
            : '';
            
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> updated ' .
                      '<span class="font-medium">' . e($request->item_name) . '</span>' . $changeText;
        
        Activity::log('edit', $description, Auth::id(), $id);

        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item updated successfully.');
    }

    /* Process an order for a critical inventory item. */
    public function orderCriticalItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:inventory,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Get the existing item
        $item = DB::table('inventory')->where('id', $request->item_id)->first();
        if (!$item) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }

        // Calculate new quantity
        $newQuantity = $item->quantity + $request->quantity;

        // Determine new status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($newQuantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($newQuantity <= $item->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Add order note
        $orderNote = Carbon::now()->format('Y-m-d H:i') .
            " - Ordered " . $request->quantity . " " . $item->unit;
        if ($request->notes) {
            $orderNote .= ". Notes: " . $request->notes;
        }
        $notes = $item->notes ? $item->notes . "\n" . $orderNote : $orderNote;

        // Update the item
        DB::table('inventory')
            ->where('id', $request->item_id)
            ->update([
                'quantity' => $newQuantity,
                'status' => $status,
                'notes' => $notes
            ]);
            
        // Log the activity
        $criticalText = $item->quantity <= $item->minimum_stock_level ? ' (critical item)' : '';
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> ordered ' .
                      '<span class="font-medium">' . e($request->quantity) . ' ' . e($item->unit) . ' of ' . e($item->item_name) . '</span>' . $criticalText;
        
        Activity::log('order', $description, Auth::id(), $item->id);

        return redirect()->route('admin.inventory')
            ->with('success', 'Order placed successfully. Inventory updated.');
    }

    /* Record usage of an inventory item.*/
    public function recordUsage(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventory,id',
            'quantity' => 'required|integer|min:1',
            'appointment_id' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        // Get the existing item
        $item = DB::table('inventory')->where('id', $request->inventory_id)->first();
        if (!$item) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }

        // Check if there's enough quantity
        if ($item->quantity < $request->quantity) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Not enough quantity available for this item.');
        }

        // Begin transaction
        DB::beginTransaction();
        try {
            // Calculate new quantity
            $newQuantity = $item->quantity - $request->quantity;

            // Determine new status based on quantity and minimum stock level
            $status = 'In Stock';
            if ($newQuantity <= 0) {
                $status = 'Out of Stock';
            } elseif ($newQuantity <= $item->minimum_stock_level) {
                $status = 'Low Stock';
            }

            // Add usage note
            $usageNote = Carbon::now()->format('Y-m-d H:i') .
                " - Used " . $request->quantity . " " . $item->unit;

            // Add appointment info if provided
            $appointmentInfo = '';
            if ($request->appointment_id && $request->appointment_id !== 'no_appointment') {
                $appointment = DB::table('appointments')->where('id', $request->appointment_id)->first();
                if ($appointment) {
                    $appointmentInfo = " for appointment with " . $appointment->patient_name .
                        " on " . date('M d, Y', strtotime($appointment->date)) .
                        " at " . date('g:i A', strtotime($appointment->time));
                    $usageNote .= $appointmentInfo;
                }
            }

            // Add additional notes if provided
            if ($request->notes) {
                $usageNote .= ". Notes: " . $request->notes;
            }
            $notes = $item->notes ? $item->notes . "\n" . $usageNote : $usageNote;

            // Update the inventory item
            DB::table('inventory')
                ->where('id', $request->inventory_id)
                ->update([
                    'quantity' => $newQuantity,
                    'status' => $status,
                    'notes' => $notes
                ]);

            // Record the usage in inventory_usage table
            $appointmentId = ($request->appointment_id && $request->appointment_id !== 'no_appointment')
                ? $request->appointment_id
                : null;
            DB::table('inventory_usage')->insert([
                'inventory_id' => $request->inventory_id,
                'appointment_id' => $appointmentId,
                'user_id' => Auth::id() ?? 1, // Default to 1 if Auth is not available
                'quantity' => $request->quantity,
                'notes' => $request->notes,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Log the activity
            $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> used ' .
                          '<span class="font-medium">' . e($request->quantity) . ' ' . e($item->unit) . ' of ' . e($item->item_name) . '</span>';
            
            if ($appointmentId) {
                $appointment = DB::table('appointments')->where('id', $appointmentId)->first();
                if ($appointment) {
                    $description .= ' for <span class="text-gray-600">appointment with ' . e($appointment->patient_name) . '</span>';
                }
            }
            
            Activity::log('use', $description, Auth::id(), $request->inventory_id);

            DB::commit();
            return redirect()->route('admin.inventory')
                ->with('success', "Successfully used {$request->quantity} {$item->unit} of {$item->item_name}.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.inventory')
                ->with('error', 'An error occurred while recording usage: ' . $e->getMessage());
        }
    }

    /* Remove the specified inventory item from storage. */
    public function destroy($id)
    {
        // Get item details before deletion for activity logging
        $item = DB::table('inventory')->where('id', $id)->first();
        
        if (!$item) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }
        
        // Log the activity before deletion
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> deleted ' .
                      '<span class="font-medium">' . e($item->item_name) . '</span> from inventory';
        
        Activity::log('delete', $description, Auth::id());
        
        $deleted = DB::table('inventory')->where('id', $id)->delete();
        
        if (!$deleted) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }
        
        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item deleted successfully.');
    }

    /* Store a new category. */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Check if category already exists
        $exists = DB::table('inventory')
            ->where('category', $request->category_name)
            ->exists();
        if ($exists) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Category already exists.');
        }

        // Add the category to the system by creating a hidden placeholder item
        DB::table('inventory')->insert([
            'item_name' => 'Category Placeholder - Do Not Use',
            'category' => $request->category_name,
            'quantity' => 0,
            'unit' => 'N/A',
            'minimum_stock_level' => 0,
            'status' => 'Hidden',
            'notes' => 'This is a placeholder item to register the category. Do not use or delete directly.'
        ]);
        
        // Log the activity
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> added new category ' .
                      '<span class="font-medium">' . e($request->category_name) . '</span>';
        
        Activity::log('category', $description, Auth::id());

        return redirect()->route('admin.inventory')
            ->with('success', 'Category added successfully.');
    }

    /*,Update a category name. */
    public function updateCategory(Request $request, $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'original_category_name' => 'required|string|max:255',
        ]);

        // Decode the URL-encoded category name
        $category = urldecode($category);

        // Check if this is a default category
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];
        if (in_array($category, $defaultCategories)) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Default categories cannot be renamed.');
        }

        // Check if the new category name already exists
        if ($request->category_name !== $request->original_category_name) {
            $exists = DB::table('inventory')
                ->where('category', $request->category_name)
                ->exists();
            if ($exists) {
                return redirect()->route('admin.inventory')
                    ->with('error', 'A category with this name already exists.');
            }
        }

        // Update all items with this category
        DB::table('inventory')
            ->where('category', $category)
            ->update(['category' => $request->category_name]);
            
        // Log the activity
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> updated category from ' .
                      '<span class="font-medium">' . e($category) . '</span> to ' .
                      '<span class="font-medium">' . e($request->category_name) . '</span>';
        
        Activity::log('category', $description, Auth::id());

        return redirect()->route('admin.inventory')
            ->with('success', 'Category updated successfully.');
    }

    /* Remove a category by deleting its placeholder item. */
    public function destroyCategory($category)
    {
        // Check if this is a default category
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];
        if (in_array($category, $defaultCategories)) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Default categories cannot be deleted.');
        }

        // Check if category has items (excluding hidden placeholder items)
        $itemsCount = DB::table('inventory')
            ->where('category', $category)
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->count();
        if ($itemsCount > 0) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Cannot delete a category that contains items. Remove or reassign the items first.');
        }
        
        // Log the activity before deletion
        $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> deleted category ' .
                      '<span class="font-medium">' . e($category) . '</span>';
        
        Activity::log('category', $description, Auth::id());

        // Delete the placeholder item for this category
        DB::table('inventory')
            ->where('category', $category)
            ->where('status', 'Hidden')
            ->delete();

        return redirect()->route('admin.inventory')
            ->with('success', 'Category deleted successfully.');
    }

    /* Display a listing of inventory usage records. */
    public function usageHistory()
    {
        // Get all usage records with related inventory and appointment data
        $usageRecords = DB::table('inventory_usage')
            ->join('inventory', 'inventory_usage.inventory_id', '=', 'inventory.id')
            ->leftJoin('appointments', 'inventory_usage.appointment_id', '=', 'appointments.id')
            ->leftJoin('users', 'inventory_usage.user_id', '=', 'users.id')
            ->select(
                'inventory_usage.*',
                'inventory.item_name',
                'inventory.category',
                'inventory.unit',
                'appointments.patient_name',
                'appointments.date as appointment_date',
                'appointments.time as appointment_time',
                'appointments.appointments as procedure',
                'users.name as user_name'
            )
            ->orderBy('inventory_usage.created_at', 'desc')
            ->paginate(20);

        return view('admin.inventory-usage', compact('usageRecords'));
    }

    /* Return unused items back to inventory. */
    public function returnUnused(Request $request)
    {
        $request->validate([
            'usage_id' => 'required|exists:inventory_usage,id',
            'return_quantity' => 'required|integer|min:1',
            'return_notes' => 'nullable|string',
        ]);

        // Get the usage record
        $usageRecord = DB::table('inventory_usage')->where('id', $request->usage_id)->first();
        if (!$usageRecord) {
            return redirect()->route('admin.inventory.usage')
                ->with('error', 'Usage record not found.');
        }

        // Check if return quantity is valid
        if ($request->return_quantity > $usageRecord->quantity) {
            return redirect()->route('admin.inventory.usage')
                ->with('error', 'Return quantity cannot be greater than the used quantity.');
        }

        // Get the inventory item
        $item = DB::table('inventory')->where('id', $usageRecord->inventory_id)->first();
        if (!$item) {
            return redirect()->route('admin.inventory.usage')
                ->with('error', 'Inventory item not found.');
        }

        // Begin transaction
        DB::beginTransaction();
        try {
            // Calculate new quantity for inventory
            $newQuantity = $item->quantity + $request->return_quantity;

            // Determine new status based on quantity and minimum stock level
            $status = 'In Stock';
            if ($newQuantity <= 0) {
                $status = 'Out of Stock';
            } elseif ($newQuantity <= $item->minimum_stock_level) {
                $status = 'Low Stock';
            }

            // Add return note
            $returnNote = Carbon::now()->format('Y-m-d H:i') .
                " - Returned " . $request->return_quantity . " " . $item->unit . " to inventory";
            if ($request->return_notes) {
                $returnNote .= ". Notes: " . $request->return_notes;
            }
            $notes = $item->notes ? $item->notes . "\n" . $returnNote : $returnNote;

            // Update the inventory item
            DB::table('inventory')
                ->where('id', $usageRecord->inventory_id)
                ->update([
                    'quantity' => $newQuantity,
                    'status' => $status,
                    'notes' => $notes
                ]);

            // Update the usage record if returning partial quantity
            if ($request->return_quantity < $usageRecord->quantity) {
                DB::table('inventory_usage')
                    ->where('id', $request->usage_id)
                    ->update([
                        'quantity' => $usageRecord->quantity - $request->return_quantity,
                        'notes' => ($usageRecord->notes ? $usageRecord->notes . "\n" : '') .
                            "Returned " . $request->return_quantity . " units on " .
                            Carbon::now()->format('Y-m-d H:i') .
                            ($request->return_notes ? ". Notes: " . $request->return_notes : ""),
                        'updated_at' => now()
                    ]);
            } else {
                // Delete the usage record if returning all
                DB::table('inventory_usage')
                    ->where('id', $request->usage_id)
                    ->delete();
            }
            
            // Log the activity
            $description = '<span class="font-medium text-blue-600">' . e(Auth::user()->name) . '</span> returned ' .
                          '<span class="font-medium">' . e($request->return_quantity) . ' ' . e($item->unit) . ' of ' . e($item->item_name) . '</span> to inventory';
            
            Activity::log('add', $description, Auth::id(), $item->id);

            DB::commit();
            return redirect()->route('admin.inventory.usage')
                ->with('success', "Successfully returned {$request->return_quantity} {$item->unit} of {$item->item_name} to inventory.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.inventory.usage')
                ->with('error', 'An error occurred while processing the return: ' . $e->getMessage());
        }
    }
    
    /* Load more activities via AJAX */
    public function loadMoreActivities(Request $request)
    {
        $skip = $request->input('skip', 0);
        $take = $request->input('take', 10);
        
        $activities = Activity::with('user', 'item')
                            ->latest()
                            ->skip($skip)
                            ->take($take)
                            ->get();
        
        return response()->json([
            'activities' => $activities
        ]);
    }
}