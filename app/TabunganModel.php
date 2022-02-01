<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabunganModel extends Model
{
    protected $table = 'tabungan';
    protected $primary_key = 'id';
    protected $guarded = [];
}
