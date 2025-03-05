<x-patientnav-layout>

    <div class="flex flex-col items-center justify-center min-h-screen">

        @if (session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @endif

        @if (session('error'))
            <x-alert-error>
                {{ session('error') }}
            </x-alert-error>
        @endif

        <div class="bg-white mt-3 p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-center text-xl font-semibold mb-4">Scan to Pay</h2>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('/images/gcash.jpg') }}" alt="GCash QR Code" class="w-auto h-auto object-cover">
            </div>

            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Payment Receipt</label>
                <input type="file" name="receipt" accept="image/*" required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300 mb-4">
                
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                    Submit Payment
                </button>
            </form>
        </div>

        <div class="bg-white p-6 mt-4 rounded-lg shadow-lg w-full max-w-md">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Receipt</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $payment->email }}</td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ asset('storage/' . $payment->file_path) }}" 
                                    class="text-blue-500 hover:underline" 
                                    target="_blank">
                                    View Receipt
                                </a>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $payment->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="">view receipts</a>

        @foreach ($receipts as $receipt)
            <p>Receipt Number: {{ $receipt->receipt_number }}</p>
            <p>Email: {{ $receipt->email }}</p>
            <a href="{{ route('receipt.show', ['id' => $receipt->id]) }}" class="btn btn-primary">View Receipt</a>
        @endforeach

    </div>

</x-patientnav-layout>