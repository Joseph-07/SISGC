<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Jose Zabaleta';
        $user->email = 'jose@codersfree.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Yoiberth Blanco';
        $user->email = 'yoib@codersfree.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
