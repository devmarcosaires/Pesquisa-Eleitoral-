<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!app()->isProduction()) {
            $user = User::create([
                'name' => 'Administrador',
                'email' => 'admin@app.com',
                'phone' => '63000000000',
                'password' => bcrypt('admin')
            ]);

            $user->assignRole('administrador');
        }

    }
}
