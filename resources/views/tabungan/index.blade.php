@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-right my-3">
                <button type="button" class="btn btn-primary" onclick="create()">Create</button>
            </div>
            <table class="table table-consoned table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>Nominal</th>
                        <th>Tanggal Setor</th>
                        <th width="250px"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
       var dataTable;
        $(function() {
            dataTable = $('#table').dataTable({
                ajax: '',
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', name: 'tabungan.id', render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'nominal', name: 'tabungan.nominal'},
                    {data: 'tanggal', name: 'tabungan.tanggal'},
                    {data: '_', searchable: false, orderable: false, style: 'white-space: nowrap', class: 'text-center'}
                ]
            });
        })

        function create() {
            $.ajax({
                url: '{{ route('tabungan.create') }}',
                success: function(response) {
                    bootbox.dialog({
                        title: 'Create tabungan',
                        message: response
                    })
                }
            })
        }

        function store() {
            $.ajax({
                url: '{{ route('tabungan.store') }}',
                type: 'POST',
                data: $('#formCreate').serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        bootbox.hideAll();
                        dataTable.api().ajax.reload()
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        }

        function edit(id) {
            $.ajax({
                url: '{{ route('tabungan.edit') }}/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'Edit tabungan',
                        message: response
                    })
                }
            })
        }

        
        function update(id) {
            $.ajax({
                url: '{{ route('tabungan.update') }}/'+id,
                type: 'POST',
                data: $('#formEdit').serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        bootbox.hideAll();
                        dataTable.api().ajax.reload()
                    } else {
                        toastr.errpr(response.message);
                    }
                }
            })
        }

        function view(id) {
            $.ajax({
                url: '{{ route('tabungan.view') }}/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'View tabungan',
                        message: response
                    })
                }
            })
        }

        function destroy(id) {
            $.ajax({
                url: '{{ route('tabungan.delete') }}/'+id,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        dataTable.api().ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        }
    </script>
@endsection