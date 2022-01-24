{!! Form::model($model, ['id' => 'formBeli']) !!}
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama Barang</label>
            {!! Form::text('nama_barang', $model->nama_barang, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Kode Barang</label>
            {!! Form::text('kode_barang', $model->kode_barang, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Jumlah</label>
            {!! Form::select('jumlah', \App\Library\Jumlah::data(), null, ['class' => 'form-control', 'id' => 'jumlah']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Harga</label>
            {!! Form::hidden('hidden_harga', $model->harga, ['id' => 'hiddenHarga']) !!}
            {!! Form::text('harga', \App\Library\Locale::numberFormat($model->harga), ['class' => 'form-control text-right', 'id' => 'harga', 'readonly']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label>Metode Pembayaran</label>
    {!! Form::select('metode_pembayaran', \App\Models\MetodePembayaran::data(), null, ['class' => 'form-control', 'id' => 'metodePembayaran', 'data-input-type' => 'select2']) !!}
</div>
<div id="formContent"></div>
<div class="form-group text-right">
    <button type="button" class="btn btn-outline-dark btn-lg" onclick="bootbox.hideAll()">Batal</button>
    <button type="button" class="btn btn-success btn-lg" onclick="bayar({{ $model->id }})">Bayar</button>
</div>
{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('assets/plugin/bluid.js') }}"></script>
<script>
    $('#jumlah').change(function() {
        let total = $('#jumlah').val() * $('#hiddenHarga').val();
        $('#harga').val(total);
        $('#total').val(total);
        $('#harga').number(true, 2, ',', '.');
        $('#total').number(true, 2, ',', '.');
    })
    $('#metodePembayaran').change(function () {
        if ($('#metodePembayaran').val() == '') {
            $('#formContent').html('');
        } else if ($('#metodePembayaran').val() == 'alfamart' || $('#metodePembayaran').val() == 'indomart') {
            $('#formContent').html('');
            $('#formContent').append(
                `<div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode" class="form-control text-danger" value="${makeid(10)}" readonly>
                </div>
                <div class="form-group">
                    <label>Kurir</label>
                    <select class="form-control" id="kurir"></select>
                </div>
                <div class="form-group">
                    <label>Total Bayar</label>
                    <input type="text" name="total" class="form-control text-right" id="total" value="${$('#harga').val()}" readonly>
                </div>`
            )
            $.each(JSON.parse('<?= json_encode(App\Models\Kurir::data()) ?>'), function(i, row) {
                $('#kurir').append(`<option value="${i}">${row}</option>`)
            })
            
        } else {
            $('#formContent').html('');
            $('#formContent').append(
                `<div class="form-group">
                    <label>Kurir</label>
                    <select class="form-control" id="kurir"></select>
                </div>
                <div class="form-group">
                    <label>Kode Rekening</label>
                    <input type="text" name="no_rekening" class="form-control">
                </div>
                <div class="form-group">
                    <label>Total Bayar</label>
                    <input type="text" name="total" class="form-control text-right" id="total" value="${$('#harga').val()}" readonly>
                </div>`
            )
            $.each(JSON.parse('<?= json_encode(App\Models\Kurir::data()) ?>'), function(i, row) {
                $('#kurir').append(`<option value="${i}">${row}</option>`)
            })
        }
    })

    function bayar(id) {
        $.ajax({
            url: '{{ route('bayar.store') }}/'+id,
            type: 'POST',
            data: $('#formBeli').serialize(),
            success: function(response) {
                if (response.success) {
                    
                } else {
                    
                }
            }
        })
    }
</script>