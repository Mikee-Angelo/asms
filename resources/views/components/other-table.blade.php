 <table id="other-datatable" class="w-full leading-normal rounded-lg">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Name
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Price
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
         var table = $('#other-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('other.index') }}",
             columns: [{
                     data: 'course',
                     name: 'course',
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

         $('#semester').on('change', function () {
             var year = $('#year_level :selected').val();

             table.ajax.url('{{ route("other.index")}}?semester=' + this.value +
                 '&year=' + year).load();
         });

         $('#year_level').on('change', function () {
             var semester = $('#semester :selected').val();

             table.ajax.url('{{ route("other.index")}}?semester=' + semester + '&year=' +
                 this.value).load();
         });
     });

 </script>
