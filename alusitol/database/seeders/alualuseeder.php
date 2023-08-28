<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\alualu;

class alualuseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        alualu::factory(100)->create();
    }
}
