<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        $this->createAdmin();
    }
    public function createAdmin() 
    {
        $user = User::create([
            'name' => 'admin',
            'gender' => 'male',
            'username' => 'admin',
            'email' => 'alejoxcaballero18@gmail.com',
            'password' => 'Caballero18',
            'role' => 'admin',
        ]);
        $user->markEmailAsVerified();
        $user->save();
    }
}
