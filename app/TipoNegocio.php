<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNegocio extends Model
{
	protected $fillable = [
        'Nombre', 'Descripcion', 'Activo',
    ];
}
