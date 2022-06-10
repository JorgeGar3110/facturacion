<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $fillable = [
        'Nombre', 'Paterno', 'Materno', 'IdUsuario', 'Activo',
    ];

    protected $hidden = [
        'IdUsuario', 'Activo',
    ];
}
