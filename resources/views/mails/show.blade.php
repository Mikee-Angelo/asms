@section('title', 'Mail')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($mail->tag. ' Mail') }}
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

                    <form action="{{route('mail.update',['mail' => $mail->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        {{-- Description  --}}
                        <div class="mb-4">
                            <x-label for="description" :value="__('Email Content')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" required autofocus  value="{{ $mail->description }}"/>
                        </div>

                        {{-- Send --}}

                        <button type="submit"
                             class="justify-end inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Update
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
