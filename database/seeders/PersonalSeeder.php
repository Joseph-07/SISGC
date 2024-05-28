<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personal = new Personal();
        $personal->name = 'Jose';
        $personal->last_name = 'Zabaleta';
        $personal->code = '3833';
        $personal->email = 'jose@zabaleta';
        $personal->phone = '12345678';
        $personal->address= 'Calle 123';
        $personal->role = 'admin';
        $personal->password = bcrypt('1234');
        $personal->save();
    }
}
