<x-patientnav-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto lg:px-8 grid lg:gap-8 gap-4 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
            <section
                class="bg-gradient-to-r from-white to-gray-50  border-t-4  border-b-4 border-teal-600  shadow-lg rounded-lg">
                <div class="py-8 px-4 mx-auto max-w-screen-3xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-lg text-center mb-8 lg:mb-12">
                        <h2
                            class="mb-4 text-4xl tracking-tight font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-400">
                            Affordable Dental Clinic Pricing
                        </h2>

                        <p class="mb-5 font-normal text-gray-500 sm:text-xl">Discover our comprehensive dental services
                            designed to give you a healthy, confident smile. We offer transparent pricing, exceptional
                            care, and personalized treatment plans tailored to your unique needs.</p>

                    </div>

                    @php
                        $braces = [
                            "type" => "Metal Braces",
                            "low_dp_promo" => 4000,
                            "monthly_adjustment" => 1000,
                            "total_package" => 50000,
                            "inclusions" => [
                                "Free Consultation",
                                "Free Monthly Oral Prophylaxis/Cleaning",
                                "Free Photo Analysis",
                                "Free Intraoral Photos",
                                "Free Diagnostic Cast",
                                "Free 1 set Ortho Wax",
                                "Free interdental brush",
                                "With referral deductions",
                                "50% off Teeth Whitening after case",
                                "Same day installation is possible but not guaranteed depending upon the case"
                            ]
                        ];

                        $generalProcedure = [
                            "oral_prophylaxis" => "starting ₱500",
                            "fluoride_treatment" => "starting ₱500",
                            "tooth_filling" => "starting ₱500",
                            "anterior_tooth_filling" => "minimum ₱800",
                            "tooth_extraction" => "starting ₱500",
                            "odontectomy_wisdom_tooth_removal" => "starting ₱5000"
                        ];

                        $teethWhitening = [
                            "description" => "Teeth Whitening with FREE Cleaning",
                            "original_price" => 10000,
                            "promo_price" => 7000
                        ];

                        $dentures = [
                            "complete_denture" => [
                                "ordinary" => [
                                    "per_arch" => 6000,
                                    "upper_lower" => 12000
                                ],
                                "ivocap" => [
                                    "per_arch" => 20000,
                                    "upper_lower" => 40000
                                ],
                                "thermosens" => [
                                    "per_arch" => 15000,
                                    "upper_lower" => 30000
                                ]
                            ],
                            "partial_denture" => [
                                "ordinary_us_plastic" => [
                                    "1-2_units" => 2500,
                                    "3-4_units" => 3500,
                                    "5_and_above" => 6000,
                                    "cd_per_arch" => 7000
                                ],
                                "ivostar" => [
                                    "1-2_units" => 5000,
                                    "3-4_units" => 7000,
                                    "5_and_above" => 10000,
                                    "cd_per_arch" => 12000
                                ],
                                "flexite" => [
                                    "1-2_units_unilateral" => 8000,
                                    "2-3_units_bilateral" => 10000,
                                    "4-10_units_bilateral" => 15000,
                                    "10-12_units_bilateral" => 20000
                                ]
                            ]
                        ];

                        $fixedBridgeAndCrowns = [
                            "porcelain_with_metal" => 6000,
                            "porcelain_with_tilite" => 10000,
                            "emax" => 15000,
                            "zirconia" => 20000,
                            "temporary_plastic_crown" => 2500,
                            "maryland_bridge" => [
                                "plastic" => 3500,
                                "porcelain_with_metal" => 5000
                            ]
                        ];

                        $veneers = [
                            "ceramage" => 7000,
                            "emax" => 15000
                        ];

                        $retainers = [
                            "standard" => [
                                "per_arch" => 5000,
                                "per_tooth" => 250
                            ],
                            "promo_if_braces_patient" => [
                                "per_arch" => 3000,
                                "per_tooth" => 250
                            ],
                            "outside_patient" => [
                                "per_arch" => 5000,
                                "per_tooth" => 250
                            ]
                        ];

                        $xray = [
                            "periapical" => 500
                        ];

                        $rootCanalTreatment = [
                            "anterior_only" => [
                                "preop_periapical_xray" => 500,
                                "per_canal" => 8000,
                                "includes" => "All xray and restoration buildup"
                            ]
                        ];

                    @endphp
                    <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                        <!-- Braces -->
                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50  rounded-lg border border-teal-500 shadow xl:p-8 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-4 text-2xl font-semibold">{{ $braces['type'] }}</h3>
                            <div class="flex justify-center items-baseline my-8">
                                <span
                                    class="mr-2 text-5xl font-extrabold">₱{{ number_format($braces['total_package']) }}</span>
                                <span class="text-gray-500">Total Package</span>
                            </div>
                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>
                            <!-- List -->
                            <ul role="list" class=" text-left">
                                <div class="rounded-lg border-2 bg-white p-4 space-y-6 border-teal-500 h-full">
                                    <li class="flex items-center space-x-3">
                                        <!-- Icon -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Low DP Promo: ₱{{ number_format($braces['low_dp_promo']) }}</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <!-- Icon -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Monthly Adjustment:
                                            ₱{{ number_format($braces['monthly_adjustment']) }}</span>
                                    </li>
                                    @foreach($braces['inclusions'] as $inclusion)
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ $inclusion }}</span>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                        </div>

                        <!-- General Procedure -->
                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50  rounded-lg border border-teal-500 shadow xl:p-8 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-4 text-2xl font-semibold">General Procedure</h3>

                            <p class="font-light text-gray-500 sm:text-lg">(Base price; depends upon the case)
                            </p>
                            <!-- If you wish to display an overall price, replace "N/A" below -->
                            <div class="flex justify-center items-baseline my-5">
                                <span class="mr-2 text-5xl font-extrabold">Varies</span>

                            </div>
                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>
                            <div class="rounded-lg border-2 bg-white p-4 space-y-6 border-teal-500 h-full">
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @foreach($generalProcedure as $procedure => $price)
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ ucwords(str_replace('_', ' ', $procedure)) }}: {{ $price }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <!-- Teeth Whitening -->
                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50  rounded-lg border border-teal-500 shadow xl:p-8 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-2 text-2xl font-semibold">Teeth Whitening</h3>
                            <p class="font-light text-gray-500 sm:text-lg">{{ $teethWhitening['description'] }}</p>
                            <div class="flex justify-center items-baseline mb-2">
                                <span
                                    class="mr-2 mt-10 text-5xl font-extrabold">₱{{ number_format($teethWhitening['promo_price']) }}</span>
                                <span class="text-gray-500 truncate">Promo Price</span>
                            </div>
                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>

                            <div class="rounded-lg border-2  p-4 space-y-6 bg-white  border-teal-500 h-full">
                                <!-- List -->
                                <ul role="list" class="mb-8 space-y-4 text-left">

                                    <li class="flex items-center space-x-3">
                                        <!-- Icon -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Original Price:
                                            ₱{{ number_format($teethWhitening['original_price']) }}</span>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <!-- Dentures -->
                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50  rounded-lg border border-teal-500 shadow xl:p-8 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-4 text-2xl font-semibold">Dentures</h3>
                            <p class="font-light text-gray-500 truncate sm:text-lg">Pricing details for complete
                                and partial
                                dentures</p>
                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>
                            <div class="rounded-lg border-2  bg-white p-4 space-y-6 border-teal-500 h-full">
                                <h4 class="my-4 text-xl font-semibold">Complete Denture</h4>
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @foreach($dentures['complete_denture'] as $type => $prices)
                                        <li>
                                            <strong>{{ ucwords(str_replace('_', ' ', $type)) }}:</strong>
                                            <ul class="ml-4 list-disc space-y-4">
                                                <li class="flex items-center space-x-3">
                                                    <!-- Icon -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span>Per Arch: ₱{{ number_format($prices['per_arch']) }}</span>
                                                </li>
                                                <li class="flex items-center space-x-3">
                                                    <!-- Icon -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span>Upper &amp; Lower:
                                                        ₱{{ number_format($prices['upper_lower']) }}</span>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Partial Denture Section -->
                                <h4 class="my-4 text-xl font-semibold">Partial Denture</h4>
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @foreach($dentures['partial_denture'] as $type => $prices)
                                        <li>
                                            <strong>{{ ucwords(str_replace('_', ' ', $type)) }}:</strong>
                                            <ul class="ml-4 list-disc  space-y-4">
                                                @foreach($prices as $option => $value)
                                                    <li class="flex items-center space-x-3">
                                                        <!-- Icon -->
                                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>{{ ucwords(str_replace('_', ' ', $option)) }}:
                                                            ₱{{ number_format($value) }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50  rounded-lg border border-teal-500 shadow xl:p-8 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-4 text-2xl font-semibold truncate">Fixed Bridge and Crowns</h3>
                            <p class="font-light text-gray-500 truncate sm:text-lg">Pricing details for fixed bridges
                                and
                                crowns
                            </p>

                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>
                            <div class="rounded-lg border-2 bg-white  p-4 space-y-6 border-teal-500 h-full">

                                <!-- Pricing List -->
                                <ul role="list" class="my-4 space-y-4 text-left">
                                    @foreach($fixedBridgeAndCrowns as $key => $value)
                                        @if(is_array($value))
                                            <strong style="margin-top:40px"
                                                class="block">{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                                            <li>
                                                <ul class="space-y-4 list-disc ">
                                                    @foreach($value as $subKey => $subValue)
                                                        <li class="mt-4 flex items-center space-x-4">
                                                            <!-- Icon -->
                                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span>{{ ucwords(str_replace('_', ' ', $subKey)) }}:
                                                                ₱{{ number_format($subValue) }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                        @else
                                            <li class="flex items-center space-x-3">
                                                <!-- Icon -->
                                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>{{ ucwords(str_replace('_', ' ', $key)) }}:
                                                    ₱{{ number_format($value) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>


                                <!-- Veneers Section -->
                                <h4 class="my-4 text-xl font-semibold">Veneers</h4>
                                <ul role="list" class="mb-6 space-y-4 text-left">
                                    @foreach($veneers as $type => $price)
                                        <li class="flex items-center space-x-4">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ ucwords($type) }}: {{ number_format($price) }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Retainers Section -->
                                <h4 class="my-4 text-xl font-semibold ">Retainers</h4>
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @foreach($retainers as $retainerType => $details)
                                        <li>
                                            <strong>{{ ucwords(str_replace('_', ' ', $retainerType)) }}:</strong>
                                            <ul class="ml-4 list-disc  space-y-4">
                                                @foreach($details as $option => $value)
                                                    <li class="flex items-center space-x-4">
                                                        <!-- Icon -->
                                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>{{ ucwords(str_replace('_', ' ', $option)) }}:
                                                            ₱{{ number_format($value) }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div
                            class="flex flex-col p-6 mx-auto max-w-xl text-center text-gray-900 bg-gradient-to-r from-teal-50 to-blue-50   rounded-lg border border-teal-500 shadow :border-gray-600 xl:p-8 :bg-gray-800 w-full h-full  transform hover:scale-105 transition-transform duration-200">
                            <h3 class="mb-4  lg:text-2xl md:text-lg sm:text-lg truncate  font-semibold ">Xray & Root
                                Canal
                                Treatment</h3>
                            <p class="font-light text-gray-500 truncate sm:text-lg">Detailed pricing for Xray services
                                and Root
                                Canal Treatment</p>
                            <a href="{{ route('calendar') }}"
                                class="text-white shadow-lg my-8 bg-gradient-to-r from-teal-500 to-blue-500 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-lg px-5 py-2.5 text-center">
                                Get Started
                            </a>

                            <div class="rounded-lg border-2 bg-white p-4 space-y-6 border-teal-500 h-full">
                                <h4 class="mt-4 text-xl font-semibold">Xray</h4>
                                <ul role="list" class="mb-6 space-y-4 text-left">
                                    @foreach($xray as $type => $price)
                                        <li class="flex items-center space-x-3">
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ ucwords(str_replace('_', ' ', $type)) }}:
                                                ₱{{ number_format($price) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <h4 class="my-4 text-start  text-xl font-semibold">Root Canal Treatment (Anterior Only)
                                </h4>
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @foreach($rootCanalTreatment['anterior_only'] as $key => $value)
                                        @if($key !== 'includes')
                                            <li class="flex items-center space-x-3">
                                                <!-- Icon -->
                                                <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>{{ ucwords(str_replace('_', ' ', $key)) }}:
                                                    ₱{{ number_format($value) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Includes: {{ $rootCanalTreatment['anterior_only']['includes'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
</x-patientnav-layout>