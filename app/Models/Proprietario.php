<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function animais(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }

}
