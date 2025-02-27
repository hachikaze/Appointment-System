<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Update</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .email-container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .status {
            font-size: 16px;
            font-weight: bold;
            padding: 8px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
        .status.approved {
            background-color: #d4edda;
            color: #155724;
        }
        .status.attended {
            background-color: #cce5ff;
            color: #004085;
        }
        .status.unattended {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status.cancelled {
            background-color: #fef2f2;
            color: #b91c1c;
        }
        .footer {
            font-size: 14px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">

        <div class="flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 150px; height: auto;">
        </div>

        <div class="header flex justify-center">Appointment Update</div>

        <p class="message">
            Dear {{ $patientName }}, <br><br>
            Your appointment has been 
            <span class="status {{ strtolower($status) }}">{{ $status }}</span>
        </p>

        <p class="message">
            {{ $messageContent }}
        </p>

        <div class="footer">
            Regards,<br>
            Ana Fatima Barroso Dental Clinic
        </div>
    </div>
</body>
</html>
