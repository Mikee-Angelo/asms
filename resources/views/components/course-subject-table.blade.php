 <table id="course-subject-datatable" class="w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Subject Code
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Description
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Actions
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {

         var table = $('#course-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax:  '{{ request()->course->id }}/subjects',
             columns: [
                 {
                     data: 'subject_code',
                     name: 'subject_code',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'description',
                     name: 'description',
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


        $('#semester').on('change', function() {
            var year = $('#year_level :selected').val();

            table.ajax.url('{{ request()->course->id }}/subjects?semester=' + this.value + '&year=' + year).load();
        });

         $('#year_level').on('change', function() {
            var semester = $('#semester :selected').val();

            table.ajax.url('{{ request()->course->id }}/subjects?semester=' + semester + '&year=' + this.value).load();
        });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
