@section('title', 'Add Role')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Role') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">

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

                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Role
                        </h2>

                        {{-- Course Code  --}}
                        <div class="mb-4">
                            <x-label for="name" :value="__('Role Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus />
                        </div>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Permissions
                        </h2>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Course
                        </h2>

                        <div class="flex flex-row">
                            <div class="block mr-5">
                                <label for="all_course" class="inline-flex items-center">
                                    <input id="all_course" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_course">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_course" class="inline-flex items-center">
                                    <input id="view_course" type="checkbox" value="view course"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_course">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_course" class="inline-flex items-center">
                                    <input id="add_course" type="checkbox" value="add course"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_course">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_course" class="inline-flex items-center">
                                    <input id="delete_course" type="checkbox" value="delete course"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_course">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_course" class="inline-flex items-center">
                                    <input id="edit_course" type="checkbox" value="edit course"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_course">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Subjects
                        </h2>

                        <div class="flex flex-row">

                            <div class="block mr-5">
                                <label for="all_subjects" class="inline-flex items-center">
                                    <input id="all_subjects" type="checkbox" 
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_subjects">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_subjects" class="inline-flex items-center">
                                    <input id="view_subjects" type="checkbox" value="view subjects"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_subjects">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_subjects" class="inline-flex items-center">
                                    <input id="add_subjects" type="checkbox"  value="add subjects"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_subjects">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_subjects" class="inline-flex items-center">
                                    <input id="delete_subjects" type="checkbox" value="delete subjects"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_subjects">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_subjects" class="inline-flex items-center">
                                    <input id="edit_subjects" type="checkbox" value="edit subjects"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_subjects">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Students
                        </h2>

                        <div class="flex flex-row">

                            <div class="block mr-5">
                                <label for="all_students" class="inline-flex items-center">
                                    <input id="all_students" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_students">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_students" class="inline-flex items-center">
                                    <input id="view_students" type="checkbox" value="view students"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_students">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_students" class="inline-flex items-center">
                                    <input id="add_students" type="checkbox" value="add students"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_students">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_students" class="inline-flex items-center">
                                    <input id="delete_students" type="checkbox" value="delete students"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_students">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_students" class="inline-flex items-center">
                                    <input id="edit_students" type="checkbox" value="edit students"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_students">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Applications
                        </h2>

                        <div class="flex flex-row">

                            <div class="block mr-5">
                                <label for="all_applications" class="inline-flex items-center">
                                    <input id="all_applications" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_applications">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_applications" class="inline-flex items-center">
                                    <input id="view_applications" type="checkbox" value="view applications"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_applications">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_applications" class="inline-flex items-center">
                                    <input id="add_applications" type="checkbox" value="add applications"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_applications">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_applications" class="inline-flex items-center">
                                    <input id="delete_applications" type="checkbox" value="delete applications"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_applications">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_applications" class="inline-flex items-center">
                                    <input id="edit_applications" type="checkbox" value="edit applications"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_applications">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Pricings
                        </h2>

                        <div class="flex flex-row">

                            <div class="block mr-5">
                                <label for="all_pricings" class="inline-flex items-center">
                                    <input id="all_pricings" type="checkbox" 
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_pricings">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_pricings" class="inline-flex items-center">
                                    <input id="view_pricings" type="checkbox" value="view pricings"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_pricings">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_pricings" class="inline-flex items-center">
                                    <input id="add_pricings" type="checkbox" value="add pricings"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_pricings">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_pricings" class="inline-flex items-center">
                                    <input id="delete_pricings" type="checkbox" value="delete pricings"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_pricings">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_pricings" class="inline-flex items-center">
                                    <input id="edit_pricings" type="checkbox" value="edit pricings"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_pricings">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>

                        <h2 class="w-full my-2 text-2xl font-black leading-tight text-gray-800 mb-3 mt-5">
                            Roles
                        </h2>

                        <div class="flex flex-row">

                            <div class="block mr-5">
                                <label for="all_roles" class="inline-flex items-center">
                                    <input id="all_roles" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="all_roles">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('All') }}</span>
                                </label>
                            </div>


                            <div class="block mr-5">
                                <label for="view_roles" class="inline-flex items-center">
                                    <input id="view_roles" type="checkbox" value="view roles"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="view_roles">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('View') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="add_roles" class="inline-flex items-center">
                                    <input id="add_roles" type="checkbox"  value="add roles"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="add_roles">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Add') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="delete_roles" class="inline-flex items-center">
                                    <input id="delete_roles" type="checkbox"  value="delete roles"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="delete_roles">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Delete') }}</span>
                                </label>
                            </div>

                            <div class="block mr-5">
                                <label for="edit_roles" class="inline-flex items-center">
                                    <input id="edit_roles" type="checkbox"  value="edit roles"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="edit_roles">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Edit') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <button type="submit"
                            class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function () {

            //Course
            $('#all_course').click(function () {
                var status = $(this).is(':checked');

                $('#view_course').prop('checked', status);
                $('#add_course').prop('checked', status);
                $('#delete_course').prop('checked', status);
                $('#edit_course').prop('checked', status);

            });

            //Subjects
            $('#all_subjects').click(function () {
                var status = $(this).is(':checked');

                $('#view_subjects').prop('checked', status);
                $('#add_subjects').prop('checked', status);
                $('#delete_subjects').prop('checked', status);
                $('#edit_subjects').prop('checked', status);

            });

            //Students
            $('#all_students').click(function () {
                var status = $(this).is(':checked');

                $('#view_students').prop('checked', status);
                $('#add_students').prop('checked', status);
                $('#delete_students').prop('checked', status);
                $('#edit_students').prop('checked', status);

            });

            //Applications
            $('#all_applications').click(function () {
                var status = $(this).is(':checked');

                $('#view_applications').prop('checked', status);
                $('#add_applications').prop('checked', status);
                $('#delete_applications').prop('checked', status);
                $('#edit_applications').prop('checked', status);
            });

            //Pricings
            $('#all_pricings').click(function () {
                var status = $(this).is(':checked');

                $('#view_pricings').prop('checked', status);
                $('#add_pricings').prop('checked', status);
                $('#delete_pricings').prop('checked', status);
                $('#edit_pricings').prop('checked', status);
            });

            //Roles
            $('#all_roles').click(function () {
                var status = $(this).is(':checked');

                $('#view_roles').prop('checked', status);
                $('#add_roles').prop('checked', status);
                $('#delete_roles').prop('checked', status);
                $('#edit_roles').prop('checked', status);
            });


        });

    </script>
</x-app-layout>
