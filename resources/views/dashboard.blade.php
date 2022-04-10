@section('title', 'Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="shadow-lg rounded-2xl w-full p-4 bg-white dark:bg-gray-800 mr-2">
                <div class="flex items-center">

                    <p class="text-md text-gray-700 dark:text-gray-50">
                        Total Number of Student
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-800 text-4xl text-left dark:text-white font-bold mt-4">
                        {{ $total_number_of_student }}
                    </p>

                </div>
            </div>

            <div class="shadow-lg rounded-2xl w-full p-4 bg-white dark:bg-gray-800 mx-2">
                <div class="flex items-center">

                    <p class="text-md text-gray-700 dark:text-gray-50">
                        Active Students
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-800 text-4xl text-left dark:text-white font-bold mt-4">
                        {{ $active_student }}
                    </p>

                </div>
            </div>

            <div class="shadow-lg rounded-2xl w-full p-4 bg-white dark:bg-gray-800 ml-2">
                <div class="flex items-center">

                    <p class="text-md text-gray-700 dark:text-gray-50">
                        Number of Faculty
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-gray-800 text-4xl text-left dark:text-white font-bold mt-4">
                        36
                    </p>

                </div>
            </div>
        </div>

        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
             <div class="w-full mr-2">
                <div class="bg-white overflow-hidden sm:rounded-lg shadow-lg rounded-2xl">
                    
                    <div class="p-6 bg-white border-b border-gray-200">
                         <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Enrolled Students By Course
                        </h2>

                        <div id="chart" class="h-96"></div>
                    </div>
                </div>
            </div>

            <div class="w-full ml-2">
                <div class="bg-white overflow-hidden sm:rounded-lg shadow-lg rounded-2xl">
                    <div class="p-6 bg-white border-b border-gray-200">
                         <h2 class="w-full my-2 text-3xl font-black leading-tight text-gray-800 mb-5">
                            Students per year
                        </h2>
                        <div id="enroll-bar-chart" class="h-96"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script type="text/javascript">
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('course_chart')",
            hooks: new ChartisanHooks()
               .datasets([{ type: 'pie', fill: false }, 'bar']),
        });

         const chartA = new Chartisan({
            el: '#enroll-bar-chart',
            url: "@chart('enroll_bar_chart')",
            hooks: new ChartisanHooks()
                .datasets('bar'),
        });

    </script>
</x-app-layout>
