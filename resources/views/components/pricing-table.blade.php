 <table class="pricing-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Lecture Price
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Lab Price
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Discount
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Scheduled Date
             </th>
          
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 <script type="text/javascript">
     $(function () {

         var table = $('.pricing-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('pricings.index') }}",
             columns: [
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
                     data: 'discount',
                     name: 'discount',
                     className: 'border p-4 dark:border-dark-5',
                 }, 
                  {
                     data: 'scheduled_date',
                     name: 'scheduled_date',
                     className: 'border p-4 dark:border-dark-5',
                 }, 
              
             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
