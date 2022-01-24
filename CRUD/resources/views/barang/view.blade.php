@extends('layout')

@section('title', 'Daftar Tiket')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="portlet-header portlet-header-bordered">
        <h3 class="portlet-title">Detail Barang ({{ $model->kode_barang .' - '. $model->nama_barang }})</h3>
    </div>
    <div class="portlet">
        <div class="portlet-body">
            <table width="100%">
                <tr>
                    <th>Nama Barang</th>
                    <th>:</th>
                    <td>{{ $model->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Kode Barang</th>
                    <th>:</th>
                    <td>{{ $model->kode_barang }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <th>:</th>
                    <td>{{ $model->stok }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td>{{ \App\Library\Locale::numberFormat($model->harga) }}</td>
                </tr>
            </table>
            <div class="form-group mt-5">
                <label>Deskripsi :</label><br>
                {{$model->deskripsi}}
            </div>
        </div>
        <div class="portlet-footer text-right">
            <button type="button" onclick="beli({{ $model->id }})" class="btn btn-primary btn-lg">Beli</button>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function beli(id) {
            $.ajax({
                url: '{{ route('barang.beli') }}/'+id,
                success: function (response) {
                    bootbox.dialog({
                        title: 'Konfirmasi Pembelian',
                        message: response,
                        size: 'large'
                    })
                }
            })
        }
    </script>
@endpush