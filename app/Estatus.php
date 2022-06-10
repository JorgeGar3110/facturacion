<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
	protected $fillable = [
        'Nombre', 'Activo',
    ];

    protected $hidden = [
    	'Activo',
    ];
}
