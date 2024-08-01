<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'aluno_id',
        'turma_id',
    ];
    
    protected $dates=['deleted_at'];
}
