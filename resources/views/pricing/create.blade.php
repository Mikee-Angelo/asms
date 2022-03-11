@section('title', 'Add Pricing')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Pricing') }}
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

                    <form action="{{route('pricings.store')}}" method="post">
                        @csrf
                        {{-- Lecture Unit Code --}}
                        <div class="mb-4">
                            <x-label for="lec_price" :value="__('Lecture Unit Price')" />

                            <x-input id="lec_price" class="block mt-1 w-full" type="number" name="lec_price" :value="old('lec_price')"
                                required autofocus />
                        </div>

                        {{-- Lab Unit Price  --}}
                        <div class="mb-4">
                            <x-label for="lab_price" :value="__('Lab Unit Name')" />

                            <x-input id="lab_price" class="block mt-1 w-full" type="number" name="lab_price"
                                :value="old('lab_price')" required autofocus />
                        </div>

                        {{-- Discount --}}
                        <div class="mb-4">
                            <x-label for="discount" :value="__('Discount %')" />

                            <x-input id="discount" class="block mt-1 w-full" type="number" name="discount"
                                :value="old('discount')" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-label for="scheduled_date" :value="__('Schedule Date')" />

                            <x-input id="scheduled_date" class="block mt-1 w-full" type="date" name="scheduled_date"
                                :value="old('scheduled_date')" required autofocus />
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
