@section('title', 'Add Enrollment Date')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Enrollment Date') }}
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

                    <form action="{{route('school-year.enrollment.store', ['school_year' => $school_year->id])}}" method="post">
                        @csrf

                        {{-- School Year --}}
                        <div class="mb-4">

                            <div class="flex flex-row ">
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

                                {{-- Restricted Date --}}
                                <div class=" w-full ml-2">
                                    <x-label for="restricted_date" :value="__('Restricted Date')" />

                                    <x-input id="restricted_date" class="block mt-1 w-full" type="date" name="restricted_date"
                                        :value="old('restricted_date')" required autofocus />
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
