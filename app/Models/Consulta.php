<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = "consultas";

    protected $fillable = [
        'inicio',
        'termino',
        'custo',
        'nome_tratamento',
        'medicacoes_tratamento',
        'repouso_tratamento',
        'user_id',
        'animal_id'
    ]; 

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
