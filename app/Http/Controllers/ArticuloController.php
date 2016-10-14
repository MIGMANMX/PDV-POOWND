<?php

namespace PDV\Http\Controllers;

use Illuminate\Http\Request;

use PDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use PDV\Http\Requests\ArticuloFormRequest;
use PDV\Articulo;

use DB;
class ArticuloController extends Controller
{
    //
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $articulos=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
             ->join('presentacion as p','a.idpresentacion','=','p.idpresentacion')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock_min','a.stock_actual','a.stock_max','c.nombre as categoria','p.nombre as presentacion','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
            return view('almacen.articulo.index',["articulos"=>$articulos ,"searchText"=>$query]);
        }
    }
    public function create()
    {

    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        $presentacion=DB::table('presentacion')->where('condicion','=','1')->get();
        return view("almacen.articulo.create",["categorias"=>$categorias,"presentacion"=>$presentacion]);

    }
    public function store (ArticuloFormRequest $request)
    {
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idpresentacion=$request->get('idpresentacion');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock_min=$request->get('stock_min');
        $articulo->stock_actual=$request->get('stock_actual');
        $articulo->stock_max=$request->get('stock_max');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';


        if(Input::hasFile('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }


        
        $articulo->save();
        return Redirect::to('almacen/articulo');

    }
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {

    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        $presentacion=DB::table('presentacion')->where('condicion','=','1')->get();



        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"presentacion"=>$presentacion]);
    }
    
    public function update(ArticuloFormRequest $request,$id)
    {
        $articulo=Articulo::findOrFail($id);
		$articulo->idcategoria=$request->get('idcategoria');
        $articulo->idpresentacion=$request->get('idpresentacion');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock_min=$request->get('stock_min');
        $articulo->stock_actual=$request->get('stock_actual');
        $articulo->stock_max=$request->get('stock_max');
        $articulo->descripcion=$request->get('descripcion');
        

        if(Input::hasFile('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }        

        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->condicion='0';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }



}
