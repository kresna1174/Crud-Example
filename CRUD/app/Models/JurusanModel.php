<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    protected $table = "jurusan";
    protected $guarded = [];
    public $timestamps = true;
    use HasFactory;
}
