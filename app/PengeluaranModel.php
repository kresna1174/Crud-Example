<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengeluaranModel extends Model
{
    protected $table = 'pengeluaran';
    protected $primary_key = 'id';
    protected $guarded = [];

    function tabungan() {
        return $this->belongsTo(TabunganModel::class, 'id_tabungan', 'id' );
    }
}
