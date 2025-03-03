<x-patientnav-layout>

<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-center text-xl font-semibold mb-4">Scan to Pay</h2>
        <div class="flex justify-center mb-4">
            <img src="{{ asset('/images/gcash.jpg') }}" alt="GCash QR Code" class="w-auto h-auto object-cover">
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Payment Receipt</label>
            <input type="file" name="receipt" accept="image/*" required 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300 mb-4">
            
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                Submit Payment
            </button>
        </form>
    </div>
</div>

</x-patientnav-layout>