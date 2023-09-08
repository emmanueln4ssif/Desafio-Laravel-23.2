<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    protected $table = "animais";

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'data_nascimento',
        'proprietario_id'
    ]; 

    public function proprietario(): BelongsTo
    {
        return $this->belongsTo(Proprietario::class);
    }

}
