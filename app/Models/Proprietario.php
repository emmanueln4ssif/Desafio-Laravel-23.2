<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'data_nascimento',
        'foto_perfil',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'pais',
        'cep',
        'telefone',
        'ddd'
    ];
}
