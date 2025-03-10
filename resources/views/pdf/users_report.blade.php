<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>User Registration Report</title>
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
        .gender-summary {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .gender-item {
            flex: 1;
            padding: 8px;
            text-align: center;
            border-radius: 4px;
            margin: 0 5px;
        }
        .male-box {
            background-color: #EBF8FF;
            border: 1px solid #BEE3F8;
        }
        .female-box {
            background-color: #FEF5FF;
            border: 1px solid #FED7E2;
        }
        .gender-count {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
        }
        .male-count {
            color: #3182CE;
        }
        .female-count {
            color: #D53F8C;
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
        .male-gender {
            color: #3182CE;
            font-weight: bold;
        }
        .female-gender {
            color: #D53F8C;
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
        .period-badge {
            display: inline-block;
            background-color: #4FD1C5;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>User Registration Report</h1>
    <div class="subtitle">
        {{ $title }}
        <br>
        <span class="period-badge">{{ $fromDate }} to {{ $toDate }}</span>
        <br>
        Generated on {{ date('F d, Y') }}
    </div>
    
    <div class="info-box">
        <p><strong>Total Registrations:</strong> {{ count($users) }}</p>
        
        <div class="gender-summary">
            @foreach($registrationsByGender as $gender)
                <div class="gender-item {{ strtolower($gender->gender) == 'male' ? 'male-box' : 'female-box' }}">
                    <div>{{ $gender->gender }} Patients</div>
                    <div class="gender-count {{ strtolower($gender->gender) == 'male' ? 'male-count' : 'female-count' }}">
                        {{ $gender->count }}
                    </div>
                    <div>{{ round(($gender->count / max(1, count($users))) * 100) }}% of total</div>
                </div>
            @endforeach
        </div>
    </div>
    
    @if(count($users) > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 30%;">Email</th>
                    <th style="width: 12%;">Gender</th>
                    <th style="width: 20%;">Registration Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }} {{ $user->middleinitial }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="{{ strtolower($user->gender) == 'male' ? 'male-gender' : 'female-gender' }}">
                            {{ $user->gender }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #718096; padding: 20px;">No user registrations found for this period.</p>
    @endif
    
    <div class="footer">
        <p>Dental Clinic Patient Management System</p>
        <p class="page-number"></p>
    </div>
</body>
</html>