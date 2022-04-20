 <table class="subject-students-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Student Number
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Name
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Prelim
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                Midterm
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                Prefinal
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                Final
             </th>
              <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                GWA
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

         var table = $('.subject-students-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('subjects.show', ['subject' => request()->subject->id ]) }}",
             columns: [{
                     data: 'student_number',
                     name: 'student_number',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'name',
                     name: 'name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                  {
                     data: 'prelim',
                     name: 'prelim',
                     className: 'border p-4 dark:border-dark-5',
                 },
                  {
                     data: 'midterm',
                     name: 'midterm',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'prefinal',
                     name: 'prefinal',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'final',
                     name: 'final',
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
