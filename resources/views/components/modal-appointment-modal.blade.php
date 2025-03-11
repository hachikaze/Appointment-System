@props(['modalId', 'title', 'route', 'dateSelected', 'timeslot'])
@php
    // Hardcoded services data
    $services = [
        'Braces' => [
            'Metal Braces',
            'Free Consultation',
            'Free Monthly Oral Prophylaxis/Cleaning',
            'Free Photo Analysis',
            'Free Intraoral Photos',
            'Free Diagnostic Cast',
            'Free 1 set Ortho Wax',
            'Free Interdental Brush',
            'Referral Deductions',
        ],
        'Teeth Whitening' => ['Teeth Whitening'],
        'General Procedures' => [
            'Oral Prophylaxis',
            'Fluoride Treatment',
            'Tooth Filling/Pasta',
            'Anterior Tooth Filling/Pasta sa unahan',
            'Tooth Extraction',
            'Odontectomy/Wisdom Tooth Removal',
        ],
        'Dentures' => [
            'Complete Denture' => ['Ordinary', 'Ivocap', 'Thermosens'],
            'Partial Denture' => [
                'Ordinary Denture US Plastic' => ['1-2 units', '3-4 units', '5 and above', 'CD per arch'],
                'IVOSTAR' => ['1-2 units', '3-4 units', '5 and above', 'CD per arch'],
                'FLEXITE' => [
                    '1-2 Units unilateral',
                    '2-3 Units bilateral',
                    '4-10 Units bilateral',
                    '10-12 Units bilateral',
                ],
            ],
        ],
        'Fixed Bridge and Crowns' => [
            'Porcelain with Metal',
            'Porcelain with Tilite',
            'Emax',
            'Zirconia',
            'Temporary Plastic Crown',
        ],
        'Maryland Bridge' => ['Plastic', 'Porcelain with Metal'],
        'Veneers' => ['Ceramage', 'Emax'],
        'Retainers' => ['Retainers', 'Promo for braces patient', 'If outside patient'],
        'X-ray' => ['Periapical X-ray'],
        'Root Canal Treatment' => ['Anterior Only', 'Preop Periapical X-ray', 'Restoration Buildup'],
    ];
@endphp

<div id="{{ $modalId }}"
    class="fixed inset-0 flex z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-30 backdrop-blur-sm transition-opacity duration-300"
   >

    <div class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <form id="appointmentForm" action="{{ $route }}" method="POST" class="">
            @csrf

            <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                <h3 class="text-2xl font-semibold">{{ $title }}</h3>
            </div>

            <div class="p-6 grid grid-cols-1 gap-4">
                <button id="dropdownSearchButton-{{ $modalId }}"
                    data-dropdown-toggle="dropdownSearch-{{ $modalId }}"
                    class="inline-flex shadow-lg items-center justify-between w-full px-4 py-2 text-lg font-medium text-white bg-teal-500 rounded-lg hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300"
                    type="button">
                    <span>Appointment Reason</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </button>

                <a href="{{ route('pricing') }}" 
                    class="mb-2 inline-flex shadow-lg items-center justify-center w-full px-4 py-2 text-lg font-medium text-white bg-gradient-to-r from-teal-500 to-blue-500 rounded-lg hover:from-teal-600 hover:to-blue-600 focus:ring-4 focus:outline-none focus:ring-teal-300">
                    <i class="fa-solid fa-tags mr-2"></i> View Price List
                </a>

                <div>
                    <label for="date" class="block mb-2 text-lg font-medium text-teal-800">Date
                        Selected</label>
                    <input type="text" id="date" name="date" value="{{ old('date', $dateSelected) }}"
                        readonly
                        class="w-full font-semibold border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-700">
                </div>
                <div>
                    <label for="time" class="block mb-2 text-lg font-medium text-teal-800">Chosen
                        Timeslot</label>
                    <input type="text" id="time" name="time" value="{{ old('time', $timeslot) }}" readonly
                        class="w-full border font-semibold border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-700">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-lg font-medium text-teal-800">Phone
                        Number</label>
                    <input type="text" id="phone" name="phone" maxlength="11" value="{{ old('phone') }}"
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800"
                        placeholder="Ex. 09123456789">
                </div>


                <div class="relative max-w-full">
                    <div id="dropdownSearch-{{ $modalId }}"
                        class="hidden  absolute z-[1050] bg-white rounded-lg shadow-xl w-full">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5"
                                    placeholder="Search Procedure">
                            </div>
                        </div>
                        <ul id="procedure-list" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700"
                            aria-labelledby="dropdownSearchButton">
                            @foreach ($services as $category => $items)
                                <li class="category-header font-bold text-teal-600 p-2">{{ $category }}</li>
                                @foreach ($items as $key => $value)
                                    @if (is_array($value))
                                        <li class="category-header ml-3 font-semibold text-gray-800 p-1">
                                            {{ $key }}</li>
                                        @foreach ($value as $subKey => $subItem)
                                            @if (is_array($subItem))
                                                <li class="category-header ml-5 font-medium text-gray-700 p-1">
                                                    {{ $subKey }}</li>
                                                @foreach ($subItem as $nestedItem)
                                                    <li class="procedure-item">
                                                        <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                                            <input type="checkbox"
                                                                id="checkbox-{{ Str::slug($nestedItem) }}"
                                                                value="{{ $nestedItem }}" name="appointments[]"
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                                            <label for="checkbox-{{ Str::slug($nestedItem) }}"
                                                                class="w-full ms-2 text-sm font-medium text-gray-600 rounded-sm">
                                                                {{ $nestedItem }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="procedure-item">
                                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                                        <input type="checkbox" id="checkbox-{{ Str::slug($subItem) }}"
                                                            value="{{ $subItem }}" name="appointments[]"
                                                            class="checkbox-item w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">


                                                        <label for="checkbox-{{ Str::slug($subItem) }}"
                                                            class="w-full ms-2 text-sm font-medium text-gray-600 rounded-sm">
                                                            {{ $subItem }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="procedure-item">
                                            <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                                <input type="checkbox" id="checkbox-{{ Str::slug($value) }}"
                                                    value="{{ $value }}" name="appointments[]"
                                                    class="checkbox-item w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                                <label for="checkbox-{{ Str::slug($value) }}"
                                                    class="w-full ms-2 text-sm font-medium text-gray-600 rounded-sm">
                                                    {{ $value }}
                                                </label>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                        <a href="#" id="clear-checkboxes"
                            class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50">
                            Clear
                        </a>
                    </div>
                </div>
                <div class="flex p-2 justify-end space-x-2">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md"
                        data-modal-hide="{{ $modalId }}">
                        Cancel
                    </button>
                    <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                        Set Appointment
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
