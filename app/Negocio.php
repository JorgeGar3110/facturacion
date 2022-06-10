<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
	protected $fillable = [
        'Nombre', 'RazonSocial', 'RFC', 'IdTipoNegocio', 
        'IdMunicipio', 'Calle', 'Numero', 'Colonia', 'CP', 'Referencias', 
        'Telefono','IdUsuario', 'IdEstatus', 'Activo',
    ];

    protected $hidden = [
        'IdEstatus', 'Activo',
    ];
}
