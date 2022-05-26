@section('title', 'Create Other Fee')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Create Other Fee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('status'))

                    <div class="p-4 mb-5 text-green-600 bg-green-200 border-l-4 border-green-600" role="alert">
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

                    <form action="{{route('other.store')}}" method="post">
                        @csrf

                        <!-- Course -->
                        <div class="mb-4">
                            <x-label for="course_id" :value="__('Course')" />

                            <select :value="old('course_id')"
                                class="block w-full px-3 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="course_id">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->code }} - {{ $course->course_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Year Level -->
                        <div class="mb-4">
                            <x-label for="year_level" :value="__('Year')" />

                            <select :value="old('year_level')"
                                class="block w-full px-3 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="year_level">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                            </select>

                        </div>

                        <!-- Year Level -->
                        <div class="mb-4">
                            <x-label for="semester" :value="__('Semester')" />

                            <select :value="old('semester')"
                                class="block w-full px-3 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                name="semester">
                                <option value="">
                                    Select an option
                                </option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                            </select>

                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                            Create
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>