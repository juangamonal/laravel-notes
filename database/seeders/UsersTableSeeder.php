<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Gamonal',
            'email' => 'juangamonalh@gmail.com',
            'password' => Hash::make(12345678)
        ]);
    }
}
