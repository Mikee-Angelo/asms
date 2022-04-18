 <table class="curriculum-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Curriculum
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Created At
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

         var table = $('.curriculum-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('curriculum.index') }}",
             columns: [
                 {
                     data: 'curriculum',
                     name: 'curriculum',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'created_at',
                     name: 'created_at',
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

        $(".curriculum-datatable").on('click', '.set-default-btn[data-remote]', function (e) {
            
            e.preventDefault();

            console.log('e');

            var url = $(this).data('remote');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/curriculum/' + url,
                type: 'PUT',
                dataType: 'json',
                data: {
                    method: '_PUT',
                    submit: true
                }
            }).always(function (data) {
                $('.curriculum-datatable').DataTable().draw(false);
            });
        });

     });

 </script>
