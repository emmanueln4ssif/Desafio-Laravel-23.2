<?php

namespace Database\Seeders;

use App\Models\Proprietario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProprietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proprietario::factory()->count(30)->create();
    }
}
