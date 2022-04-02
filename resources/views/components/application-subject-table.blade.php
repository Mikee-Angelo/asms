 <table class="application-subject-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Subject Name
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Lec/Lab
             </th>
             {{-- <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Actions
             </th> --}}
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {

         var table = $('.application-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ url()->current() }}",
             columns: [
                 {
                     data: 'subject',
                     name: 'subject',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'leclab',
                     name: 'leclab',
                     className: 'border p-4 dark:border-dark-5',
                 },
                //  {
                //      data: 'action',
                //      name: 'action',
                //      orderable: true,
                //      searchable: true,
                //      className: 'border p-4 dark:border-dark-5',
                //  },
             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
