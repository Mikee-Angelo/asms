@section('title', 'Application')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800">
                        {{ $application->student->last_name }}, {{ $application->student->given_name }}
                        {{ $application->student->middle_name }}
                    </h2>

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
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Personal Information
                    </h2>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->gender }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->register_email }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->facebook_link }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->home_address }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->present_address }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->mother }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->mother_occupation }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->father }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->father_occupation }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->guardian }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->guardian_contact_no }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->guardian_relationship }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->primary_school }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->primary_graduated }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->secondary_school }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->secondary_graduated }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->senior_school_name }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->strand }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->senior_graduated }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->tertiary_school }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->tertiary_graduated }}
                    </p>

                    <p class="w-full indent-96 text-gray-600 text-md md:text-lg">
                        {{ $application->student->last_school_date }}
                    </p>

                </div>
            </div>
        </div>

    </div>


</x-app-layout>
