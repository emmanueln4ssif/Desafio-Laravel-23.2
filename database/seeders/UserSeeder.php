<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Administrador",
            'email' => "admin@vetcenter.br",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'data_nascimento' => '2000/01/01',
            'telefone' => '55123456789',
            'periodo_trabalho' => 'Diurno',
            'rua' => 'Avenida Paulista',
            'numero' => '1500',
            'bairro' => 'Centro',
            'cidade' => 'São Paulo',
            'uf' => 'SP',
            'pais' => 'Brasil',
            'cep' => '25500-010',
            'telefone' => '012345678',
            'ddd' => '11'

        ]);
    }
}
