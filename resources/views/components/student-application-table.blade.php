 <table class="students-application-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Ticket No.
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Course
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Year
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Semester
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

         var table = $('.students-application-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('students.application.index', ['student' => request()->student ]) }}",
             columns: [
                 {
                     data: 'ticket_no',
                     name: 'ticket_no',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'course',
                     name: 'course',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'year_level',
                     name: 'year_level',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'semester',
                     name: 'semester',
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

     });

 </script>
