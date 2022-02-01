<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com'
        ]);
    }
}
