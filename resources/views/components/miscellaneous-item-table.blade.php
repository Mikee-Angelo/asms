 <table id="miscellaneous-item-datatable" class="w-full leading-normal rounded-lg">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Fee
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Price
             </th>
             <th
                 class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                 Actions
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>
 @role('Accounting Head')
 <script type="text/javascript">
     $(function () {

         var table = $('#miscellaneous-item-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('miscellaneous.item.index', ['miscellaneou' => request()->miscellaneou ]) }}",
             columns: [{
                     data: 'name',
                     name: 'name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'price',
                     name: 'price',
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

         $('#miscellaneous-item-datatable').on('click', '.del-btn', function () {
             var data = $(this).data('remote');

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: 'item/' + data,
                 type: 'DELETE',
                 dataType: 'json',
                 data: {
                     method: '_DELETE',
                     submit: true
                 }
             }).always(function (data) {
                 if (data.status) {
                     $('#miscellaneous-item-datatable').DataTable().draw(false);
                 }
             });
         });

     });

 </script>
 @endrole

@role('Super Admin')
<script type="text/javascript">
    $(function () {

         var table = $('#miscellaneous-item-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('miscellaneous.item.index', ['miscellaneou' => request()->miscellaneou ]) }}",
             columns: [{
                     data: 'name',
                     name: 'name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'price',
                     name: 'price',
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

         $('#miscellaneous-item-datatable').on('click', '.del-btn', function () {
             var data = $(this).data('remote');

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: 'item/' + data,
                 type: 'DELETE',
                 dataType: 'json',
                 data: {
                     method: '_DELETE',
                     submit: true
                 }
             }).always(function (data) {
                 if (data.status) {
                     $('#miscellaneous-item-datatable').DataTable().draw(false);
                 }
             });
         });

     });

</script>
@endrole

 @role('Student')
 <script type="text/javascript">
     $(function () {

         var table = $('#miscellaneous-item-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('miscellaneous.item.index', ['miscellaneou' => Auth::user()->student->application->where('status', 'enrolled')->last()->course_miscellaneous_id ]) }}",
             columns: [{
                     data: 'name',
                     name: 'name',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'price',
                     name: 'price',
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

         $('#miscellaneous-item-datatable').on('click', '.del-btn', function () {
             var data = $(this).data('remote');

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: 'item/' + data,
                 type: 'DELETE',
                 dataType: 'json',
                 data: {
                     method: '_DELETE',
                     submit: true
                 }
             }).always(function (data) {
                 if (data.status) {
                     $('#miscellaneous-item-datatable').DataTable().draw(false);
                 }
             });
         });

     });

 </script>
 @endrole