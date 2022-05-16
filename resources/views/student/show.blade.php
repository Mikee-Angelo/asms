@section('title', 'Profile | '. $student->given_name.' '.$student->last_name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="profile-container">
             <div class="flex flex-row-reverse mb-3">
                <a href="{{route('students.application.index', ['student' => $student->id])}}"
                    class="justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Print Reg Form</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-row justify-between">
                        <h2 class=" my-2 text-3xl font-black leading-tight text-gray-800">
                            {{ $student->last_name }}, {{ $student->given_name }}
                            {{ $student->middle_name }}
                        </h2>

                        @role('Accounting Head')
                        <h2 class=" my-2 text-3xl font-black leading-tight text-gray-800">
                           Balance:  ₱ {{ $total }}
                        </h2>
                        @endrole
                    </div>

                    <h1 class="text-gray-800 dark:text-white text-xl font-medium">
                        {{ $application->course->course_name }}
                    </h1>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        Year Level: {{ $application->year_level }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        Semester: {{ $application->semester }}
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Subjects
                    </h2>

                    <x-student-subject-table></x-student-subject-table>
                </div>
            </div>
        </div>


       \ <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Personal Information
                    </h2>

                    <div class="grid grid-cols-2 gap-3 grid-flow-row-dense col-end-2">

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Gender:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->gender }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Registered Email:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->register_email }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Facebook:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->facebook_link }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Home Address:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->home_address }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Present Address:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->present_address }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Mother:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->mother }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Occupation:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->mother_occupation }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Father:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->father }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Occupation:
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->father_occupation }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Guardian Name:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->guardian }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Guardian Contact No.:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->guardian_contact_no }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Relationship:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->guardian_relationship }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Primary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->primary_school }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->primary_graduated }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Secondary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->secondary_school }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->secondary_graduated }}
                        </p>

                        @if (!is_null($application->student->senior_school_name))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Senior High School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->senior_school_name }}
                        </p>
                        @endif

                        @if (!is_null($application->student->strand))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Strand:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->strand }}
                        </p>
                        @endif

                        @if (!is_null($application->student->senior_graduated))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->senior_graduated)->format('F Y') }}
                        </p>
                        @endif

                        @if (!is_null($application->student->tertiary_school))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Tertiary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $application->student->tertiary_school }}
                        </p>
                        @endif

                        @if (!is_null($application->student->tertiary_graduated))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->tertiary_graduated)->format('F Y') }}
                        </p>

                        @endif

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Last School Date:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($application->student->last_school_date)->format('F Y') }}
                        </p>

                    </div>
                </div>
            </div>

            @if ($application->status == 'pending')
            <button type="button" id="accept_button"
                class="justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mt-5">Accept</button>

            @endif

        </div>

    </div>


</x-app-layout>
