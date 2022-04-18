 <table class="create-schedule-datatable w-full rounded-lg leading-normal">
     <thead>
         <tr>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Day
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Starts At
             </th>
             <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Ends At
             </th>
              <th
                 class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                 Status
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

         var table = $('.create-schedule-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('schedule.create') }}",
             columns: [{
                     data: 'day',
                     name: 'day',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'starts_at',
                     name: 'starts_at',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'ends_at',
                     name: 'ends_at',
                     className: 'border p-4 dark:border-dark-5',
                 },
                 {
                     data: 'status',
                     name: 'status',
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


         $('#all-week-button').click(function () {
             $('.days').prop('checked', true);
         });

         $('#mw-button').click(function () {
             $('.days-container:nth-child(1) .days').prop('checked', true);
             $('.days-container:nth-child(3) .days').prop('checked', true);
         });

         $('#tth-button').click(function () {
             $('.days-container:nth-child(2) .days').prop('checked', true);
             $('.days-container:nth-child(4) .days').prop('checked', true);
         });

         $('#clear-button').click(function () {
             $('.days').prop('checked', false);
         });

         $('#submit-verification-checkbox').change(function () {
             if ($(this).is(":checked")) {
                 $('.submit-button').prop('disabled', false);
             } else {
                 $('.submit-button').prop('disabled', true);
             }
         });

         $('.submit-button').click(function () {

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 url: '{{ route("schedule.submit")}}',
                 type: 'POST',
                 dataType: 'json',
                  data: {
                    method: '_POST',
                    }
             }).always(function (data) {
                 if (data.status) {
                     $('.create-schedule-datatable').DataTable().draw(false);
                 }
             });
         });

     });

 </script>
