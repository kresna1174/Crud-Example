<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        return view('barang.index');
    }

    public function view($id) {
        $model = Barang::find($id);
        return view('barang.view', compact('model'));
    }

    public function beli($id) {
        $model = Barang::find($id);
        return view('barang.beli', compact('model'));
    }
}
