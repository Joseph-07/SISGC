<?php

namespace Database\Seeders;

use App\Models\Proc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proc = new Proc();
        $proc->code = 'SISTEMAS boot';
        $proc->description = 'SISTEMAS boot description';
        $proc->id_system = 1;
        $proc->save();
    }
}
