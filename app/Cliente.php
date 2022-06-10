<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = [
        'Nombre', 'Paterno', 'Materno', 'RCF', 'IdTipoUsuario' ,
        'IdMunicipio', 'Calle', 'Numero', 'Colonia', 'CP', 'Referencias',
        'Telefono', 'IdEstatus', 'Activo', 'IdUsuario',
    ];

    protected $hidden = [
        'IdUsuario', 'IdEstatus', 'Activo',
    ];
}
