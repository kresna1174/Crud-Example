<?php

namespace Database\Seeders;

use App\Models\JurusanModel;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JurusanModel::create([
            'jurusan' => 'A'
        ]);
        JurusanModel::create([
            'jurusan' => 'B'
        ]);
        JurusanModel::create([
            'jurusan' => 'C'
        ]);
        JurusanModel::create([
            'jurusan' => 'D'
        ]);
        JurusanModel::create([
            'jurusan' => 'E'
        ]);
        JurusanModel::create([
            'jurusan' => 'F'
        ]);
        JurusanModel::create([
            'jurusan' => 'G'
        ]);
        JurusanModel::create([
            'jurusan' => 'H'
        ]);
    }
}
