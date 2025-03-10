<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Status History Report</title>
    <style>
        @page {
            margin: 30px;
            size: landscape;
        }
        
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 15px;
            font-size: 12px;
            width: 100%;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #0d9488;
            padding-bottom: 10px;
        }
        
        .header h1 {
            color: #0d9488;
            margin-bottom: 5px;
            font-size: 24px;
        }
        
        .header p {
            color: #555;
            margin-top: 0;
            font-size: 14px;
        }
        
        .report-info {
            background-color: #f0fdfa;
            border: 1px solid #99f6e4;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        
        .report-info p {
            margin: 5px 0;
            width: 50%;
            box-sizing: border-box;
        }
        
        .report-info strong {
            color: #0d9488;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th {
            background-color: #0d9488;
            color: white;
            text-align: left;
            padding: 8px;
            font-size: 12px;
        }
        
        td {
            border-bottom: 1px solid #ddd;
            padding: 6px 8px;
            font-size: 11px;
        }
        
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-attended {
            background-color: #ccfbf1;
            color: #0f766e;
        }
        
        .status-unattended {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        
        .status-cancelled {
            background-color: #f3f4f6;
            color: #4b5563;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Appointment Status History Report</h1>
        <p>Status: {{ $status }}</p>
    </div>
    
    <div class="report-info">
        <p><strong>Report Date:</strong> {{ now()->format('F d, Y h:i A') }}</p>
        <p><strong>Status:</strong> {{ $status }}</p>
        <p><strong>Period:</strong> {{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}</p>
        <p><strong>Total Appointments:</strong> {{ count($appointments) }}</p>
    </div>
    
    @if(count($appointments) > 0)
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                    <th>Current Status</th>
                    <th>{{ $status }} Since/Until</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}</td>
                        <td>
                            @if(strpos($appointment->time, '-') !== false)
                                {{ $appointment->time }}
                            @else
                                {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                            @endif
                        </td>
                        <td>{{ $appointment->doctor }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($appointment->status) }}">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td>
                            @if($appointment->status == $status)
                                Since: {{ $appointment->updated_at->format('M d, Y h:i A') }}
                            @else
                                @php
                                    $statusChange = $appointment->statusHistory()
                                        ->where(function($query) use ($status) {
                                            $query->where('to_status', $status)
                                                ->orWhere('from_status', $status);
                                        })
                                        ->orderBy('created_at', 'desc')
                                        ->first();
                                @endphp
                                @if($statusChange)
                                    @if($statusChange->to_status == $status)
                                        Since: {{ $statusChange->created_at->format('M d, Y h:i A') }}
                                    @else
                                        Until: {{ $statusChange->created_at->format('M d, Y h:i A') }}
                                    @endif
                                @else
                                    @if($appointment->created_at && $status == 'Pending')
                                        Since: {{ $appointment->created_at->format('M d, Y h:i A') }}
                                        @if($appointment->status != 'Pending')
                                            <br>Until: {{ $appointment->updated_at->format('M d, Y h:i A') }} (est.)
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 30px; color: #6b7280;">
            <p>No appointments were {{ strtolower($status) }} during this period.</p>
            <p>Try adjusting your filter criteria or selecting a different date range.</p>
        </div>
    @endif
    
    <div class="footer">
        <p>Report generated on {{ now()->format('F d, Y h:i A') }}</p>
        <p>© {{ date('Y') }} Your Clinic Name. All rights reserved.</p>
    </div>
</body>
</html>