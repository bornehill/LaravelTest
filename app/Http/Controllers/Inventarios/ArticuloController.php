<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Estatus;
use TipoArticulo;
use Articulo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ArticuloController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function index($buscar='')
	  {
      if($buscar=='')
  		  return view('inventarios.admin.BuscaArticulo');
      else{
        $articulos=Articulo::where('desArticulo','like',$buscar.'%')->orwhere('numSerie','like',$buscar.'%')->
        orwhere('marca','like',$buscar.'%')->orwhere('modelo','like',$buscar.'%')->get();
        return view('inventarios.admin.BuscaArticulo')->with('articulos',$articulos);
      }
	  }

    public function formularioArticulo()
    {
        $tipoArticulo= TipoArticulo::all()->lists('Descripcion','idTipoArticulo');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioArticulo')->with('estatus',$estatus)->with('tipoArticulo',$tipoArticulo);
    }

    public function agregaArticulo()
    {
        $inputs= Input::all();

        $reglas = array(
            'desArticulo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'numSerie' => 'required',
            'fechaFactura' => 'required',
            'stock' => 'required',
            'idTipoArticulo' => 'required',
            'idEstatus' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
          return Redirect::back()->withErrors($validar);
        }else{
          $articulo = new Articulo;;
          $articulo->desArticulo = $inputs['desArticulo'];
          $articulo->marca = $inputs['marca'];
          $articulo->modelo = $inputs['modelo'];
          $articulo->numSerie = $inputs['numSerie'];
          $articulo->fechaFactura = $inputs['fechaFactura'];
          $articulo->folioFactura = $inputs['folioFactura'];
          $articulo->caracteristicas = $inputs['caracteristicas'];
          $articulo->stock = $inputs['stock'];
          $articulo->idTipoArticulo = $inputs['idTipoArticulo'];
          $articulo->idEstatus = $inputs['idEstatus'];
          $articulo->fechaCreacion = Carbon::now();
          $articulo->idUsuarioAdd = Session::get('usuarioLebasi');
          $articulo->save();
          return Redirect::to('admin/articulo');
        }
    }

    public function modificaArticulo($idArticulo = 0)
    {
        $articulo = Articulo::find($idArticulo); 
        $tipoArticulo= TipoArticulo::all()->lists('Descripcion','idTipoArticulo');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaArticulo')->with('estatus',$estatus)->with('articulo',$articulo)->with('tipoArticulo',$tipoArticulo);
    }    

    public function actualizaArticulo()
    {
        $inputs= Input::all();

        $reglas = array(
            'desArticulo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'numSerie' => 'required',
            'fechaFactura' => 'required',
            'folioFactura' => 'required',
            'stock' => 'required',
            'idTipoArticulo' => 'required',
            'idEstatus' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else{
            $articulo = Articulo::find($inputs['idArticulo']);
            $articulo->desArticulo = $inputs['desArticulo'];
            $articulo->marca = $inputs['marca'];
            $articulo->modelo = $inputs['modelo'];
            $articulo->numSerie = $inputs['numSerie'];
            $articulo->fechaFactura = $inputs['fechaFactura'];
            $articulo->folioFactura = $inputs['folioFactura'];
            $articulo->caracteristicas = $inputs['caracteristicas'];
            $articulo->stock = $inputs['stock'];
            $articulo->idTipoArticulo = $inputs['idTipoArticulo'];
            $articulo->idEstatus = $inputs['idEstatus'];
            $articulo->actualizado = Carbon::now();
            $articulo->idUsuarioUpdate = Session::get('usuarioLebasi');
            $articulo->save();
            return Redirect::to('admin/articulo'.'/'.$articulo->numSerie);
        }
    }

    public function eliminaArticulo($idArticulo)
    {
        if($idArticulo==''){
          return Redirect::back();
        }else{
          $articulo = Articulo::find($idArticulo);
          $articulo->delete();
          return Redirect::to('admin/articulo');
        }
    }

    public function detalleArticulo($idArticulo=0){
      $articulo = Articulo::find($idArticulo);
      $tipoArticulo= TipoArticulo::all()->lists('Descripcion','idTipoArticulo');
      $estatus= Estatus::all()->lists('descEstatus','idEstatus');      
      return view('inventarios.admin.detalleArticulo')->with('estatus',$estatus)->with('articulo',$articulo)->with('tipoArticulo',$tipoArticulo);
    }    
}