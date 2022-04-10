 <table class="students-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Course Name
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Type
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Status
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

         var table = $('.students-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('courses.index') }}",
             columns: [
                 {
                     data: 'course_name',
                     name: 'course_name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'type',
                     name: 'type',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'status',
                     name: 'status',
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
