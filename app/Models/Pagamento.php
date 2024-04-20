<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'valor',
        'data',
        'matricula_id',
        'propina_id',

    ];
}
