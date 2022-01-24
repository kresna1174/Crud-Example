<?php

namespace Database\Seeders;

use App\Models\KelasModel;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelasModel::create([
            'kelas' => 'A'
        ]);
        KelasModel::create([
            'kelas' => 'B'
        ]);
        KelasModel::create([
            'kelas' => 'C'
        ]);
        KelasModel::create([
            'kelas' => 'D'
        ]);
        KelasModel::create([
            'kelas' => 'E'
        ]);
        KelasModel::create([
            'kelas' => 'F'
        ]);
        KelasModel::create([
            'kelas' => 'G'
        ]);
        KelasModel::create([
            'kelas' => 'H'
        ]);
    }
}
