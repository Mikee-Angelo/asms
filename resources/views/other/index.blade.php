@section('title', 'Other Fees')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Other Fees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-2">
                <div class="flex flex-row items-center">
                    <!-- Year Level -->
                    <div class="mr-4">
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
                    <div>
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
                <div>
                    <a href="{{route('other.create')}}"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Add</a>
                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-other-table></x-other-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
