@section('title', 'Manage Application Subject')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Application Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Enrolled Subjects
                    </h2>
                    <x-application-subject-table></x-application-subject-table>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">

            <div class="flex flex-row mt-5">

                <!-- Year Level -->
                <div class="mb-4 mr-4">
                    <x-label for="year_level" :value="__('Year')" />
                    <select id="year_level"
                        class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="year_level">

                        <option value="1" {{request()->application->year_level == 1 ? 'selected' : ''}}>
                            1
                        </option>
                        <option value="2" {{request()->application->year_level == 2 ? 'selected' : ''}}>
                            2
                        </option>
                        <option value="3" {{request()->application->year_level == 3 ? 'selected' : ''}}>
                            3
                        </option>
                        <option value="4" {{request()->application->year_level == 4 ? 'selected' : ''}}>
                            4
                        </option>
                    </select>
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <x-label for="semester" :value="__('Semester')" />
                    <select id="semester"
                        class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        name="semester">
                        <option value="1" {{request()->application->semester == 1 ? 'selected' : ''}}>
                            1
                        </option>
                        <option value="2" {{request()->application->semester == 2 ? 'selected' : ''}}>
                            2
                        </option>
                    </select>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Subjects
                    </h2>
                    <x-suggested-subject-table></x-suggested-subject-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
