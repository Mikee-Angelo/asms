@section('title', 'Schedule | '.$instructor->name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule - '.$instructor->name) }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="flex flex-row">
            <div class="max-w-5xl mx-auto sm:px-4 lg:px-6">
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

                        <form action="{{route('subjects.store')}}" method="post" autocomplete="off">
                            @csrf

                            <!-- Schedule -->
                            <div class="mb-4">
                                <x-label for="schedule_id" :value="__('Instructor\'s Schedule')" />

                                <select :value="old('schedule_id')"
                                    class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    name="schedule_id">
                                    <option value="">
                                        Select an option
                                    </option>
                                    @foreach ($instructor->schedule as $schedule)
                                    <option value="{{ $schedule->id }}">
                                        {{ \Carbon\Carbon::parse($schedule->starts_at)->format('g:i A') }} -
                                        {{ \Carbon\Carbon::parse($schedule->ends_at)->format('g:i A') }}
                                        {{ $schedule->day }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Subjects -->
                            <div class="mb-4">
                                <x-label for="subject_id" :value="__('Subjects')" />

                                <select :value="old('course_id')"
                                    class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    name="course_id">
                                    <option value="">
                                        Select an option
                                    </option>
                                    @foreach ($course_subjects as $course_subject)
                                    <option value="{{ $course_subject->id }}">
                                        {{ $course_subject->subject->subject_code }} -
                                        {{ $course_subject->subject->description }} (
                                        {{ $course_subject->course->course_name }} {{ $course_subject->year }} -
                                        {{ $course_subject->semester }} )
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-row">
                                {{-- Starts At  --}}
                                <div class="mb-4 w-full mr-2">
                                    <x-label for="starts_at" :value="__('Starts At')" />
                                    <x-input id="starts_at" class="block mt-1 w-full" type="time" name="starts_at"
                                        :value="old('starts_at')" required autofocus />
                                </div>

                                {{-- Ends At --}}
                                <div class="mb-4 w-full ml-2">
                                    <x-label for="ends_at" :value="__('Ends At')" />
                                    <x-input id="ends_at" class="block mt-1 w-full" type="time" name="ends_at"
                                        :value="old('ends_at')" required autofocus />
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

            <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>


    </div>


</x-app-layout>
