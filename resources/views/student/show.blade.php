@section('title', 'Profile | '. $student->given_name.' '.$student->last_name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8" id="profile-container">
            <div class="flex flex-row-reverse mb-3">
                @role('Accounting Head')
                <a href="{{ route('application.payment.create', ['application' => request()->student->application->where('status', 'enrolled')->last() ]) }}"
                    class="inline-flex items-center justify-end px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Add
                    Payment</a>
                @endrole
                <a href="{{route('students.application.index', ['student' => $student->id])}}"
                    class="inline-flex items-center justify-end px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Print
                    Reg Form</a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-row justify-between">
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 ">
                            {{ $student->last_name }}, {{ $student->given_name }}
                            {{ $student->middle_name }}
                        </h2>

                        @role('Accounting Head')
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 ">
                            Balance: ₱ {{ $total }}
                        </h2>
                        @endrole
                    </div>

                    <div class="flex flex-row justify-between">
                        <h1 class="text-xl font-medium text-gray-800 dark:text-white">
                            {{ $application->course->course_name }}
                        </h1>

                    </div>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Year Level: {{ $application->year_level }}
                    </p>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Semester: {{ $application->semester }}
                    </p>
                    
                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Discount: {{ is_null($application->discount) ? 'N/A' : $application->discount->name .' ('.$application->discount->discount.'%)' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Subjects
                    </h2>

                    <x-student-subject-table></x-student-subject-table>
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

            @if ($application->status == 'pending')
            <button type="button" id="accept_button"
                class="inline-flex items-center justify-end px-4 py-2 mt-5 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Accept</button>

            @endif

        </div>

    </div>


</x-app-layout>
