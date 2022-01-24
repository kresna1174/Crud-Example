<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'kode_barang' => 'BRG-00001',
            'nama_barang' => 'THINKPAD X210',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00001',
            'nama_barang' => 'THINKPAD X210',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00002',
            'nama_barang' => 'THINKPAD X220',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00003',
            'nama_barang' => 'THINKPAD X230',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00004',
            'nama_barang' => 'THINKPAD X240',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00005',
            'nama_barang' => 'THINKPAD X250',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00006',
            'nama_barang' => 'THINKPAD X260',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00007',
            'nama_barang' => 'THINKPAD X270',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00008',
            'nama_barang' => 'THINKPAD X280',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
        Barang::create([
            'kode_barang' => 'BRG-00009',
            'nama_barang' => 'THINKPAD X290',
            'stok' => 100,
            'harga' => 2000000,
            'DESKRIPSI' => 'BARU',
        ]);
    }
}
