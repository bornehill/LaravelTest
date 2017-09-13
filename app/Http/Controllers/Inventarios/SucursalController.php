<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Ciudad;
use Sucursal;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SucursalController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoSucursal($idSucursal = 0)
    {
        $sucursales = Sucursal::all();
        return view('inventarios.admin.ViewSucursales')->with('sucursales',$sucursales)->with('actualizado',0);
    }

    public function modificaSucursal($idSucursal = 0, $idPais=0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $sucursal = Sucursal::find($idSucursal); 
        if($idPais==0)
          $idPais = $sucursal->ciudad->idPais;
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaSucursal')->with('pais',$pais)->with('estatus',$estatus)->with('ciudad',$ciudad)->with('idPais',$idPais)->with('sucursal',$sucursal);
    }

    public function formularioSucursal($idPais = 0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioSucursal')->with('estatus',$estatus)->with('pais',$pais)->with('ciudad',$ciudad)->with('idPais',$idPais);
    }

    public function agregaSucursal()
    {
        $inputs= Input::all();

        $reglas = array(
            'descSucursal' => 'required',
            'idCiudad' => 'required',
            'idEstatus' => 'required',
            'descCalle' => 'required',
            'descColonia' => 'required',
            'cp' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
          return Redirect::back()->withErrors($validar);
        }else{
          $sucursal = new Sucursal;
          $sucursal->descSucursal = $inputs['descSucursal'];
          $sucursal->idCiudad = $inputs['idCiudad'];
          $sucursal->idEstatus = $inputs['idEstatus'];
          $sucursal->fechaCreacion = Carbon::now();
          $sucursal->calle = $inputs['descCalle'];
          $sucursal->colonia = $inputs['descColonia'];
          $sucursal->numinterior = $inputs['noInterior'];
          $sucursal->numExterior = $inputs['noExterior'];
          $sucursal->cp = $inputs['cp'];
          $sucursal->idUsuarioAdd = Session::get('usuarioLebasi');
          $sucursal->save();
          return Redirect::to('admin/sucursal');
        }
    }

    public function eliminaSucursal($idSucursal)
    {
        if($idSucursal==''){
          return Redirect::back();
        }else{
          $sucursal = Sucursal::find($idSucursal);
          $sucursal->delete();
          return Redirect::to('admin/sucursal');
        }
    }

    public function actualizaSucursal()
    {
        $inputs= Input::all();

        $reglas = array(
            'descSucursal' => 'required',
            'idCiudad' => 'required',
            'idEstatus' => 'required',
            'descCalle' => 'required',
            'descColonia' => 'required',
            'cp' => 'required',
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
            $sucursal = Sucursal::find($inputs['idSucursal']);
            $sucursal->descSucursal = $inputs['descSucursal'];
            $sucursal->idCiudad = $inputs['idCiudad'];
            $sucursal->idEstatus = $inputs['idEstatus'];
            $sucursal->calle = $inputs['descCalle'];
            $sucursal->colonia = $inputs['descColonia'];
            $sucursal->numinterior = $inputs['noInterior'];
            $sucursal->numExterior = $inputs['noExterior'];
            $sucursal->cp = $inputs['cp'];
            $sucursal->actualizado = Carbon::now();
            $sucursal->idUsuarioUpdate = Session::get('usuarioLebasi');            
            $sucursal->save();
            return Redirect::to('admin/sucursal');
        }
    }

}