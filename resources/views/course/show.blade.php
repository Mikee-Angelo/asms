@section('title', 'Course | '.$course->code)
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __($course->course_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @unlessrole('Accounting Head')
            <div class="flex flex-row-reverse mb-3">
                <a href="{{route('courses.subjects.index', ['course' => $course->id])}}"
                    class="inline-flex items-center justify-end px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Manage
                    Subjects</a>

                <a href="{{route('courses.dean.create', ['course' => $course->id])}}"
                    class="inline-flex items-center justify-end px-4 py-2 mr-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Assign
                    Dean</a>

                <a href="{{route('courses.instructor.create', ['course' => $course->id])}}"
                    class="inline-flex items-center justify-end px-4 py-2 mr-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Assign
                    Instructor</a>

            </div>
            @endunlessrole

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Profile Information
                    </h2>

                    <p class="w-full text-gray-600 indent-96 text-md md:text-lg">
                        Dean: <span class="ml-5">{{ $course_dean->user->name ?? 'N/A' }}</span>
                    </p>

                </div>
            </div>

            @unlessrole('Accounting Head')
            <div class="mt-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Instructors
                    </h2>

                    <x-course-instructor-table></x-course-instructor-table>
                </div>
            </div>
            @endunlessrole

            <div class="flex flex-row mt-5">
                <!-- School Year -->

                @if (count($school_years) > 0)
                <div class="mb-4 mr-4">
                    <x-label for="subject_school_year" :value="__('School Year')" />
                    <select id="subject_school_year"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="subject_school_year">
                        @foreach ($school_years as $school_year)
                        <option value="{{ $school_year->id }}">
                            {{ $school_year->year_start }} - {{ $school_year->year_ends }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <!-- Year Level -->
                <div class="mb-4 mr-4">
                    <x-label for="year_level" :value="__('Year')" />
                    <select id="year_level"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="year_level">

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

                <!-- Semester -->
                <div class="mb-4">
                    <x-label for="semester" :value="__('Semester')" />
                    <select id="semester"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="semester">
                        <option value="1">
                            1
                        </option>
                        <option value="2">
                            2
                        </option>
                    </select>

                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Subjects
                    </h2>

                    <x-course-subject-table></x-course-subject-table>
                </div>
            </div>

            <div class="flex flex-row mt-5">
                <!-- School Year -->
                @if (count($school_years) > 0)
                <div class="mb-4 mr-4">
                    <x-label for="student_school_year" :value="__('School Year')" />
                    <select id="student_school_year"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="student_school_year">
                        @foreach ($school_years as $school_year)
                        <option value="{{ $school_year->id }}">
                            {{ $school_year->year_start }} - {{ $school_year->year_ends }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <!-- Year Level -->
                <div class="mb-4 mr-4">
                    <x-label for="student_year_level" :value="__('Year')" />
                    <select id="student_year_level"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="student_year_level">

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

                <!-- Semester -->
                <div class="mb-4">
                    <x-label for="student_semester" :value="__('Semester')" />
                    <select id="student_semester"
                        class="block w-full py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="student_semester">
                        <option value="1">
                            1
                        </option>
                        <option value="2">
                            2
                        </option>
                    </select>

                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Students
                    </h2>

                    <x-course-student-table></x-course-student-table>
                </div>
            </div>

            @role('Accounting Head')
            <div class="mt-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 mb-5 text-3xl font-black leading-tight text-gray-800">
                        Instructors
                    </h2>

                    <x-course-instructor-table></x-course-instructor-table>
                </div>
            </div>
            @endunlessrole
        </div>
    </div>


</x-app-layout>
