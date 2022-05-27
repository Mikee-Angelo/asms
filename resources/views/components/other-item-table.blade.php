<table id="other-item-datatable" class="w-full leading-normal rounded-lg">
    <thead>
        <tr>
            <th
                class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                Name
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
<script type="text/javascript">
    $(function () {

        var table = $('#other-item-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('other.item.index', ['other' =>request()->route()->getName() == 'application.show' ? request()->application->course_other_id : request()->other ]) }}",
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


        $('#other-item-datatable').on('click', '.del-btn', function () {
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
                    $('#other-item-datatable').DataTable().draw(false);
                }
            });
        });
    });

</script>
