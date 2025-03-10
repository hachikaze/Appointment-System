<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Patient Record PDF</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }
        h1 {
            margin: 0;
            padding: 0;
        }
        .header-line {
            border-bottom: 1px solid #000;
            margin: 10px 0;
        }
        .patient-info p {
            margin: 4px 0;
        }
        .subheader {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.1em;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background-color: #319795;
            color: white;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>PATIENT RECORD</h1>
    <div class="header-line"></div>
    
    @php
        // Determine the doctor assigned from the patient record or from the first appointment if available.
        $doctorAssigned = $patient->doctor;
        if (!$doctorAssigned && count($records) > 0 && isset($records[0]->doctor)) {
            $doctorAssigned = $records[0]->doctor;
        }
        
        // Determine the phone from the patient record or from the first appointment if available.
        $phone = $patient->phone;
        if (!$phone && count($records) > 0 && isset($records[0]->phone)) {
            $phone = $records[0]->phone;
        }
    @endphp

    <div class="patient-info">
        <p><strong>Name:</strong> {{ $patient->firstname }} {{ $patient->middleinitial }} {{ $patient->lastname }}</p>
        <p><strong>Email:</strong> {{ $patient->email ? $patient->email : 'No Records' }}</p>
        <p><strong>Phone:</strong> {{ $phone ? $phone : 'No Records' }}</p>
        <p><strong>Doctor Assigned:</strong> {{ $doctorAssigned ? $doctorAssigned : 'No Records' }}</p>
    </div>
    
    <div class="header-line"></div>
    
    <div class="subheader">APPOINTMENT RECORDS</div>
    
    @if(count($records) > 0)
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->date }}</td>
                <td>{{ $record->time }}</td>
                <td>{{ $record->appointments }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p style="color: #e53e3e; text-align: center;">No Appointments Found</p>
    @endif
</body>
</html>
