<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Ciudad;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CiudadController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoCiudad($idCiudad = 0)
    {
        $ciudades = Ciudad::all();
        return view('inventarios.admin.ViewCiudades')->with('ciudades',$ciudades)->with('actualizado',0);
    }

    public function modificaCiudad($idCiudad = 0)
    {
        $ciudad = Ciudad::find($idCiudad); 
        $pais = Pais::all()->lists('descPais','idPais');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaCiudad')->with('pais',$pais)->with('estatus',$estatus)->with('ciudad',$ciudad);
    }

    public function formularioCiudad()
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioCiudad')->with('estatus',$estatus)->with('pais',$pais);
    }

    public function agregaCiudad()
    {
        $inputs= Input::all();

        $reglas = array(
            'descCiudad' => 'required',
            'idPais' => 'required',
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
          $ciudad = new Ciudad;
          $ciudad->descCiudad = $inputs['descCiudad'];
          $ciudad->idPais = $inputs['idPais'];
          $ciudad->idEstatus = $inputs['idEstatus'];
          $ciudad->fechaCreacion = Carbon::now();
          $ciudad->idUsuarioAdd = Session::get('usuarioLebasi');
          $ciudad->save();
          return Redirect::to('admin/ciudad');
        }
    }

    public function eliminaCiudad($idCiudad)
    {
        if($idCiudad==''){
          return Redirect::back();
        }else{
          $ciudad = Ciudad::find($idCiudad);
          $ciudad->delete();
          return Redirect::to('admin/ciudad');
        }
    }

    public function actualizaCiudad()
    {
        $inputs= Input::all();

        $reglas = array(
            'descCiudad' => 'required',
            'idPais' => 'required',
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
            $ciudad = Ciudad::find($inputs['idCiudad']);
            $ciudad->descCiudad = $inputs['descCiudad'];
            $ciudad->idPais = $inputs['idPais'];
            $ciudad->idEstatus = $inputs['idEstatus'];
            $ciudad->actualizado = Carbon::now();
            $ciudad->idUsuarioUpdate = Session::get('usuarioLebasi');            
            $ciudad->save();
            return Redirect::to('admin/ciudad');
        }
    }

}