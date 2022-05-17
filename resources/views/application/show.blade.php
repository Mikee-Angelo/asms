@section('title', 'Application')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8" id="profile-container">

            @role('Accounting Head')
            <div class="flex flex-row-reverse mb-3">
                <a href="{{ route('application.payment.create', ['application' => request()->application ]) }}"
                    class="inline-flex items-center justify-end px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Register
                    Student</a>
            </div>
            @else
            <div class="flex flex-row-reverse mb-3">
                <a href="{{route('application.subject.index', ['application' => request()->application ])}}"
                    class="inline-flex items-center justify-end px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Manage
                    Subjects</a>
            </div>
            @endrole

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))

                    <div class="bg-{{ session('status')['success'] ? 'green' : 'red'}}-200 border-{{ session('status')['success'] ? 'green' : 'red'}}-600 text-{{ session('status')['success'] ? 'green' : 'red'}}-600 border-l-4 p-4 mb-5"
                        role="alert">
                        <p class="font-bold">
                            {{session('status')['message']}}
                        </p>
                        <p>
                            {{session('status')['description']}}
                        </p>
                    </div>

                    @endif
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="flex flex-row justify-between">
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800">
                            {{ $application->student->last_name }}, {{ $application->student->given_name }}
                            {{ $application->student->middle_name }}
                        </h2>

                        @role('Accounting Head')
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 ">
                            ₱ {{ $total }}
                        </h2>
                        @endrole
                    </div>

                    <h1 class="text-xl font-medium text-gray-800 dark:text-white">
                        {{ $application->course->course_name }}
                    </h1>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Year Level: {{ $application->year_level }}
                    </p>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Semester: {{ $application->semester }}
                    </p>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Discount: {{ is_null($application->discount) ? 'N/A' : $application->discount->name .'
                        ('.$application->discount->discount.'%)' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Transactions
                    </h2>

                    <x-application-transaction-table></x-application-transaction-table>
                    {{-- <x-application-subject-table></x-application-subject-table> --}}
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Subjects
                    </h2>

                    <x-application-subject-table></x-application-subject-table>
                </div>
            </div>
        </div>

        @role('Accounting Head')
        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Miscellaneous
                    </h2>

                    <x-miscellaneous-table></x-miscellaneous-table>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Other
                    </h2>
                    
                    <x-other-table></x-other-table>
                </div>
            </div>
        </div>
        @endrole

        @unlessrole('Accounting Head')
        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Requirements
                    </h2>

                    <form action="{{ route('application.accept', ['application' => $application->id]) }}"
                        id="requirements-form" method="POST">
                        @csrf

                        @if ($application->application_type == 2)
                        <!-- Clearance -->
                        <div class="block mt-4">
                            <label for="clearance" class="inline-flex items-center">

                                @if ($application->student->clearance != true)
                                <input id="clearance" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="clearance" value="1">
                                @endif

                                <span
                                    class="{{$application->student->clearance != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('Accomplished Clearance from Last Semester') }}</span>
                            </label>
                        </div>
                        @endif

                        @if($application->application_type == 1 || $application->application_type == 3)

                        {{-- PSA --}}
                        <div class="block mt-4">
                            <label for="psa" class="inline-flex items-center">

                                @if ($application->student->psa != true)
                                <input id="psa" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="psa" value="1">
                                @endif

                                <span
                                    class="{{$application->student->psa != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('Authenticated PSA Birth Certificate') }}</span>
                            </label>
                        </div>
                        @endif

                        @if ($application->application_type == 3)
                        <!-- Honorable Dismissal -->
                        <div class="block mt-4">
                            <label for="honorable_dismissal" class="inline-flex items-center">

                                @if ($application->student->honorable_dismissal != true)
                                <input id="honorable_dismissal" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="honorable_dismissal" value="1">
                                @endif
                                <span
                                    class="{{$application->student->honorable_dismissal != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('Transfer Credentials/Honorable Dismissal') }}</span>
                            </label>
                        </div>

                        <!-- Transcript of Record -->
                        <div class="block mt-4">
                            <label for="transcript_records" class="inline-flex items-center">
                                @if ($application->student->transcript_records != true)
                                <input id="transcript_records" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="transcript_records" value="1">
                                @endif

                                <span
                                    class="{{$application->student->transcript_records != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('Copy of Grades/Official Transcript of Records') }}</span>
                            </label>
                        </div>
                        @endif

                        @if($application->application_type == 1 || $application->application_type == 3)
                        {{-- Good Moral --}}
                        <div class="block mt-4">
                            <label for="good_moral" class="inline-flex items-center">
                                @if ($application->student->good_moral != true)
                                <input id="good_moral" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="good_moral" value="1">
                                @endif

                                <span
                                    class="{{$application->student->good_moral != true ? 'ml-2' : ''}}text-gray-600 text-md md:text-lg">{{ __('Certificate of Good Moral') }}</span>
                            </label>
                        </div>
                        @endif

                        @if($application->application_type == 1)
                        <!-- SF9 -->
                        <div class="block mt-4">
                            <label for="sf9" class="inline-flex items-center">
                                @if ($application->student->sf9 != true)
                                <input id="sf9" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="sf9" value="1">
                                @endif

                                <span
                                    class="{{$application->student->sf9 != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('School Form 9 (SF9) Progress Report Card') }}</span>
                            </label>
                        </div>
                        @endif

                        @if($application->application_type == 1 || $application->application_type == 3)
                        {{-- 1x1 Pictures --}}
                        <div class="block mt-4">
                            <label for="colored_pictures" class="inline-flex items-center">
                                @if ($application->student->colored_pictures != true)
                                <input id="colored_pictures" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="colored_pictures" value="1">
                                @endif

                                <span
                                    class="{{$application->student->colored_pictures != true ? 'ml-2' : ''}} text-gray-600 text-md md:text-lg">{{ __('3pcs 1x1 Colored Pictures') }}</span>
                            </label>
                        </div>
                        @endif


                        {{-- <button type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                            Add
                        </button> --}}

                    </form>
                </div>
            </div>
        </div>
        @endunlessrole

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Personal Information
                    </h2>

                    <div class="grid grid-flow-row-dense grid-cols-2 col-end-2 gap-3">

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Gender:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->gender }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Registered Email:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->register_email }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Facebook:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->facebook_link }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Home Address:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->home_address }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Present Address:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->present_address }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Mother:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->mother }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Occupation:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->mother_occupation }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Father:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->father }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Occupation:
                        </p>


                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->father_occupation }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Guardian Name:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->guardian }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Guardian Contact No.:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->guardian_contact_no }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Relationship:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->guardian_relationship }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Primary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->primary_school }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->primary_graduated }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Secondary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->secondary_school }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->secondary_graduated }}
                        </p>

                        @if (!is_null($application->student->senior_school_name))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Senior High School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->senior_school_name }}
                        </p>
                        @endif

                        @if (!is_null($application->student->strand))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Strand:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->strand }}
                        </p>
                        @endif

                        @if (!is_null($application->student->senior_graduated))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->senior_graduated)->format('F Y') }}
                        </p>
                        @endif

                        @if (!is_null($application->student->tertiary_school))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Tertiary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $application->student->tertiary_school }}
                        </p>
                        @endif

                        @if (!is_null($application->student->tertiary_graduated))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->tertiary_graduated)->format('F Y') }}
                        </p>

                        @endif

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Last School Date:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->last_school_date)->format('F Y') }}
                        </p>

                    </div>

                </div>
            </div>

            @unlessrole('Accounting Head')
            @if ($application->status == 'pending')
            <button type="submit" id="accept_button" form="requirements-form"
                class="inline-flex items-center justify-end px-4 py-2 mt-5 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Accept</button>

            @endif
            @endunlessrole

        </div>
    </div>
</x-app-layout>
