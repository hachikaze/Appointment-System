<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Patient Records - {{ $patientName }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 20px;
            color: #2c7a7b; /* teal-700 */
            margin: 0 0 5px 0;
        }
        h2 {
            font-size: 16px;
            color: #2c7a7b; /* teal-700 */
            margin: 15px 0 10px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #e2e8f0;
        }
        .patient-info {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0fdfa; /* teal-50 */
            border: 1px solid #bae6fd; /* teal-200 */
            border-radius: 5px;
        }
        .info-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            font-weight: bold;
            width: 150px;
            color: #2c7a7b; /* teal-700 */
        }
        .info-value {
            display: table-cell;
        }
        table.records {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.records th {
            background-color: #e6fffa; /* teal-100 */
            color: #2c7a7b; /* teal-700 */
            font-weight: bold;
            text-align: left;
            padding: 8px;
            font-size: 11px;
            border: 1px solid #bae6fd; /* teal-200 */
        }
        table.records td {
            padding: 8px;
            border: 1px solid #e2e8f0;
            font-size: 11px;
        }
        table.records tr:nth-child(even) {
            background-color: #f7fafc;
        }
        .status {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }
        .status-attended {
            background-color: #c6f6d5; /* green-100 */
            color: #276749; /* green-800 */
        }
        .status-approved {
            background-color: #bee3f8; /* blue-100 */
            color: #2c5282; /* blue-800 */
        }
        .status-pending {
            background-color: #fefcbf; /* yellow-100 */
            color: #975a16; /* yellow-800 */
        }
        .status-unattended {
            background-color: #fed7aa; /* orange-100 */
            color: #9c4221; /* orange-800 */
        }
        .status-cancelled {
            background-color: #fed7d7; /* red-100 */
            color: #9b2c2c; /* red-800 */
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #718096;
        }
        .page-break {
            page-break-after: always;
        }
        .summary {
            margin-bottom: 15px;
        }
        .summary-item {
            display: inline-block;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- You can add your clinic/hospital logo here -->
        <!-- <img src="{{ public_path('images/logo.png') }}" class="logo"> -->
        <h1>Patient Medical Records</h1>
        <p>Generated on: {{ date('F d, Y') }}</p>
    </div>

    <div class="patient-info">
        <h2>Patient Information</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Patient Name:</div>
                <div class="info-value">{{ $patientName }}</div>
            </div>
            @if($patientInfo)
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $patientInfo->email ?? 'N/A' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Phone:</div>
                <div class="info-value">{{ $patientInfo->phone ?? 'N/A' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Doctor:</div>
                <div class="info-value">{{ $patientInfo->doctor ?? 'N/A' }}</div>
            </div>
            @endif
        </div>
    </div>

    <h2>Appointment Records {{ $statusFilter !== 'all' ? "($statusFilter)" : '' }}</h2>
    
    @if($records->count() > 0)
        <div class="summary">
            @php
                $statusCounts = $records->groupBy('status')->map->count();
            @endphp
            
            <strong>Summary:</strong>
            @foreach($statusCounts as $status => $count)
                <span class="summary-item">{{ $status }}: {{ $count }}</span>
            @endforeach
            <span class="summary-item">Total: {{ $records->count() }}</span>
        </div>
        
        <table class="records">
            <thead>
                <tr>
                    <th width="15%">Date</th>
                    <th width="10%">Time</th>
                    <th width="30%">Appointment</th>
                    <th width="15%">Status</th>
                    <th width="30%">Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{ $record->date }}</td>
                    <td>{{ $record->time }}</td>
                    <td>{{ $record->appointments }}</td>
                    <td>
                        <span class="status status-{{ strtolower($record->status) }}">
                            {{ $record->status }}
                        </span>
                    </td>
                    <td>{{ $record->notes ?? 'No additional notes' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No appointment records found for this patient{{ $statusFilter !== 'all' ? " with status: $statusFilter" : '' }}.</p>
    @endif

    <div class="footer">
        <p>This is an official medical record document. Please keep for your records.</p>
        <p>© {{ date('Y') }} Your Clinic/Hospital Name. All rights reserved.</p>
    </div>
</body>
</html>