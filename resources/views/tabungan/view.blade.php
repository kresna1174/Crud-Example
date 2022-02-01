<table width="100%">
    <tr>
        <th>Nominal</th>
        <th>:</th>
        <td>{{ \App\Library\Locale::numberFormat($model->nominal) }}</td>
    </tr>
    <tr>
        <th>Tanggal Setor</th>
        <th>:</th>
        <td>{{ \App\Library\Locale::humanDate($model->tanggal) }}</td>
    </tr>
</table>