<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/build/styles/ltr-core.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/build/styles/ltr-vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
	<link href="{{ asset('assets/build/styles/style.css') }}" rel="stylesheet">
	@stack('styles')
	<title>@yield('title', 'Title') | {{ config('app.name') }} </title>
</head>

<body class="theme-light preload-active">
	<!-- BEGIN Preload -->
	<div class="preload">
		<div class="preload-message">
			<!-- BEGIN Spinner -->
			<div class="spinner-border text-primary"></div>
			<!-- END Spinner -->
			<span class="preload-text">Please wait...</span>
		</div>
	</div>
	<!-- END Preload -->
	<!-- BEGIN Page Holder -->
	<div class="holder">
		<!-- BEGIN Page Wrapper -->
		<div class="wrapper">
            <div class="content">
                <div class="container">
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title">Data Siswa</h3>
                            </div>
                            <div class="text-right my-3">
                                <button type="button" class="btn btn-primary" onclick="create()">Create</button>
                            </div>
                            <table class="table table-consoned table-hovered table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- END Page Wrapper -->
	</div>
	<!-- END Page Holder -->
	<!-- BEGIN Scroll To Top -->
	<div class="scrolltop">
		<button class="btn btn-info btn-icon btn-lg">
			<i class="fa fa-angle-up"></i>
		</button>
	</div>
	<div class="float-btn float-btn-right">
		<button class="btn btn-flat-primary btn-icon" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
			<i class="fa fa-moon"></i>
		</button>
	</div>
	<!-- END Float Button -->
	<script type="text/javascript" src="{{ asset('assets/build/scripts/mandatory.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/build/scripts/core.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/build/scripts/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/app/home.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/bootbox/bootbox.all.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/jquery-number/jquery.number.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/bluid.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugin/toastr.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
        var dataTable;
        $(function() {
            dataTable = $('#table').dataTable({
                ajax: '',
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', name: 'murid.id', render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'nama_lengkap', name: 'murid.nama_lengkap'},
                    {data: 'id_kelas', name: 'murid.id_kelas'},
                    {data: 'id_jurusan', name: 'murid.id_jurusan'},
                    {data: 'tanggal_lahir', name: 'murid.tanggal_lahir'},
                    {data: 'alamat', name: 'murid.alamat'},
                    {data: '_', searchable: false, orderable: false, style: 'white-space: nowrap', class: 'text-center'}
                ]
            });
        })

        function create() {
            $.ajax({
                url: '{{ route('crud.create') }}',
                success: function(response) {
                    bootbox.dialog({
                        title: 'Create data siswa',
                        message: response
                    })
                }
            })
        }

        function store() {
            $.ajax({
                url: '{{ route('crud.store') }}',
                type: 'POST',
                data: $('#formCreate').serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
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
                url: '{{ route('crud.edit') }}/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'Edit data siswa',
                        message: response
                    })
                }
            })
        }

        
        function update(id) {
            $.ajax({
                url: '{{ route('crud.update') }}/'+id,
                type: 'POST',
                data: $('#formEdit').serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
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
                url: '{{ route('crud.view') }}/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'View data siswa',
                        message: response
                    })
                }
            })
        }

        function destroy(id) {
            $.ajax({
                url: '{{ route('crud.delete') }}/'+id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        dataTable.api().ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        }
    </script>
</body>

</html>
