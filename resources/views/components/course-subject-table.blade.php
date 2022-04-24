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
                 Lec
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Lab
             </th>
              <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Day
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Time
             </th>     
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Room
             </th>  

             @role('Accounting Head')
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Unit Price
             </th>  
             @endrole
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Actions
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>

 @unlessrole('Accounting Head')
<script type="text/javascript">
     $(function () {

         var table = $('#course-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax:  '{{ route("courses.subjects.index", ["course" => request()->course ])}}',
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
                    data: 'lec',
                    name: 'lec',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'lab',
                    name: 'lab',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'day',
                    name: 'day',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'time',
                    name: 'time',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'room',
                    name: 'room',
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

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + this.value + '&year=' + year).load();
        });

         $('#year_level').on('change', function() {
            var semester = $('#semester :selected').val();

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + semester + '&year=' + this.value).load();
        });
        
        $('#subject_school_year').on('change', function() {
            var year = $('#year_level :selected').val();
            var semester = $('#semester :selected').val();

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + semester + '&year=' + year + '&school_year=' + this.value ).load();
        });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>

 @else
 <script type="text/javascript">
     $(function () {

         var table = $('#course-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax:  '{{ route("courses.subjects.index", ["course" => request()->course ])}}',
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
                    data: 'lec',
                    name: 'lec',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'lab',
                    name: 'lab',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'day',
                    name: 'day',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'time',
                    name: 'time',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'room',
                    name: 'room',
                    className: 'border p-4 dark:border-dark-5',
                 },
                 {
                    data: 'pricing',
                    name: 'pricing',
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

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + this.value + '&year=' + year).load();
        });

         $('#year_level').on('change', function() {
            var semester = $('#semester :selected').val();

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + semester + '&year=' + this.value).load();
        });
        
        $('#subject_school_year').on('change', function() {
            var year = $('#year_level :selected').val();
            var semester = $('#semester :selected').val();

            table.ajax.url('{{ route("courses.subjects.index", ["course" => request()->course ])}}?semester=' + semester + '&year=' + year + '&school_year=' + this.value ).load();
        });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>

 @endunlessrole