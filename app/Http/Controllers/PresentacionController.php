<?php

namespace PDV\Http\Controllers;

use Illuminate\Http\Request;

use PDV\Http\Requests;
use PDV\Presentacion;
use Illuminate\Support\Facades\Redirect;
use PDV\Http\Requests\PresentacionFormRequest;
use DB; 

class PresentacionController extends Controller
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
            $presentacion=DB::table('presentacion')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idpresentacion','desc')
            ->paginate(7);
            return view('almacen.presentacion.index',["presentacion"=>$presentacion,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.presentacion.create");
    }
    public function store (PresentacionFormRequest $request)
    {
        $presentacion=new Presentacion;
        $presentacion->nombre=$request->get('nombre');
        $presentacion->descripcion=$request->get('descripcion');
        $presentacion->condicion='1';
        $presentacion->save();
        return Redirect::to('almacen/presentacion');

    }
    public function show($id)
    {
        return view("almacen.presentacion.show",["presentacion"=>Presentacion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.presentacion.edit",["presentacion"=>Presentacion::findOrFail($id)]);
    }
    public function update(PresentacionFormRequest $request,$id)
    {
        $presentacion=Presentacion::findOrFail($id);
        $presentacion->nombre=$request->get('nombre');
        $presentacion->descripcion=$request->get('descripcion');
        $presentacion->update();
        return Redirect::to('almacen/presentacion');
    }
    public function destroy($id)
    {
        $presentacion=Presentacion::findOrFail($id);
        $presentacion->condicion='0';
        $presentacion->update();
        return Redirect::to('almacen/presentacion');
    }



}
