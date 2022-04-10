@section('title', 'Add Subject')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Subject') }}
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

                    <form action="{{route('subjects.store')}}" method="post" autocomplete="off">
                        @csrf
                        {{-- Course Code  --}}
                        <div class="mb-4">
                            <x-label for="subject_code" :value="__('Subject Code')" />

                            <x-input id="subject_code" class="block mt-1 w-full" type="text" name="subject_code"
                                :value="old('subject_code')" required autofocus />

                            <div id="search-container" class="bg-gray-100 mt-3 py-6 rounded hidden"></div>
                        </div>

                        {{-- Description  --}}
                        <div class="mb-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" required autofocus />
                        </div>


                        <div class="flex flex-row w-full">
                            {{-- Lecture Units --}}
                            <div class="mb-4 w-full mr-2">
                                <x-label for="lec" :value="__('Lecture Units')" />

                                <x-input id="lec" class="block mt-1 w-full" type="number" name="lec" :value="old('lec')"
                                     autofocus />
                            </div>

                            {{-- Lab Units --}}
                            <div class="mb-4 w-full ml-2">
                                <x-label for="lab" :value="__('Lab Units')" />

                                <x-input id="lab" class="block mt-1 w-full" type="number" name="lab" :value="old('lab')"
                                     autofocus />
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
    </div>

    <script type="text/javascript">
        $(function() { 
            $('#subject_code').on('keyup', function(){ 
                var subject_code = $(this).val();

                if(subject_code == undefined || subject_code == '' || subject_code.length < 3) { 
                    $('#search-container').addClass('hidden');

                    return; 
                }
                
                
                console.log(subject_code);

                $('#search-container').removeClass('hidden');
                $('#search-container').html('<p id="verify-text" class="w-full indent-96 text-gray-600 text-md md:text-lg px-6"> Verifying Subject Code ... </p>');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'search',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        method: '_POST',
                        subject_code: subject_code
                    }
                }).always(function (data) {
                    if(data.status) { 

                        $('.search-item').remove();
                        $('#verify-text').remove();


                        if (data.data != undefined) { 
                            if(data.data.length == 0 || subject_code == undefined) {
                                $('#search-container').addClass('hidden');
                            }else{ 
                                $('#search-container').html('<p id="verify-text" class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 pb-3"> Found ' + data.data.length + ' results ...</p>');


                                for(let x = 0; x < data.data.length; ++x){ 
                                    console.log(data.data[x].subject_code);

                                    $('#search-container').append('<p class="search-item w-full indent-96 text-gray-600 text-md md:text-lg px-6">' + data.data[x].subject_code + ' - ' + data.data[x].description + '</p>');
                                }
                            }

                        }else{ 
                            $('#search-container').addClass('hidden');
                        }
                        
                        
                    }

                });
            });
        });
    </script>
</x-app-layout>
