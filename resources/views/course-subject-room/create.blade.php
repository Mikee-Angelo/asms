@section('title', 'Assign Room')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Assign Room to '. $subject->description) }}
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

                    <form
                        action="{{route('course.subject.room.store', ['course' => request()->course, 'subject' => request()->subject ])}}"
                        method="post">
                        @csrf

                        {{-- Building --}}
                        <div class="mb-4">
                            <x-label for="building" :value="__('Building')" />

                            <select
                                id="building" class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                :value="old('building')" name="building" >
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($buildings as $building)
                                <option value="{{ $building->id }}" {{ !is_null(request()->input('building')) ?  request()->input('building') == $building->id ? 'selected' : '' : ''}}>
                                    {{ $building->name }}
                                </option>
                              
                                @endforeach
                            </select>
                        </div>

                         {{-- Room --}}
                        <div class="mb-4">
                            <x-label for="room" :value="__('Room Name')" />

                            <select
                                class="block w-full mt-1 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                :value="old('room')" name="room">
                                <option value="">
                                    Select an option
                                </option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">
                                    {{ $room->name }}
                                </option>
                              
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Add
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function() { 
            $('#building').change(function() { 
                let val = $(this).val();

                let url = '{{ route("course.subject.room.create", ["course" => request()->course, "subject" => request()->subject])}}?building=' + val;

                window.location = url;
            });
        });
    </script>
</x-app-layout>
