<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = "kelas";
    protected $guarded = [];
    public $timestamps = true;
    use HasFactory;
}
