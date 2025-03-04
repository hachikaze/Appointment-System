<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Services Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-2xl w-full">
        <header class="text-center border-b pb-4 mb-4">
            <h1 class="text-2xl font-bold">Ana Fatima Barroso Dental Clinic</h1>
            <p class="text-sm">605 9 de Febrero St., Brgy. Pleasant Hills Mandaluyong City</p>
            <p class="text-sm">anafatima0717@gmail.com | +63 9154677338</p>
        </header>

        <h2 class="text-lg font-semibold text-center mb-4">Dental Services Receipt</h2>
        <p class="text-sm text-center mb-6">Date: {{ $date }} | Receipt#: {{ $receipt->receipt_number }}</p>

        <section class="mb-6">
            <h3 class="text-md font-semibold mb-2">Patient Information</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="border p-2">Name: {{ $patientName }}</div>
                <div class="border p-2">Phone: {{ $patientPhone }} </div>
            </div>
        </section>

        <section class="mb-6">
            <h3 class="text-md font-semibold mb-2">Description of Services</h3>
            <div class="border p-4 flex justify-between text-sm">
                <span> {{ $serviceDesc }} </span>
                <span>[Service Total]</span>
            </div>
        </section>

        <section>
            <h3 class="text-md font-semibold mb-2">Payment Method</h3>
            <div class="text-sm border-t">
                <div class="flex justify-between border-b p-2">
                    <span>Subtotal</span>
                    <span>[Subtotal]</span>
                </div>
                <div class="flex justify-between border-b p-2">
                    <span>Discount</span>
                    <span>[Discount]</span>
                </div>
                <div class="flex justify-between border-b p-2 font-semibold">
                    <span>Total Amount Due</span>
                    <span>[Total Amount Due]</span>
                </div>
                <div class="flex justify-between p-2 font-semibold">
                    <span>Amount Paid</span>
                    <span>[Amount Paid]</span>
                </div>
            </div>
        </section>

        <footer class="text-center text-sm mt-6">
            <p>Have a Nice Day!</p>
        </footer>
    </div>
</body>
</html>