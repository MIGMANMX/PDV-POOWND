<?php

namespace PDV;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
     protected $table='articulo';

    protected $primaryKey='idarticulo';

    public $timestamps=false;


    protected $fillable =[
    	'idcategoria',
    	'idpresentacion',
    	'codigo',
    	'nombre',
    	'stock_min',
    	'stock_actual',
    	'stock_max',
    	'descripcion',
    	'imagen',
    	'estado'
    ];


    protected $guarded =[

    ];
}
