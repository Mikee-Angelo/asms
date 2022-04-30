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

             @role('Accounting Head')
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Unit Price
             </th>
             @else
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Actions
             </th>
             @endrole

         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>

 @unlessrole('Accounting Head')
 <script type="text/javascript">
     $(function () {

         var table = $('.application-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('application.subject.index', ['application' => request()->application ]) }}",
             columns: [{
                     data: 'subject',
                     name: 'subject',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'leclab',
                     name: 'leclab',
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

        $('.application-subject-datatable').on('click', '.as-del-btn', function(){ 
             var data = $(this).data('remote'); 

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             console.log(data);
             $.ajax({
                url:  'subject/' + data,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    method: '_DELETE',
                    submit: true
                }
            }).always(function (data) {
                if(data.status) { 
                    $('.application-subject-datatable').DataTable().draw(false);
                    $('#suggested-subject-datatable').DataTable().draw(false);
                }
            });
         });


     });

 </script>

 @else
 <script type="text/javascript">
     $(function () {

         var table = $('.application-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('application.show', ['application' => request()->application ]) }}",
             columns: [{
                     data: 'subject',
                     name: 'subject',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'leclab',
                     name: 'leclab',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'pricing',
                     name: 'pricing',
                     className: 'border p-4 dark:border-dark-5',
                 },
             ]
         });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>

 @endunlessrole
