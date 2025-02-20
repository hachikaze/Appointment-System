<div {{ $attributes->merge(['class' => 'fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden']) }}>
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
        {{ $slot }}
    </div>
</div>