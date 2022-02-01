<?php

namespace App\Http\Controllers;

use App\TabunganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabunganController extends Controller
{
    function index() {
        if (request()->ajax()) {
            return \DataTables::of(TabunganModel::get())
                ->editColumn('nominal', function($row) {
                    return \App\Library\Locale::numberFormat($row->nominal);
                }) 
                ->editColumn('tanggal', function($row) {
                    return \App\Library\Locale::humanDate($row->tanggal);
                }) 
                ->editColumn('_', function($row) {
                    return '<button type="button" class="btn btn-info" onclick="view('.$row->id.')">View</button>
                        <button type="button" class="btn btn-warning text-light" onclick="edit('.$row->id.')">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="destroy('.$row->id.')">Delete</button>';
                })
                ->rawColumns(['_'])
                ->toJson();
        }
        return view('tabungan.index');
    }

    public function create() {
        return view('tabungan.create');
    }

    public function store() {
        $post = request()->all();
        $post['tanggal'] = date('Y-m-d');
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['created_by'] = auth()->user()->id;
        if (TabunganModel::create($post)) {
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
        $model = TabunganModel::find($id);
        return view('tabungan.edit', compact('model'));
    }
    
    public function update($id) {
        $post = request()->all();
        $post['tanggal'] = date('Y-m-d');
        $post['nominal'] = \App\Library\Locale::numberValue($post['nominal']);
        $post['updated_at'] = date('Y-m-d H:i:s');
        $post['updated_by'] = auth()->user()->id;
        $model = TabunganModel::find($id);
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
        $model = TabunganModel::find($id);
        return view('tabungan.view', compact('model'));
    }

    public function delete($id) {
        $model = TabunganModel::find($id);
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
