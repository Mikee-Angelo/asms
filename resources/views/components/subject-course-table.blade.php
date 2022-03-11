 <table id="subjects-course-datatable" class="w-full rounded-lg leading-normal">
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

         var table = $('#subjects-course-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "/courses/{{ request()->course }}/subjects/show",
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
                     data: 'lec',
                     name: 'lec',
                     className: 'border p-4 dark:border-dark-5',
                 },
                  {
                     data: 'lab',
                     name: 'lab',
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

        $('#subjects-course-datatable').on('click', '.add-button[data-remote]', function(e) {
           
            var url = $(this).data('remote');
            var semester = $("#semester :selected").val();
            var year_level = $("#year_level :selected").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/courses/{{ request()->course }}/subjects',
                type: 'POST',
                dataType: 'json',
                data: {
                    method: '_POST',
                    submit: true,
                    subject_id: url,
                    year: year_level,
                    semester: semester,
                    prerequisite_id: null,
                }
            }).always(function (data) {
                $('#subjects-course-datatable').DataTable().draw(false);
                $('#course-subject-datatable').DataTable().draw(false);
            });
        });

         $('.dataTables_paginate').addClass(
             'px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100');

     });

 </script>
