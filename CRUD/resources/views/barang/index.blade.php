@extends('layout')

@section('title', 'Daftar Tiket')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="portlet-header portlet-header-bordered">
        <h3 class="portlet-title">Daftar Barang</h3>
    </div>
    <div class="row">
        @foreach (\App\Models\Barang::get() as $barang)
            <div class="col-3">
                <div class="portlet">
                    <div class="portlet-body">
                        <div class="widget8">
                            <div class="widget8-content">
                                <div class="image-wrapper">
                                    <img class="img-fluid" style="max-height:125px" src="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-footer">
                        <h3 class="text-center">{{ $barang->nama_barang }}</h3>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('barang.view', ['id' => $barang->id]) }}" class="btn btn-primary btn-lg btn-block mt-4">Beli</a>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-warning btn-lg btn-block mt-4">Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection