 <table class="school-year-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Academic Year
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Range
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

         var table = $('.school-year-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('school-year.index') }}",
             columns: [
                 {
                     data: 'academic_year',
                     name: 'academic_year',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'starts_at',
                     name: 'starts_at',
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
