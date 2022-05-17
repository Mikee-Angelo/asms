@section('title', 'Add Payment')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Add Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('status'))

                    <div class="p-4 mb-5 {{ session('status')['success'] ? 'text-green-600 bg-green-200 border-green-600' : 'text-red-600 bg-red-200 border-red-600'}}" role="alert">
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

                    <form action="{{route('application.payment.store', ['application' => request()->application ])}}" method="post">
                        @csrf

                        {{-- Transaction Type --}}
                        <div class="mb-4">
                            <x-label for="type" :value="__('Transaction Type')" />

                            <select
                                class="block w-full px-3 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                :value="old('type')" name="type">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($types as $type)
                                <option value="{{ $type }}">
                                    {{ $type }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Amount  --}}
                        <div class="mb-4">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input id="amount" class="block w-full mt-1" type="number" name="amount" :value="old('amount')"
                                required autofocus />
                        </div>

                        {{-- Description  --}}
                        <div class="mb-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block w-full mt-1" type="text" name="description"
                                :value="old('description')" autofocus />
                        </div>

                        {{-- Discount --}}
                        @if(count($discounts) > 0)
                        <div class="mb-4">
                            <x-label for="discount" :value="__('Apply Discount')" />
                        
                            <select
                                class="block w-full px-3 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                :value="old('discount')" name="discount">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">
                                    {{ $discount->name .' '.'('. $discount->discount.'%)'}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        

                        <button type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                            Add
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
