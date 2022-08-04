@section('title', 'Update Miscellaneous Fee')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Update Miscellaneous Fee') }}
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

                    <form action="{{route('miscellaneous.item.update', ['miscellaneou' => request()->miscellaneou, 'item' => $miscellaneous->id ])}}" method="post">
                        @method('PUT')
                        @csrf

                        {{-- Miscellaneous Name  --}}
                        <div class="mb-4">
                            <x-label for="name" :value="__('Fee Name')" />

                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" value="{{ $miscellaneous->name }}"
                                required autofocus />
                        </div>

                        {{-- Miscellaneous Price  --}}
                        <div class="mb-4">
                            <x-label for="price" :value="__('Price')" />

                            <x-input id="price" class="block w-full mt-1" type="number" name="price"
                                :value="old('price')" value="{{ $miscellaneous->price / 100 }}" required autofocus />
                        </div>


                        <button type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                            Update
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
