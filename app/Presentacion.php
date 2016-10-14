<?php

namespace PDV;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    //
    protected $table='presentacion';

    protected $primaryKey='idpresentacion';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
    	'condicion'
    ];

    protected $guarded =[

    ];
}
