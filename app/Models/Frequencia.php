<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class frequencia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'data_aula',
        'presenca',
        'disciplina_id',
        'professor_id',
        'matricula_id'
    ];
}
