 <table class="pricing-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Course
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
                 Actions
             </th>

         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {
         let url = "{{ route('pricings.index') }}";

         var table = $('.pricing-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: url,
             columns: [{
                     data: 'course.course_name',
                     name: 'course',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'lec_price',
                     name: 'lec_price',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'lab_price',
                     name: 'lab_price',
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

             table.ajax.url(
                 url + '?semester=' + this.value + '&year=' + year).load();
         });

         $('#year_level').on('change', function () {
             var semester = $('#semester :selected').val();

             table.ajax.url(
                 url + '?semester=' + semester + '&year=' + this.value).load();
         });

     });

 </script>
