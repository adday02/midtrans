@push('js')
    <script>
        var table = $('#datatable').DataTable({
            ScrollX: true,
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                {data: 'DT_RowIndex', orderable: false},
                {data: 'name'},
                {data: 'email'},
                {data: 'status'},
                {data: 'action', name: 'action', orderable: false}
            ],
                "columnDefs": [{
                    "targets": [0,1,2,3,4],
                    "className": 'text-center',
                }]
        });
        
        function create() {
            $('#modal-form').modal('show');
            $('#modal-title').text('Add Users');
            $('#form')[0].reset();
            $('#id').val(null);
            method = 'Create';
        }

        function store() {
            var data = new FormData();
            data.append('id', $('#id').val());
            data.append('name', $('#name').val());
            data.append('email', $('#email').val());
            data.append('password', $('#password').val());

            $('#btn-save').text('Saving...').attr('disabled', true);

            $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                url: "{{ route('user-management.users.store') }}",
                data: data,
                success: function(data) {
                    Swal.fire({
                        title: method,
                        text: "Data "+method+" Successfully",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#modal-form').modal('hide');
                    $('#btn-save').text('Save').attr('disabled', false);
                    table.draw();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: jqXHR.responseJSON.message,
                        icon: "error",
                    });
                    $('#btn-save').text('Save').attr('disabled', false);
                }
            });
        }

        function edit(id) {
            $('#modal-title').text('Edit Users');
            $('#form')[0].reset();
            method = 'Update';

            var url = "{{ route('user-management.users.edit',":id") }}";
            url     = url.replace(':id', id);

            $.get(url, function (data) {
                $('#id').val(data.data.id);
                $('#name').val(data.data.name);
                $('#email').val(data.data.email);
                $('#modal-form').modal('show');
            });
        }

        function destroy(id) {
            var url = "{{ route('user-management.users.destroy',':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    "id": id
                },
                success: function(data) {
                    Swal.fire({
                        title: data.message,
                        text: "Data "+data.message+" Successfully",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.draw();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: jqXHR.responseJSON.message,
                        icon: "error",
                    });
                }
            });
        }
    </script>
@endpush