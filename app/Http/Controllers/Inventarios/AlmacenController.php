<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Ciudad;
use Sucursal;
use Almacen;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AlmacenController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoAlmacen($idAlmacen = 0)
    {
        $almacenes = Almacen::all();
        return view('inventarios.admin.ViewAlmacen')->with('almacenes',$almacenes)->with('actualizado',0);
    }

    public function modificaAlmacen($idAlmacen = 0, $idPais=0, $idCiudad=0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $almacen = Almacen::find($idAlmacen); 
        if($idPais==0){
          $idPais = $almacen->sucursal->ciudad->idPais;
          if($idCiudad==0)
            $idCiudad = $almacen->sucursal->idCiudad;
        }
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaAlmacen')->with('pais',$pais)->with('estatus',$estatus)->with('ciudad',$ciudad)->with('sucursal',$sucursal)->with('idPais',$idPais)->with('idCiudad',$idCiudad)->with('almacen',$almacen);
    }

    public function formularioAlmacen($idPais = 0, $idCiudad = 0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioAlmacen')->with('estatus',$estatus)->with('pais',$pais)->with('idPais',$idPais)->with('ciudad',$ciudad)->with('idCiudad',$idCiudad)->with('sucursal',$sucursal);
    }

    public function agregaAlmacen()
    {
        $inputs= Input::all();

        $reglas = array(
            'descAlmacen' => 'required',
            'idSucursal' => 'required',
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
          $almacen = new Almacen;
          $almacen->descAlmacen = $inputs['descAlmacen'];
          $almacen->idSucursal = $inputs['idSucursal'];
          $almacen->idEstatus = $inputs['idEstatus'];
          $almacen->fechaCreacion = Carbon::now();
          $almacen->idUsuarioAdd = Session::get('usuarioLebasi');
          $almacen->save();
          return Redirect::to('admin/almacen');
        }
    }

    public function eliminaAlmacen($idAlmacen)
    {
        if($idAlmacen==''){
          return Redirect::back();
        }else{
          $almacen = Almacen::find($idAlmacen);
          $almacen->delete();
          return Redirect::to('admin/almacen');
        }
    }

    public function actualizaAlmacen()
    {
        $inputs= Input::all();

        $reglas = array(
            'descAlmacen' => 'required',
            'idSucursal' => 'required',
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
            $almacen = Almacen::find($inputs['idAlmacen']);
            $almacen->descAlmacen = $inputs['descAlmacen'];
            $almacen->idSucursal = $inputs['idSucursal'];
            $almacen->idEstatus = $inputs['idEstatus'];
            $almacen->actualizado = Carbon::now();
            $almacen->idUsuarioUpdate = Session::get('usuarioLebasi');            
            $almacen->save();
            return Redirect::to('admin/almacen');
        }
    }

}