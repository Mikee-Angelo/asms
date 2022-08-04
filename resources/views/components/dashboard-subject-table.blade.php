 <table class="dashboard-subjects-datatable w-full rounded-lg leading-normal">
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
                 Lec/Lab
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
                 Faculty
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
             
            
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {

         var table = $('.dashboard-subjects-datatable').DataTable({
             processing: true,
             serverSide: true,
             scrollX: true,
             ajax: "{{ route('dashboard') }}",
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
                     data: 'leclab',
                     name: 'leclab',
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
                     data: 'faculty',
                     name: 'faculty',
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
             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
