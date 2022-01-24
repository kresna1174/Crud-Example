<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridModel extends Model
{
    protected $table = "murid";
    protected $fillable = ['nama_lengkap', 'id_kelas', 'id_jurusan', 'tanggal_lahir', 'alamat'];
    public $timestamps = true;
    use HasFactory;

    public function kelas() {
        return $this->belongsTo(KelasModel::class, 'id_kelas', 'id');
    }
    
    public function jurusan() {
        return $this->belongsTo(JurusanModel::class, 'id_jurusan', 'id');
    }
}
