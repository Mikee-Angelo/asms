 <table class="w-full leading-normal rounded-lg miscellaneous-datatable">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Course
             </th>
             <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                Amount
            </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Actions
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {

         var table = $('.miscellaneous-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('miscellaneous.index') }}",
             columns: [
                 {
                     data: 'course_id',
                     name: 'course_id',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'amount',
                    name: 'amount',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'action',
                     name: 'action',
                     orderable: true,
                     searchable: true,
                     className: 'border p-4 dark:border-dark-5',
                 },
             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

        $('#semester').on('change', function() {
            var year = $('#year_level :selected').val();
            
            table.ajax.url('{{ route("miscellaneous.index")}}?semester=' + this.value +
            '&year=' + year).load();
        });
            
        $('#year_level').on('change', function() {
            var semester = $('#semester :selected').val();
            
            table.ajax.url('{{ route("miscellaneous.index")}}?semester=' + semester + '&year='
            + this.value).load();
        });

     });

 </script>
