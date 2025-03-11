<div id="{{ $modalid }}"
    class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl m-2 transform scale-95 opacity-0 transition-all duration-300 ease-out"
        id="{{ $modalid }}-content">
        <div class="flex justify-between items-center bg-teal-500 text-white px-6 py-4 rounded-t-lg">
            <h2 class="text-lg font-semibold"><i class="fa-solid fa-window-maximize px-2"></i>{{ $title }}</h2>
            <button onclick="closeAuditModal('{{ $modalid }}')"
                class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-teal-600 transition">
                Close
            </button>
        </div>
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = document.getElementById(`${modalId}-content`);

        if (!modal || !modalContent) {
            console.error(`Modal or modal content not found: ${modalId}`);
            return;
        }

        modal.classList.remove("hidden");
        modal.classList.add("flex");

        setTimeout(() => {
            modalContent.classList.remove("scale-95", "opacity-0");
            modalContent.classList.add("scale-100", "opacity-100");
        }, 50);

        const url = new URL(window.location.href);
        url.searchParams.set("auditModal", "true");
        window.history.replaceState({}, "", url.toString());

        console.log("Updated URL:", url.toString()); // Debugging
    }


    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = document.getElementById(`${modalId}-content`);

        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>