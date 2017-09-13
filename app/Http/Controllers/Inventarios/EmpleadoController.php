<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Ciudad;
use Sucursal;
use Departamento;
use Empleado;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EmpleadoController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoEmpleado($idEmpleado = 0)
    {
        $empleados = Empleado::all();
        return view('inventarios.admin.ViewEmpleado')->with('empleados',$empleados)->with('actualizado',0);
    }

    public function modificaEmpleado($idEmpleado = 0, $idPais=0, $idCiudad=0, $idSucursal=0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $empleado = Empleado::find($idEmpleado); 
        if($idPais==0){
          $idPais = $empleado->departamento->sucursal->ciudad->idPais;
          if($idCiudad==0){
            $idCiudad = $empleado->departamento->sucursal->idCiudad;
            if($idSucursal==0)
              $idSucursal = $empleado->departamento->idSucursal;
          }
        }
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $departamento = Departamento::where('idSucursal','=',$idSucursal)->lists('descDepartamento','idDepartamento');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaEmpleado')->with('pais',$pais)->with('estatus',$estatus)->with('ciudad',$ciudad)->with('sucursal',$sucursal)->with('departamento',$departamento)->with('idPais',$idPais)->with('idCiudad',$idCiudad)->with('idSucursal',$idSucursal)->with('empleado',$empleado);
    }

    public function formularioEmpleado($idPais = 0, $idCiudad = 0, $idSucursal = 0)
    {
        $pais = Pais::all()->lists('descPais','idPais');
        $ciudad = Ciudad::where('idPais','=',$idPais)->lists('descCiudad','idCiudad');
        $sucursal = Sucursal::where('idCiudad','=',$idCiudad)->lists('descSucursal','idSucursal');
        $departamento = Departamento::where('idSucursal','=',$idSucursal)->lists('descDepartamento','idDepartamento');
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioEmpleado')->with('estatus',$estatus)->with('pais',$pais)->with('idPais',$idPais)->with('ciudad',$ciudad)->with('idCiudad',$idCiudad)->with('sucursal',$sucursal)->with('idSucursal',$idSucursal)->with('departamento',$departamento);
    }

    public function agregaEmpleado()
    {
        $inputs= Input::all();

        $reglas = array(
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'idDepartamento' => 'required',
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
          $empleado = new Empleado;
          $empleado->nombre = $inputs['nombre'];
          $empleado->app = $inputs['app'];
          $empleado->apm = $inputs['apm'];
          $empleado->idDepartamento = $inputs['idDepartamento'];
          $empleado->idEstatus = $inputs['idEstatus'];
          $empleado->fechaCreacion = Carbon::now();
          $empleado->idUsuarioAdd = Session::get('usuarioLebasi');
          $empleado->save();
          return Redirect::to('admin/empleado');
        }
    }

    public function eliminaEmpleado($idEmpleado)
    {
        if($idEmpleado==''){
          return Redirect::back();
        }else{
          $empleado = Empleado::find($idEmpleado);
          $empleado->delete();
          return Redirect::to('admin/empleado');
        }
    }

    public function actualizaEmpleado()
    {
        $inputs= Input::all();

        $reglas = array(
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'idDepartamento' => 'required',
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
            $empleado = Empleado::find($inputs['idEmpleado']);
            $empleado->nombre = $inputs['nombre'];
            $empleado->app = $inputs['app'];
            $empleado->apm = $inputs['apm'];
            $empleado->idDepartamento = $inputs['idDepartamento'];
            $empleado->idEstatus = $inputs['idEstatus'];
            $empleado->actualizado = Carbon::now();
            $empleado->idUsuarioUpdate = Session::get('usuarioLebasi');
            $empleado->save();
            return Redirect::to('admin/empleado');
        }
    }

}