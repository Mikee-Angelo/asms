@section('title', 'Pricings')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pricings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-3">
                <div class="flex flex-row items-center">
                    <!-- Year Level -->
                    <div class="mb-4 mr-4">
                        <x-label for="year_level" :value="__('Year')" />
                        <select id="year_level"
                            class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
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
                            class="block w-full mt-1 text-gray-700 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
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
                <div class="mb-4">
                    <a href="{{route('pricings.create')}}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-pricing-table></x-pricing-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
