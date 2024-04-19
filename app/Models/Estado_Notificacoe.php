<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Notificacoe extends Model
{
    use HasFactory;

    protected $fillable = [
        'it_id_usuario',
        'it_id_destinatario',
        'it_id_notificacoe',
        'it_estado',
        'it_id_enquete'
    ];
    protected $table = 'estado_notificacoes';
}
