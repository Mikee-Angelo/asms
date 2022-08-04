@section('title', 'Miscellaneous Items')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Miscellaneous Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @if(!$hasEnrolled)
                <div class="flex flex-row-reverse mb-3">
                    <a href="{{route('miscellaneous.item.create', ['miscellaneou' => request()->miscellaneou ])}}"
                        class="inline-flex items-center justify-end px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Add</a>
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-miscellaneous-item-table></x-miscellaneous-item-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>