<x-navbar-layout>

    {{-- Doctors Section --}}
    <div class="max-w-5xl mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold">Our Doctor</h2>
            <p class="text-gray-600">Meet our dedicated doctor who is here to provide the best care for you.</p>
        </div>
        <div class="flex justify-center">
            <div class="bg-gray-100 border rounded-lg p-6 text-center shadow-md">
                <img src="{{ asset('images/doctor1.jpg') }}" alt="Dr. Ana Fatima Barroso" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h3 class="text-lg font-semibold">Dr. Ana Fatima Barroso</h3>
                <p class="text-gray-600">General Dentist, Orthodontics, Cosmetic Dentist</p>
            </div>
        </div>
    </div>

    {{-- Staff Section --}}
    <div class="max-w-5xl mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold">Our Staff</h2>
            <p class="text-gray-600">Our team of professional and friendly staff is here to assist you.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['name' => 'Jovielyn Estioco', 'role' => 'Dental Assistant', 'image' => 'staff1.jpg'],
                ['name' => 'Jennifer Vanguardia', 'role' => 'Front Desk Officer', 'image' => 'staff2.jpg'],
                ['name' => 'John Mark Paulo Estioco', 'role' => 'Dental Assistant', 'image' => 'staff3.jpg'],
                ['name' => 'Kevin Clark Afable', 'role' => 'Dental Assistant', 'image' => 'staff4.jpg']
            ] as $staff)
                <div class="bg-gray-100 border rounded-lg p-6 text-center shadow-md">
                    <img src="{{ asset('images/doctor1.jpg') }}" alt="{{ $staff['name'] }}" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <h3 class="text-lg font-semibold">{{ $staff['name'] }}</h3>
                    <p class="text-gray-600">{{ $staff['role'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-navbar-layout>