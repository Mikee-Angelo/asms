@section('title', 'Enroll Now')


<x-guest-layout>
    <form action="{{ route('application.store') }}" method="post">
        @csrf

        <div class="py-12" style="background-color: #000038">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-col items-center mb-4">
                    <img src="{{asset('img/logo.png')}}" class="h-36" alt="SBCI Logo">
                    <h1 class="my-4 text-2xl md:text-3xl lg:text-5xl font-black text-white leading-tight">
                        Application for Enrollment
                    </h1>
                </div>

                <!-- Session Status -->
                @if(session('status'))

                <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4 mb-5" role="alert">
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

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Application
                        </h2>

                        <!-- Application Type -->
                        <div class="mb-4">
                            <x-label for="application_type" :value="__('Type of Application')" />

                            <select :value="old('application_type')" id="application_type"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="application_type">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="1">
                                    New Application
                                </option>
                                <option value="2">
                                    Old Application
                                </option>
                                <option value="3">
                                    Transferee
                                </option>
                                <option value="4">
                                    Cross-Enroll
                                </option>
                            </select>

                        </div>

                        <!-- Course -->
                        <div class="mb-4">
                            <x-label for="course_id" :value="__('Course')" />

                            <select :value="old('course_id')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="course_id">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->code }} - {{ $course->course_name }}
                                </option>
                                @endforeach
                            </select>


                        </div>

                        <!-- Year Level -->
                        <div class="mb-4">
                            <x-label for="year_level" :value="__('Year')" />

                            <select :value="old('year_level')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="year_level">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8  mt-5">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Personal Information
                        </h2>
                        <!-- Last Name -->
                        <div class="mb-4">
                            <x-label for="last_name" :value="__('Last Name')" />

                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                :value="old('last_name')" required autofocus />
                        </div>

                        <!-- First Name -->
                        <div class="mb-4">
                            <x-label for="first_name" :value="__('First Name')" />

                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus />
                        </div>

                        <!-- Middle Name -->
                        <div class="mb-4">
                            <x-label for="middle_name" :value="__('Middle Name')" />

                            <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                                :value="old('middle_name')" required autofocus />
                        </div>

                        <!-- Age -->
                        <div class="mb-4">
                            <x-label for="birthday" :value="__('Birthdate')" />

                            <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                                :value="old('birthday')" required autofocus />
                        </div>

                        <div class="flex flex-row">
                            <!-- Mobile Number -->
                            <div class="mb-4 w-full mr-2">
                                <x-label for="mobile_no" :value="__('Mobile No.')" />

                                <x-input id="mobile_no" class="block mt-1 w-full" type="tel" name="mobile_no"
                                    :value="old('mobile_no')" required autofocus />
                            </div>

                            <!-- Gender -->
                            <div class="mb-4 w-full ml-2">
                                <x-label for="gender" :value="__('Gender')" />

                                <select :value="old('gender')"
                                    class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    name="gender">
                                    <option value="">
                                        Select an option
                                    </option>
                                    <option value="male">
                                        Male
                                    </option>
                                    <option value="female">
                                        Female
                                    </option>

                                </select>
                            </div>

                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-label for="register_email" :value="__('Email Address')" />

                            <x-input id="register_email" class="block mt-1 w-full" type="email" name="register_email"
                                :value="old('register_email')" required autofocus />
                        </div>

                        <!-- Facebook Link -->
                        <div class="mb-4">
                            <x-label for="facebook_link" :value="__('Facebook Link')" />

                            <x-input id="facebook_link" class="block mt-1 w-full" type="text" name="facebook_link"
                                :value="old('facebook_link')" required autofocus />
                        </div>

                        <!-- Home Address -->
                        <div class="mb-4">
                            <x-label for="home_address" :value="__('Home Address')" />

                            <x-input id="home_address" class="block mt-1 w-full" type="text" name="home_address"
                                :value="old('home_address')" required autofocus />
                        </div>

                        <!-- Present Address -->
                        <div class="mb-4">
                            <x-label for="present_address" :value="__('Present Address')" />

                            <x-input id="present_address" class="block mt-1 w-full" type="text" name="present_address"
                                :value="old('present_address')" required autofocus />
                        </div>

                        <!-- Mother's Name -->
                        <div class="mb-4">
                            <x-label for="mother" :value="__('Mother\'s Name')" />

                            <x-input id="mother" class="block mt-1 w-full" type="text" name="mother"
                                :value="old('mother')" required autofocus />
                        </div>

                        <!-- Mother's Occupation -->
                        <div class="mb-4">
                            <x-label for="mother_occupation" :value="__('Occupation')" />

                            <x-input id="mother_occupation" class="block mt-1 w-full" type="text"
                                name="mother_occupation" :value="old('mother_occupation')" required autofocus />
                        </div>

                        <!-- Father's Name -->
                        <div class="mb-4">
                            <x-label for="father" :value="__('Father\'s Name')" />

                            <x-input id="father" class="block mt-1 w-full" type="text" name="father"
                                :value="old('father')" required autofocus />
                        </div>

                        <!-- Father's Occupation -->
                        <div class="mb-4">
                            <x-label for="father_occupation" :value="__('Occupation')" />

                            <x-input id="father_occupation" class="block mt-1 w-full" type="text"
                                name="father_occupation" :value="old('father_occupation')" required autofocus />
                        </div>

                        <!-- Guardian -->
                        <div class="mb-4">
                            <x-label for="guardian" :value="__('Guardian')" />

                            <x-input id="guardian" class="block mt-1 w-full" type="text" name="guardian"
                                :value="old('guardian')" required autofocus />
                        </div>

                        <!-- Guardian Contact Number -->
                        <div class="mb-4">
                            <x-label for="guardian_contact_no" :value="__('Contact No.')" />

                            <x-input id="guardian_contact_no" class="block mt-1 w-full" type="tel"
                                name="guardian_contact_no" :value="old('guardian_contact_no')" required autofocus />
                        </div>

                        <!-- Relationship -->
                        <div class="mb-4">
                            <x-label for="guardian_relationship" :value="__('Relationship')" />

                            <x-input id="guardian_relationship" class="block mt-1 w-full" type="tel"
                                name="guardian_relationship" :value="old('guardian_relationship')" required autofocus />
                        </div>
                    </div>
                </div>
            </div>



            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Academic Information
                        </h2>

                        <!-- Primary School -->
                        <div class="mb-4">
                            <x-label for="primary_school" :value="__('Primary School (Elementary)')" />

                            <x-input id="primary_school" class="block mt-1 w-full" type="text" name="primary_school"
                                :value="old('primary_school')" required autofocus />
                        </div>

                        <!-- Year Graduated -->
                        <div class="mb-4">
                            <x-label for="primary_graduated" :value="__('Year Graduated')" />

                            <x-input id="primary_graduated" class="block mt-1 w-full" type="month"
                                name="primary_graduated" :value="old('primary_graduated')" required autofocus />
                        </div>

                        <!-- Secondary School -->
                        <div class="mb-4">
                            <x-label for="secondary_school" :value="__('Secondary School (High School)')" />

                            <x-input id="secondary_school" class="block mt-1 w-full" type="text" name="secondary_school"
                                :value="old('secondary_school')" required autofocus />
                        </div>

                        <!-- Year Graduated -->
                        <div class="mb-4">
                            <x-label for="secondary_graduated" :value="__('Year Graduated')" />

                            <x-input id="secondary_graduated" class="block mt-1 w-full" type="month"
                                name="secondary_graduated" :value="old('secondary_graduated')" required autofocus />
                        </div>

                        <!-- Senior High School Status -->
                        <div class="mb-4">
                            <x-label for="senior_high_status" :value="__('Are you a Senior High graduate?')" />

                            <select :value="old('senior_high_status')" id="senior_high_status"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="senior_high_status">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="yes">
                                    Yes
                                </option>
                                <option value="no">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Name of Senior High School -->
                        <div class="senior_high_container hidden">
                            <div class="mb-4">
                                <x-label for="senior_school_name" :value="__('Name of Senior High School')" />

                                <x-input id="senior_school_name" class="block mt-1 w-full" type="text"
                                    name="senior_school_name" :value="old('senior_school_name')"   />
                            </div>

                            <!-- Strand / Track -->
                            <div class="mb-4">
                                <x-label for="strand" :value="__('Strand / Track')" />

                                <x-input id="strand" class="block mt-1 w-full" type="text" name="strand"
                                    :value="old('strand')"  />
                            </div>

                            <!-- Year Graduated -->
                            <div class="mb-4">
                                <x-label for="senior_graduated" :value="__('Year Graduated')" />

                                <x-input id="senior_graduated" class="block mt-1 w-full" type="month"
                                    name="senior_graduated" :value="old('senior_graduated')"   />
                            </div>
                        </div>

                        <!-- Tertiary School -->
                        <div class="tertiary-container hidden">
                            <div class="mb-4">
                                <x-label for="tertiary_school" :value="__('Tertiary School (College)')" />

                                <x-input id="tertiary_school" class="block mt-1 w-full" type="text"
                                    name="tertiary_school" :value="old('tertiary_school')"  />
                            </div>

                            <!-- Year Graduated -->
                            <div class="mb-4">
                                <x-label for="tertiary_graduated" :value="__('Year Graduated')" />

                                <x-input id="tertiary_graduated" class="block mt-1 w-full" type="month"
                                    name="tertiary_graduated" :value="old('tertiary_graduated')" />
                            </div>

                        </div>

                        <!-- Date of the Last school attended  -->
                        <div class="mb-4">
                            <x-label for="last_school_date" :value="__('Date of the Last school attended')" />

                            <x-input id="last_school_date" class="block mt-1 w-full" type="month"
                                name="last_school_date" :value="old('last_school_date')" required autofocus />
                        </div>


                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Medical
                        </h2>

                        <!-- Mental Illness -->
                        <div class="mb-4">
                            <x-label for="mental_illness" :value="__('Do you have any history of mental illness?')" />

                            <select :value="old('mental_illness')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="mental_illness">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Hearing Defects -->
                        <div class="mb-4">
                            <x-label for="hearing_defects" :value="__('Do you have any visual or hearing defects?')" />

                            <select :value="old('hearing_defects')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="hearing_defects">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Physical Disability -->
                        <div class="mb-4">
                            <x-label for="physical_disability"
                                :value="__('Do you suffer from any physical disability?')" />

                            <select :value="old('physical_disability')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="physical_disability">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Chronic Illness -->
                        <div class="mb-4">
                            <x-label for="chronic_illness" :value="__('Do you suffer from any chronic illness?')" />

                            <select :value="old('chronic_illness')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="chronic_illness">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Interfering Illness -->
                        <div class="mb-4">
                            <x-label for="interfering_illness"
                                :value="__('Have you suffered from any illness which may interfere with your ability to complete your studies with SBCI?')" />

                            <select :value="old('interfering_illness')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="interfering_illness">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>

                            </select>
                        </div>

                        <!-- Allergies -->
                        <div class="mb-4">
                            <x-label for="allergies" :value="__('Do you suffer from any allergies?')" />

                            <select :value="old('allergies')"
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="allergies">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="0">
                                    Yes
                                </option>
                                <option value="1">
                                    No
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Declaration of Application
                        </h2>

                        <!-- EULA -->
                        <div class="block mt-4">
                            <label for="eula_status" class="inline-flex">
                                <input id="eula_status" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                    name="eula_status">
                                <span
                                    class="ml-2 text-sm text-gray-600">{{ __("I agree to pay a Non-refundable registration fee of Php 2,000.00 (for CHED courses)/ Php 1,000.00 (for TVET Courses) payable to Subic Bay Colleges (SBCI), Inc. Registration fee and monthly fee are NON-REFUNDABLE regardless of the outcome of the registration. I have been made aware of the financial obligations associated with studying at this institution, and I agree to pay any tuition and other fees that are due to the institution in accordance with its rules. My withdrawal from this institution does not relieve me from the obligation to pay the full semester's tuition") }}</span>
                            </label>
                        </div>

                        <!-- Admission Status -->
                        <div class="block mt-4">
                            <label for="admission_status" class="inline-flex">
                                <input id="admission_status" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                    name="admission_status">
                                <span
                                    class="ml-2 text-sm text-gray-600">{{ __("wish to apply for admission to the SUBIC BAY COLLEGES (SBCI), INC., and declare that the above information is correct to the best of my knowledge and belief. I understand that submitting my application does not provide me any rights in terms of admissions selection, which is exclusively at the discretion of the school. If I am accepted, I agree to abide by and observe all of the institution's rules and regulations") }}</span>
                            </label>
                        </div>

                        <!-- Information Status -->
                        <div class="block mt-4">
                            <label for="information_status" class="inline-flex">
                                <input id="information_status" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                    name="information_status">
                                <span
                                    class="ml-2 text-sm text-gray-600">{{ __("All the information given are will evaluate by the registrar kindly wait for confirmation of your enrollment in your email address or text message. Thank you for enrolling in Subic Bay Colleges Inc. ") }}</span>
                            </label>
                        </div>
                        <div class="mt-3 w-full">

                            {!! NoCaptcha::display() !!}
                        </div>

                        <x-button id="application-submit-button" class="mt-5" disabled>
                            {{ __('Enroll') }}
                        </x-button>

                    </div>
                </div>
            </div>

        </div>
    </form>

    {!! NoCaptcha::renderJs() !!}
    <script type="text/javascript">
        $(function () {

            var status = () => {
                let eula = $('#eula_status').is(':checked');
                let admission = $('#admission_status').is(':checked');
                let information = $('#information_status').is(':checked');

                let status = eula && admission && information;

                if (status) {
                    $('#application-submit-button').removeAttr('disabled');
                } else {
                    $('#application-submit-button').prop('disabled', true);
                }

                return status;
            }

            $('#eula_status').click(function () {
                status();
            });

            $('#admission_status').click(function () {
                status();
            });

            $('#information_status').click(function () {
                status();
            });

            $('#senior_high_status').change(function (e) {
                let value = $(e.target).val();
                console.log(value);

                if (value == 'yes') {
                    $('.senior_high_container').removeClass('hidden');

                    $('#senior_school_name').prop('required', true);
                    $('#senior_school_name').prop('autofocus', true);

                    $('#strand').prop('required', true);
                    $('#strand').prop('autofocus', true);

                    $('#senior_graduated').prop('required', true);
                    $('#senior_graduated').prop('autofocus', true);
                    
                    
                } else {
                    $('.senior_high_container').addClass('hidden');

                    $('#senior_school_name').removeAttr('required');
                    $('#senior_school_name').removeAttr('autofocus');

                    $('#strand').removeAttr('required');
                    $('#strand').removeAttr('autofocus');

                    $('#senior_graduated').removeAttr('required');
                    $('#senior_graduated').removeAttr('autofocus');
                }
            });

            $('#application_type').change(function () {
                let value = $(this).val(); 

                console.log(value);

                if(value == 3 || value == 4) { 
                    $('.tertiary-container').removeClass('hidden');
                    $('#tertiary_school').prop('required', true);
                    $('#tertiary_school').prop('autofocus', true);

                    $('#tertiary_graduated').prop('required', true);
                    $('#tertiary_graduated').prop('autofocus', true);
                    
                }else{ 
                    $('.tertiary-container').addClass('hidden');
                    $('#tertiary_school').removeAttr('required');
                    $('#tertiary_school').removeAttr('autofocus');

                    $('#tertiary_graduated').removeAttr('required');
                    $('#tertiary_graduated').removeAttr('autofocus');
        

                }
            });
        });

    </script>

</x-guest-layout>
