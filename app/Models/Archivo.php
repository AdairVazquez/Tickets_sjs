<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';   

    protected $fillable = [
        'ruta',
        'tipo'
    ];

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'id_archivo');
    }
} 
