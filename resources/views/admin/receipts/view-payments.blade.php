<x-sidebar-layout>
    <div class="overflow-x-auto">
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
</x-sidebar-layout>
