<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CursoProfessor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'professor_id',
        'curso_id',
        'data_atribuicao',
        'data_termino'
    ];
}
