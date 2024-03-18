<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CursoClasseDisciplina extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'classe_id',
        'curso_id',
        'disciplina_id',
        'qtd_tempo',
        'qtd_vezes_semana'
    ];
}
