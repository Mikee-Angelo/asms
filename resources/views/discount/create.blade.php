@section('title', 'Add Course')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Course') }}
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

                    <form action="{{route('discount.store')}}" method="post">
                        @csrf

                        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">

                                    {{-- Discount Title --}}
                                    <div class="mb-4">
                                        <x-label for="name" :value="__('Discount Title')" />

                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                            :value="old('name')" required autofocus />
                                    </div>

                                    {{-- Discount --}}
                                    <div class="mb-4">
                                        <x-label for="discount" :value="__('Discount %')" />

                                        <x-input id="discount" class="block mt-1 w-full" type="number" name="discount"
                                            :value="old('discount')" required autofocus />
                                    </div>

                                    {{-- Description --}}
                                    <div class="mb-4">
                                        <x-label for="description" :value="__('Description')" />

                                        <x-input id="description" class="block mt-1 w-full" type="text"
                                            name="description" :value="old('description')" autofocus />
                                    </div>

                                    {{-- Send --}}
                                    <button type="submit"
                                        class="py-2 px-4 mt-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Add
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
