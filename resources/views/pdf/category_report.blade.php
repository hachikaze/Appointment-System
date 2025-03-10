<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inventory Category Report</title>
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
        
        h2 {
            color: #2D3748;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #E2E8F0;
            padding-bottom: 5px;
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
            margin-bottom: 15px;
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
        
        .category-header {
            background-color: #EBF4FF;
            padding: 8px;
            margin-top: 15px;
            margin-bottom: 5px;
            border-radius: 3px;
            font-weight: bold;
            color: #2B6CB0;
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
        
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>Inventory Category Report</h1>
    <div class="subtitle">Generated on {{ date('F d, Y') }}</div>
    
    <div class="info-box">
        <p><strong>Total Categories:</strong> {{ count($categoryData) }}</p>
        <p><strong>Total Items:</strong> {{ $categoryData->sum('item_count') }}</p>
        <p><strong>Total Quantity:</strong> {{ $categoryData->sum('total_quantity') }}</p>
    </div>
    
    <!-- Summary Table -->
    <h2>Category Summary</h2>
    
    @if(count($categoryData) > 0)
    <table>
        <thead>
            <tr>
                <th style="width: 8%;">Rank</th>
                <th style="width: 35%;">Category</th>
                <th style="width: 20%;">Number of Items</th>
                <th style="width: 20%;">Total Quantity</th>
                <th style="width: 17%;">Percentage</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalItems = $categoryData->sum('item_count');
            @endphp
            
            @foreach($categoryData as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->category }}</td>
                <td>{{ $category->item_count }}</td>
                <td>{{ $category->total_quantity }}</td>
                <td>{{ round(($category->item_count / $totalItems) * 100, 1) }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Detailed Items by Category -->
    <div class="page-break"></div>
    <h2>Detailed Items by Category</h2>
    
    @foreach($categoriesWithItems as $categoryInfo)
        <div class="category-header">
            {{ $categoryInfo['category'] }} ({{ $categoryInfo['item_count'] }} items)
        </div>
        
        <table>
            <thead>
                <tr>
                    <th style="width: 40%;">Item Name</th>
                    <th style="width: 20%;">Quantity</th>
                    <th style="width: 20%;">Unit</th>
                    <th style="width: 20%;">Min. Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryInfo['items'] as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->minimum_stock_level }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
    
    @else
    <p style="text-align: center; color: #718096; padding: 20px;">No category data available.</p>
    @endif
    
    <div class="footer">
        <p>Dental Clinic Inventory Management System</p>
        <p class="page-number"></p>
    </div>
</body>
</html>