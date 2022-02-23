@section('title', 'Add Subject')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Subject') }}
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

                    <form action="{{route('subjects.store')}}" method="post">
                        @csrf
                        {{-- Course Code  --}}
                        <div class="mb-4">
                            <x-label for="subject_code" :value="__('Subject Code')" />

                            <x-input id="subject_code" class="block mt-1 w-full" type="text" name="subject_code"
                                :value="old('subject_code')" required autofocus />
                        </div>

                        {{-- Description  --}}
                        <div class="mb-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" required autofocus />
                        </div>


                        <div class="flex flex-row w-full">
                            {{-- Lecture Units --}}
                            <div class="mb-4 w-full mr-2">
                                <x-label for="lec" :value="__('Lecture Units')" />

                                <x-input id="lec" class="block mt-1 w-full" type="number" name="lec" :value="old('lec')"
                                     autofocus />
                            </div>

                            {{-- Lab Units --}}
                            <div class="mb-4 w-full ml-2">
                                <x-label for="lab" :value="__('Lab Units')" />

                                <x-input id="lab" class="block mt-1 w-full" type="number" name="lab" :value="old('lab')"
                                     autofocus />
                            </div>
                        </div>

                        {{-- Send --}}

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
