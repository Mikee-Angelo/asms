 <table class="w-full leading-normal rounded-lg application-transaction-datatable">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Transaction Type
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Amount
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Description
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Created At
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>

 @if(Route::is('application.show'))
 <script type="text/javascript">
     $(function () {

         var table = $('.application-transaction-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('application.payment.index', ['application' => request()->application]) }}",
             columns: [{
                     data: 'type',
                     name: 'type',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'amount',
                     name: 'amount',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'description',
                     name: 'description',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'created_at',
                     name: 'created_at',
                     className: 'border p-4 dark:border-dark-5',
                 },

             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
 @endif

 @if(Route::is('students.show'))
 <script type="text/javascript">
     $(function () {

         var table = $('.application-transaction-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('application.payment.index', ['application' => request()->student->application->where('status', 'enrolled')->last()]) }}",
             columns: [{
                     data: 'type',
                     name: 'type',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'amount',
                     name: 'amount',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'description',
                     name: 'description',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'created_at',
                     name: 'created_at',
                     className: 'border p-4 dark:border-dark-5',
                 },

             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
 @endif

@role('Student')
    @if(Route::is('dashboard'))
    <script type="text/javascript">
        $(function () {

            var table = $('.application-transaction-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('application.payment.index', ['application' => Auth::user()->student->application->where('status', 'enrolled')->last()]) }}",
                columns: [{
                        data: 'type',
                        name: 'type',
                        className: 'border p-4 dark:border-dark-5',
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        className: 'border p-4 dark:border-dark-5',
                    },
                    {
                        data: 'description',
                        name: 'description',
                        className: 'border p-4 dark:border-dark-5',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'border p-4 dark:border-dark-5',
                    },

                ]
            });

            $('.dataTables_paginate').addClass(
                'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

        });

    </script>
    @endif
@endrole
