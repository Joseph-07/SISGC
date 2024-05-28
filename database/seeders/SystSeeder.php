<?php

namespace Database\Seeders;

use App\Models\Syst;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $syst = new Syst();
        $syst->code = 'First Syst';
        $syst->description = 'First Syst';
        $syst->save();
    }
}
