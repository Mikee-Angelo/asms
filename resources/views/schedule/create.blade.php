@section('title', 'Add Schedule')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-row">
            <div class="sm:pr-3 sm:pl-6 w-full h-full max-w-7xl">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-create-schedule-table></x-create-schedule-table>
                    </div>
                </div>
            </div>

            <div class="sm:pr-6 pl-3 max-w-5xl w-6/12">
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

                        <form action="{{route('schedule.store')}}" method="post">
                            @csrf

                            <div class="flex flex-nowrap">
                                @foreach ($days as $day)
                                <div class="block mr-4 days-container">
                                    <label for="days" class="inline-flex wep">
                                        <input type="checkbox" value="{{ $day }}"
                                            class="days rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                            name="days[]">
                                        <span class="ml-2 text-sm text-gray-600">{{ __($day) }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>

                            <div class="flex flex-row mt-5">
                                <button type="button" id="all-week-button"
                                    class="justify-end inline-flex items-center px-4 py-2 text-gray-800 border border-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">All</button>

                                <button id="mw-button" type="button"
                                    class="ml-2 justify-end inline-flex items-center px-4 py-2 text-gray-800 border border-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">MW</button>

                                <button id="tth-button" type="button"
                                    class="ml-2 justify-end inline-flex items-center px-4 py-2 text-gray-800 border border-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">TTH</button>

                                <button id="clear-button" type="button"
                                    class="ml-2 justify-end inline-flex items-center px-4 py-2 text-red-800 border border-red-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Clear</button>
                            </div>

                            {{-- Course Code  --}}
                            <div class="mb-4 w-full mt-5">
                                <x-label for="starts_at" :value="__('Starts At')" />
                                <x-input id="starts_at" class="block mt-1 w-full" type="time" name="starts_at"
                                    :value="old('starts_at')" required autofocus />
                            </div>

                            {{-- Ends At --}}
                            <div class="mb-4 w-full">
                                <x-label for="ends_at" :value="__('Ends At')" />

                                <x-input id="ends_at" class="block mt-1 w-full" type="time" name="ends_at"
                                    :value="old('ends_at')" required autofocus />
                            </div>

                            <button type="submit"
                                class="justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Add
                            </button>

                        </form>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="block">
                            <label for="submit-verification-checkbox" class="inline-flex">
                                <input id="submit-verification-checkbox" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                    name="submit-verification-checkbox">
                                <span
                                    class="ml-2 text-sm text-gray-600">{{ __("Epic cheeseburgers come in all kinds of manifestations, but we want them in and around our mouth no matter what. Slide those smashed patties with the gently caramelized meat fat between a toasted brioche bun and pass it over. You fall in love with the cheeseburger itself but the journey ain’t half bad either.") }}</span>
                            </label>
                        </div>

                        <button type="button"
                            class="submit-button mt-5 justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" disabled>
                            Submit
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
