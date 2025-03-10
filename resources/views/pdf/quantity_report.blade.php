<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inventory Quantity Report</title>
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
        
        .low-stock {
            color: #E53E3E;
            font-weight: bold;
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
    <h1>Inventory Quantity Report</h1>
    <div class="subtitle">Generated on {{ date('F d, Y') }}</div>
    
    <div class="info-box">
        <p><strong>Total Items:</strong> {{ count($inventoryItems) }}</p>
        <p><strong>Low Stock Items:</strong> {{ $inventoryItems->where('quantity', '<=', 'minimum_stock_level')->count() }}</p>
    </div>
    
    @if(count($inventoryItems) > 0)
    <table>
        <thead>
            <tr>
                <th style="width: 8%;">Rank</th>
                <th style="width: 30%;">Item Name</th>
                <th style="width: 20%;">Category</th>
                <th style="width: 10%;">Unit</th>
                <th style="width: 12%;">Quantity</th>
                <th style="width: 12%;">Min. Stock</th>
                <th style="width: 8%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryItems as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->unit }}</td>
                <td class="{{ $item->quantity <= $item->minimum_stock_level ? 'low-stock' : '' }}">{{ $item->quantity }}</td>
                <td>{{ $item->minimum_stock_level }}</td>
                <td>{{ $item->quantity <= $item->minimum_stock_level ? 'Low Stock' : 'In Stock' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="text-align: center; color: #718096; padding: 20px;">No inventory items found.</p>
    @endif
    
    <div class="footer">
        <p>Dental Clinic Inventory Management System</p>
        <p class="page-number"></p>
    </div>
</body>
</html>