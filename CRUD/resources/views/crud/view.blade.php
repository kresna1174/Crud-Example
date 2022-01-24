<table class="table">
    <tr>
        <th>Nama Lengkap</th>
        <th>:</th>
        <td>{{ $model->nama_lengkap }}</td>
    </tr>
    <tr>
        <th>Kelas</th>
        <th>:</th>
        <td>{{ $model->kelas->kelas }}</td>
    </tr>
    <tr>
        <th>Jurusan</th>
        <th>:</th>
        <td>{{ $model->jurusan->jurusan }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <th>:</th>
        <td>{{ $model->alamat }}</td>
    </tr>
</table>