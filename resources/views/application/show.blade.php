@section('title', 'Application')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="profile-container">

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

                    <x-application-subject-table></x-application-subject-table>
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

            @if ($application->status == 'pending')
             <button type="button" id="accept_button"
                    class="justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mt-5">Accept</button>
                      
            @endif
      
        </div>

    </div>

    <script type="text/javascript">
        $(function(){ 
            $('#accept_button').click(function(){ 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'accept',
                    type: 'PUT',
                    dataType: 'json',
                    data: {
                        method: '_PUT',
                        id: '{{ $application->id }}'
                    }
                }).always(function (data) {
                    if(data.success) {
                        $('#profile-container').prepend(`
                            <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4 mb-5" role="alert">
                                <p class="font-bold">
                                   Success
                                </p>
                                <p>
                                    `+ data.message +`
                                </p>
                            </div>
                        `);

                        $("html, body").animate({scrollTop: 0}, 300);
                        $('#accept_button').remove();

                    }
                });
            });
        });
    </script>
</x-app-layout>
