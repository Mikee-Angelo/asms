@section('title', 'Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between">
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Enrolled Subjects
                        </h2>

                        <h2 class=" my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            GWA: {{ $gwa }}
                        </h2>
                    </div>

                    <x-dashboard-subject-table></x-dashboard-subject-table>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
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
                            {{ $student->gender }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Registered Email:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->register_email }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Facebook:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->facebook_link }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Home Address:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->home_address }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Present Address:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->present_address }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Mother:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->mother }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Occupation:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->mother_occupation }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Father:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->father }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Occupation:
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->father_occupation }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Guardian Name:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->guardian }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Guardian Contact No.:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->guardian_contact_no }}
                        </p>


                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Relationship:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->guardian_relationship }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Primary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->primary_school }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->primary_graduated }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Secondary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->secondary_school }}
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->secondary_graduated }}
                        </p>

                        @if (!is_null($student->senior_school_name))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Senior High School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->senior_school_name }}
                        </p>
                        @endif

                        @if (!is_null($student->strand))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Strand:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->strand }}
                        </p>
                        @endif

                        @if (!is_null($student->senior_graduated))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->senior_graduated)->format('F Y') }}
                        </p>
                        @endif

                        @if (!is_null($student->tertiary_school))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Tertiary School:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ $student->tertiary_school }}
                        </p>
                        @endif

                        @if (!is_null($student->tertiary_graduated))
                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Graduated At:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->tertiary_graduated)->format('F Y') }}
                        </p>

                        @endif

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg font-bold">
                            Last School Date:
                        </p>

                        <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->last_school_date)->format('F Y') }}
                        </p>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
