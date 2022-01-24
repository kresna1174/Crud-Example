<div class="form-group">
    <label>Nama Lengkap</label>
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control', 'id' => 'namaLengkap']) !!}
</div>
<div class="form-group">
    <label>Kelas</label>
    {!! Form::select('kelas', ['' => 'pilih'] + App\Models\KelasModel::pluck('kelas', 'id')->toArray(), isset($model) ? $model->id_kelas : null, ['class' => 'form-control', 'id' => 'kelas']) !!}
</div>
<div class="form-group">
    <label>Jurusan</label>
    {!! Form::select('jurusan', ['' => 'pilih'] + App\Models\JurusanModel::pluck('jurusan', 'id')->toArray(), isset($model) ? $model->id_jurusan : null, ['class' => 'form-control', 'id' => 'jurusan']) !!}
</div>
<div class="form-group">
    <label>Tanggal Lahir</label>
    {!! Form::text('tanggal_lahir', isset($model) ? date('d-m-Y', strtotime($model->tanggal_lahir)) : null, ['class' => 'form-control', 'id' => 'tanggalLahir', 'data-input-type' => 'datepicker', 'autocomplete' => 'off']) !!}
</div>
<div class="form-group">
    <label>Alamat</label>
    {!! Form::textArea('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
</div>