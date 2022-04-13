 <table class="course-students-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Student Number
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Last name
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Given name
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Middle Name
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

         var table = $('.course-students-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('students.index') }}?course={{ request()->course->id }}",
             columns: [{
                     data: 'student_number',
                     name: 'student_number',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'last_name',
                     name: 'last_name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'given_name',
                     name: 'given_name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'middle_name',
                     name: 'middle_name',
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

        $('#student_semester').on('change', function() {
            var year = $('#student_year_level :selected').val();

            table.ajax.url('{{ route("students.index") }}?course={{ request()->course->id }}&semester=' + this.value + '&year=' + year).load();
        });

         $('#student_year_level').on('change', function() {
            var semester = $('#student_semester :selected').val();

            table.ajax.url('{{ route("students.index") }}?course={{ request()->course->id }}&semester=' + semester + '&year=' + this.value).load();
        });


         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
