<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propina extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'mes',
        'limite',
        'data_vencimento',
        'ano_id',
        'idClasse',
    ];
}
