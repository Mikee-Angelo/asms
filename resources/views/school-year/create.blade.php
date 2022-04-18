@section('title', 'Add School Year')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add School Year') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

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

                    <form action="{{route('school-year.store')}}" method="post">
                        @csrf

                        {{-- School Year --}}
                        <div class="mb-4">
                            <x-label for="school_year" :value="__('School Year')" />

                            <select
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                :value="old('school_year')" name="school_year">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($years as $year)
                                <option value="{{ $year }}">
                                    {{ $year }} - {{ $year + 1}}
                                </option>
                                @endforeach

                            </select>

                            <div class="flex flex-row mt-5">
                                {{-- Starts At  --}}
                                <div class=" w-full mr-2">
                                    <x-label for="starts_at" :value="__('Starts At')" />
                                    <x-input id="starts_at" class="block mt-1 w-full" type="date" name="starts_at"
                                        :value="old('starts_at')" required autofocus />
                                </div>

                                {{-- Ends At --}}
                                <div class=" w-full ml-2">
                                    <x-label for="ends_at" :value="__('Ends At')" />

                                    <x-input id="ends_at" class="block mt-1 w-full" type="date" name="ends_at"
                                        :value="old('ends_at')" required autofocus />
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Add
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
