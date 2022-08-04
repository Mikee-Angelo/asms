@section('title', 'Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8" id="profile-container">
            <div class="flex flex-row-reverse mb-3">
                <a href="{{ route('application.payment.create', ['application' => $application ]) }}"
                    class="inline-flex items-center justify-end px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Add
                    Payment</a>

            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('status'))

                    <div class="p-4 mb-5 {{ session('status')['success'] ? 'text-green-600 bg-green-200 border-green-600' : 'text-red-600 bg-red-200 border-red-600'}}"
                        role="alert">
                        <p class="font-bold">
                            {{session('status')['message']}}
                        </p>
                        <p>
                            {{session('status')['description']}}
                        </p>
                    </div>

                    @endif

                    <div class="flex flex-row justify-between">
                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 ">
                            {{ $student->last_name }}, {{ $student->given_name }}
                            {{ $student->middle_name }}
                        </h2>

                        <h2 class="my-2 text-3xl font-black leading-tight text-gray-800 ">
                            Balance: ₱ {{ $total }}
                        </h2>
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
                        Discount: {{ is_null($application->discount) ? 'N/A' : $application->discount->name .'
                        ('.$application->discount->discount.'%)' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between">
                        <h2 class="my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                            Enrolled Subjects
                        </h2>

                        <h2 class="my-2 mb-5 text-3xl font-black leading-tight text-gray-800 ">
                            GWA: {{ $gwa }}
                        </h2>
                    </div>

                    <x-dashboard-subject-table></x-dashboard-subject-table>
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
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Miscellaneous
                    </h2>

                    <x-miscellaneous-item-table></x-miscellaneous-item-table>
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
                            {{ $student->gender }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Registered Email:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->register_email }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Facebook:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->facebook_link }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Home Address:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->home_address }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Present Address:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->present_address }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Mother:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->mother }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Occupation:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->mother_occupation }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Father:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->father }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Occupation:
                        </p>


                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->father_occupation }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Guardian Name:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->guardian }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Guardian Contact No.:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->guardian_contact_no }}
                        </p>


                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Relationship:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->guardian_relationship }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Primary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->primary_school }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->primary_graduated }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Secondary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->secondary_school }}
                        </p>

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->secondary_graduated }}
                        </p>

                        @if (!is_null($student->senior_school_name))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Senior High School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->senior_school_name }}
                        </p>
                        @endif

                        @if (!is_null($student->strand))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Strand:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->strand }}
                        </p>
                        @endif

                        @if (!is_null($student->senior_graduated))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->senior_graduated)->format('F Y') }}
                        </p>
                        @endif

                        @if (!is_null($student->tertiary_school))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Tertiary School:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ $student->tertiary_school }}
                        </p>
                        @endif

                        @if (!is_null($student->tertiary_graduated))
                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Graduated At:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->tertiary_graduated)->format('F Y') }}
                        </p>

                        @endif

                        <p class="w-full font-bold text-gray-600 indent-96 text-md md:text-lg">
                            Last School Date:
                        </p>

                        <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                            {{ Carbon\Carbon::parse($student->last_school_date)->format('F Y') }}
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
