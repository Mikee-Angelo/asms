@section('title', 'Profile | '. $student->given_name.' '.$student->last_name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-gray-800 dark:text-white text-xl font-medium">
                        {{$student->last_name.', '.$student->given_name}}
                    </h1>
                    <p class="text-gray-400 text-xs">
                        FullStack dev
                    </p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
