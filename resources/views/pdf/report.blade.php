<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inventory Usage Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        
        h1 {
            color: #2C7A7B;
            font-size: 20px;
            text-align: center;
            margin-bottom: 5px;
        }
        
        .subtitle {
            text-align: center;
            color: #4A5568;
            margin-bottom: 20px;
        }
        
        .info-box {
            background-color: #E6FFFA;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background-color: #4FD1C5;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        
        td {
            padding: 8px;
            border-bottom: 1px solid #E2E8F0;
            font-size: 10px;
        }
        
        tr:nth-child(even) {
            background-color: #F0FDFA;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #718096;
        }
        
        .page-number:before {
            content: "Page " counter(page);
        }
    </style>
</head>
<body>
    <h1>Inventory Usage Report</h1>
    <div class="subtitle">{{ $title }} - Generated on {{ date('F d, Y') }}</div>
    
    <div class="info-box">
        <p><strong>Time Period:</strong> {{ $title }}</p>
        @if($fromDate && $toDate)
        <p><strong>Date Range:</strong> {{ \Carbon\Carbon::parse($fromDate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($toDate)->format('M d, Y') }}</p>
        @endif
        <p><strong>Total Items:</strong> {{ count($allItems) }}</p>
        <p><strong>Total Quantity Used:</strong> {{ $allItems->sum('total_used') }}</p>
    </div>
    
    @if(count($allItems) > 0)
    <table>
        <thead>
            <tr>
                <th style="width: 8%;">Rank</th>
                <th style="width: 35%;">Item Name</th>
                <th style="width: 25%;">Category</th>
                <th style="width: 15%;">Unit</th>
                <th style="width: 17%;">Total Used</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allItems as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->total_used }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="text-align: center; color: #718096; padding: 20px;">No inventory usage data available for this time period.</p>
    @endif
    
    <div class="footer">
        <p>Dental Clinic Inventory Management System</p>
        <p class="page-number"></p>
    </div>
</body>
</html>