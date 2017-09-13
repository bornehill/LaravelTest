<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Ciudad;
use Sucursal;
use Departamento;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DepartamentoController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoDepartamento($idDepartamento = 0)
    {
        $departamentos = Departamento::all();
        return view('inventarios.admin.ViewDepartamento')->with('departamentos',$departamentos)->with('actualizado',0);
    }

    public function modificaDepartamento($idDepartamento = 0, $idPais=0, $idCiudad=0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $departamento = Departamento::find($idDepartamento); 
        if($idPais==0){
          $idPais = $departamento->sucursal->ciudad->idPais;
          if($idCiudad==0)
            $idCiudad = $departamento->sucursal->idCiudad;
        }
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaDepartamento')->with('pais',$pais)->with('estatus',$estatus)->with('ciudad',$ciudad)->with('sucursal',$sucursal)->with('idPais',$idPais)->with('idCiudad',$idCiudad)->with('departamento',$departamento);
    }

    public function formularioDepartamento($idPais = 0, $idCiudad = 0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioDepartamento')->with('estatus',$estatus)->with('pais',$pais)->with('idPais',$idPais)->with('ciudad',$ciudad)->with('idCiudad',$idCiudad)->with('sucursal',$sucursal);
    }

    public function agregaDepartamento()
    {
        $inputs= Input::all();

        $reglas = array(
            'descDepartamento' => 'required',
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
          $departamento = new Departamento;
          $departamento->descDepartamento = $inputs['descDepartamento'];
          $departamento->idSucursal = $inputs['idSucursal'];
          $departamento->idEstatus = $inputs['idEstatus'];
          $departamento->fechaCreacion = Carbon::now();
          $departamento->idUsuarioAdd = Session::get('usuarioLebasi');
          $departamento->save();
          return Redirect::to('admin/departamento');
        }
    }

    public function eliminaDepartamento($idDepartamento)
    {
        if($idDepartamento==''){
          return Redirect::back();
        }else{
          $departamento = Departamento::find($idDepartamento);
          $departamento->delete();
          return Redirect::to('admin/departamento');
        }
    }

    public function actualizaDepartamento()
    {
        $inputs= Input::all();

        $reglas = array(
            'descDepartamento' => 'required',
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
            $departamento = Departamento::find($inputs['idDepartamento']);
            $departamento->descDepartamento = $inputs['descDepartamento'];
            $departamento->idSucursal = $inputs['idSucursal'];
            $departamento->idEstatus = $inputs['idEstatus'];
            $departamento->actualizado = Carbon::now();
            $departamento->idUsuarioUpdate = Session::get('usuarioLebasi');
            $departamento->save();
            return Redirect::to('admin/departamento');
        }
    }

}