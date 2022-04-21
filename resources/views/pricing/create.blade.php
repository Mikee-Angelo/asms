@section('title', 'Add Pricing')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Tuition Fee') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
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
        </div>

        <form action="{{route('pricings.store')}}" method="post">
            @csrf
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Course
                        </h2>

                        @foreach ($courses as $course)
                        <!-- School -->
                        <div class="block mt-2">
                            <label for="admission_status" class="inline-flex">
                                <input id="admission_status" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1"
                                    name="course[{{ $course->id }}]">
                                <x-label class="ml-2" :value="__($course->code . ' | ' . $course->course_name )" />
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Tuition Fee
                        </h2>

                        {{-- Lecture Unit Code --}}
                        <div class="mb-4">
                            <x-label for="lec_price" :value="__('Lecture Unit Price')" />

                            <x-input id="lec_price" class="block mt-1 w-full" type="number" name="lec_price"
                                :value="old('lec_price')" required autofocus />
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

                        <div>
                            <x-label for="scheduled_date" :value="__('Schedule Date')" />

                            <x-input id="scheduled_date" class="block mt-1 w-full" type="date" name="scheduled_date"
                                :value="old('scheduled_date')" required autofocus />
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

        {{-- Miscellanous Fees --}}
        <!--  <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="misc-container">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Miscellaneous Fees
                    </h2>

                    <div class="flex flex-row items-center">
                        {{-- Name --}}
                        <div class="mr-4 w-full">
                            <x-label for="name" :value="__('Name')" />

                            <x-input class="name block mt-1 w-full" type="text" name="misc-name[]" :value="old('misc-name[]')"
                                required autofocus />
                        </div>

                        {{-- Amount --}}
                        <div class="mr-4 w-full">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input class="amount block mt-1 w-full" type="number" name="misc-amount[]"
                                :value="old('misc-amount[]')" required autofocus />
                        </div>

                        {{-- Add Button --}}
                        <div>
                            <button type="button" id="add-misc-button"
                                class="py-2 px-4 mt-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                +
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->

        {{-- Other Fees --}}
        <!--   <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="others-container">
                    <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                        Other Fees
                    </h2>

                    <div class="flex flex-row items-center">
                        {{-- Lecture Unit Code --}}
                        <div class="mr-4 w-full">
                            <x-label for="others-name" :value="__('Name')" />

                            <x-input class="name block mt-1 w-full" type="text" name="others-name[]" :value="old('others-name[]')"
                                required autofocus />
                        </div>

                        {{-- Lecture Unit Code --}}
                        <div class="mr-4 w-full">
                            <x-label for="others-amount" :value="__('Amount')" />

                            <x-input class="amount block mt-1 w-full" type="number" name="others-amount[]"
                                :value="old('others-amount[]')" required autofocus />
                        </div>

                        {{-- Lecture Unit Code --}}
                        <div>
                            <button type="button" id="add-others-button"
                                class="py-2 px-4 mt-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                +
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->

    </div>

    <script type="text/javascript">
        $(function () {
            $('#add-misc-button').click(function () {
                $('#misc-container').append(`
                    <div class="flex flex-row items-center mt-3">
                        {{-- Lecture Unit Code --}}
                        <div class="mr-4 w-full">
                            <x-label for="name" :value="__('Name')" />

                            <x-input class="name block mt-1 w-full" type="text" name="misc-name[]" :value="old('misc-name[]')"
                                required autofocus />
                        </div>

                        <div class="mr-4 w-full">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input class="amount block mt-1 w-full" type="number" name="misc-amount[]"
                                :value="old('misc-amount[]')" required autofocus />
                        </div>

                        <div>
                            <button type="button" 
                                class="remove-misc-button py-2 px-4 mt-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                x
                            </button>
                        </div>
                    </div>
                `)
            });
        })

        $(document).on('click', '.remove-misc-button', function () {
            $(this).parents('.flex-row').remove();
        });

        //Other Fees
        $(function () {
            $('#add-others-button').click(function () {
                $('#others-container').append(`
                    <div class="flex flex-row items-center mt-3">
                        {{-- Lecture Unit Code --}}
                        <div class="mr-4 w-full">
                            <x-label for="name" :value="__('Name')" />

                            <x-input class="name block mt-1 w-full" type="text" name="others-name[]" :value="old('others-name[]')"
                                required autofocus />
                        </div>

                        <div class="mr-4 w-full">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input class="amount block mt-1 w-full" type="number" name="others-amount[]"
                                :value="old('others-amount[]')" required autofocus />
                        </div>

                        <div>
                            <button type="button" 
                                class="remove-others-button py-2 px-4 mt-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                x
                            </button>
                        </div>
                    </div>
                `)
            });
        })

        $(document).on('click', '.remove-others-button', function () {
            $(this).parents('.flex-row').remove();

            console.log('test');
        });

    </script>
</x-app-layout>
