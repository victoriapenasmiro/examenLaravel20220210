<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //genero usuario base
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'mpenas@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('Examen2022'),
            'remember_token' => Str::random(10),
        ]);
    }
}
