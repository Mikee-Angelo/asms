 <table id="suggested-subject-datatable" class="w-full rounded-lg leading-normal">
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
                 Actions
             </th>
         </tr>
     </thead>
     <tbody>

     </tbody>
 </table>

 <script type="text/javascript">
     $(function () {
         let url = '{{ route("application.subject.index", ["application" => request()->application ] ) }}?suggested=true';

         var table = $('#suggested-subject-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: url,
             columns: [{
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

         $('#suggested-subject-datatable').on('click', '.as-add-btn', function () {
             var data = $(this).data('remote');

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: " {{ route('application.subject.store', ['application' => request()->application]) }} ",
                 type: 'POST',
                 dataType: 'json',
                 data: {
                     method: '_POST',
                     subject_id: data,
                     submit: true,
                 }
             }).always(function (data) {
                 if (data.status) {
                     $('.application-subject-datatable').DataTable().draw(false);
                     $('#suggested-subject-datatable').DataTable().draw(false);
                 }
             });
         });

         $('#semester').on('change', function () {
             var year = $('#year_level :selected').val();

             table.ajax.url(
                 url + '&semester=' + semester +
                 this.value + '&year=' + year).load();
         });

         $('#year_level').on('change', function () {
             var semester = $('#semester :selected').val();

             table.ajax.url(
                 url + '&semester=' + semester +
                 semester + '&year=' + this.value).load();
         });

     });

 </script>
