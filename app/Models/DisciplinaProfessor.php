<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisciplinaProfessor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'professor_id',
        'curso_classe_disciplina_id',
    ];
}
