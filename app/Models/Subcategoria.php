<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'subcategoria'; 

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';   

    protected $fillable = [
        'nombre'
    ];
}
