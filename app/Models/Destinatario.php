<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destinatario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'it_id_usuario',
        'it_id_notificacoe',
        'it_id_enquete'
      ];
        protected $table = 'destinatarios';
}
