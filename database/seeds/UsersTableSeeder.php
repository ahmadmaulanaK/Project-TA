<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Admin Arimbi',
            'email' => 'admin@arimbi.id',
            'password' => bcrypt('12345678')
        ]);
    }
}
