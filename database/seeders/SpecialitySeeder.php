<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spec = new Speciality();
        $spec->code = 'SISTEMAS';
        $spec->description = 'SISTEMAS';
        $spec->save();
    }
}
