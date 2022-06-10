<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsoCfdi extends Model
{
    protected $fillable = [
        'Nombre', 'Clave', 'Activo',
    ];

    protected $hidden = [
    	'Activo',
    ];
}
