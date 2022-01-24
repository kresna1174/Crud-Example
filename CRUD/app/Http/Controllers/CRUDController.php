<?php

namespace App\Http\Controllers;

use App\Library\Locale;
use App\Models\MuridModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CRUDController extends Controller
{
    public function index() {
        if (request()->ajax()) {
            return DataTables::of(MuridModel::with('kelas')->with('jurusan')->get())
                ->editColumn('tanggal_lahir', function($row) {
                    return Locale::humanDate($row->tanggal_lahir);
                })
                ->editColumn('id_kelas', function($row) {
                    return $row->kelas->kelas;
                })
                ->editColumn('id_jurusan', function($row) {
                    return $row->jurusan->jurusan;
                })
                ->addColumn('_', function($row) {
                    return '<button type="button" class="btn btn-info" onclick="view('.$row->id.')">View</button>
                        <button type="button" class="btn btn-warning text-light" onclick="edit('.$row->id.')">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="destroy('.$row->id.')">Delete</button>';
                })
                ->rawColumns(['_'])
                ->toJson();
        }
        return view('crud.index');
    }

    public function create() {
        return view('crud.create');
    }

    public function store() {
        $post = request()->all();
        $post['id_jurusan'] = $post['jurusan'];
        $post['id_kelas'] = $post['kelas'];
        $post['tanggal_lahir'] = date('Y-m-d', strtotime($post['tanggal_lahir']));
        if (MuridModel::create($post)) {
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
        $model = MuridModel::with('kelas')->with('jurusan')->find($id);
        return view('crud.edit', compact('model'));
    }
    
    public function update($id) {
        $post = request()->all();
        $post['id_jurusan'] = $post['jurusan'];
        $post['id_kelas'] = $post['kelas'];
        $post['tanggal_lahir'] = date('Y-m-d', strtotime($post['tanggal_lahir']));
        $model = MuridModel::find($id);
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
        $model = MuridModel::with('kelas')->with('jurusan')->find($id);
        return view('crud.view', compact('model'));
    }

    public function delete($id) {
        $model = MuridModel::find($id);
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
