<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $table = 'prioridades'; 

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';   

    protected $fillable = [
        'nivel'
    ];
}
