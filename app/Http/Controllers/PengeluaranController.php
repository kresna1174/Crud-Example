<?php

namespace App\Http\Controllers;

use App\PengeluaranModel;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    function index() {
        if (request()->ajax()) {
            return \DataTables::of(PengeluaranModel::with('tabungan')->get())
                ->editColumn('id_tabungan', function($row) {
                   return \App\Library\Locale::humanDate($row->tabungan->nominal);
                })
                ->addColumn('tanggal_ambil', function($row) {
                    return \App\Library\Locale::humanDate($row->created_at);
                 })
                ->addColumn('_', function($row) {
                    return '<button type="button" class="btn btn-info" onclick="view('.$row->id.')">View</button>
                        <button type="button" class="btn btn-warning text-light" onclick="edit('.$row->id.')">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="destroy('.$row->id.')">Delete</button>';
                })
                ->rawColumns(['_', 'tanggal_ambil'])
                ->toJson();
        }
        return view('pengeluaran.index');
    }

    public function create() {
        return view('pengeluaran.create');
    }

    public function store() {
        $post = request()->all();
        $post['tanggal'] = date('Y-m-d');
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['created_by'] = auth()->user()->id;
        if (PengeluaranModel::create($post)) {
            return [
                'success' => true,
                'message' => 'Data berhasil ditambahkan'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Data gagal ditambahkan'
            ];
        }
    }

    public function edit($id) {
        $model = PengeluaranModel::find($id);
        return view('pengeluaran.edit', compact('model'));
    }

    public function update($id) {
        $post = request()->all();
        $post['tanggal'] = date('Y-m-d');
        $post['nominal'] = \App\Library\Locale::numberValue($post['nominal']);
        $post['updated_at'] = date('Y-m-d H:i:s');
        $post['updated_by'] = auth()->user()->id;
        $model = PengeluaranModel::find($id);
        if ($model->update($post)) {
            return [
                'success' => true,
                'message' => 'Data berhasil diubah'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Data gagal diubah'
            ];
        }
    }

    public function view($id) {
        $model = PengeluaranModel::find($id);
        return view('pengeluaran.view', compact('model'));
    }

    public function delete($id) {
        $model = PengeluaranModel::find($id);
        if ($model) {
            if ($model->delete()) {
                return [
                    'success' => true,
                    'message' => 'Data berhasil dihapus'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Data gagal dihapus'
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ];
        }
    }
}
