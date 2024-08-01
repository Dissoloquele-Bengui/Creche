<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaNotificacao extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'vc_nome',
        'lt_descricao'
    ];
    protected $table = "categoria_notificacoes";
}
