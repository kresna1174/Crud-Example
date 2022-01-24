<?php

namespace App\Http\Controllers;

use App\Library\Locale;
use App\Models\Bayar;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    public function store($id) {
        Bayar::create([
            'id_barang' => $id,
            'total_biaya' => Locale::numberValue(request('total')),
            'total_bayar' => Locale::numberValue(request('total')),
            'expired_at' => date('Y-m-d H:i:s', strtotime('+1days'))
        ]);
    }
}
