@section('title', 'Tuition Fee | '.$pricing->course->code)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tuition Fee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full text-3xl font-black leading-tight text-gray-800">
                            {{ $pricing->course->course_name }}
                        </h2>
                </div>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
             <div class="flex flex-row">
                <!-- Year Level -->
                <div class="mb-4 mr-4">
                    <x-label for="year_level" :value="__('Year')" />
                    <select id="year_level" class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
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
                    <select
                      id="semester" class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
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
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 id="course-year-level" class="w-full text-3xl font-black leading-tight text-gray-800 mb-5">
                            {{ $pricing->course->code }}
                        </h2>

                        <x-pricing-subject-table></x-pricing-subject-table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
