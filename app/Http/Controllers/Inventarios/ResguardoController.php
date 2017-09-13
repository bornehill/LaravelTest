<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Estatus;
use Articulo;
use Empleado;
use Resguardo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

class ResguardoController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function index($buscar='')
	{
		if($buscar=='')
			  return view('inventarios.admin.BuscaEmpleadoResguardo');
		else{
			$empleados=Empleado::where('nombre','like',$buscar.'%')->orwhere('app','like',$buscar.'%')->
			orwhere('apm','like',$buscar.'%')->get();
			return view('inventarios.admin.BuscaEmpleadoResguardo')->with('empleados',$empleados);
		}
	}

	public function consultaResguardos($idEmpleado=0){
		$empleado=Empleado::find($idEmpleado);
		$resguardos=Resguardo::where('idEmpleado','=',$idEmpleado)->get();
		return view('inventarios.admin.ConsultaResguardos')->with('empleado',$empleado)->with('resguardos',$resguardos);
	}

	public function asignaResguardo($idEmpleado=0, $buscar=''){
		$empleado=Empleado::find($idEmpleado);
		if($buscar=='')
			return view('inventarios.admin.BuscaArticulo')->with('empleado',$empleado);
		else{
	        $articulos=Articulo::where(function($query) use ($buscar){
	        	$query->where('desArticulo','like',$buscar.'%')->orwhere('numSerie','like',$buscar.'%')->
	        orwhere('marca','like',$buscar.'%')->orwhere('modelo','like',$buscar.'%');
	        })->whereNotIn('idArticulo', Resguardo::where('idEstatus','=',1)->select('idArticulo')->get()->toArray())->get();

	        return view('inventarios.admin.BuscaArticulo')->with('empleado',$empleado)->with('articulos',$articulos);
		}
	}

	public function agregaResguardo($idEmpleado=0, $idArticulo=0){
          $resguardo = new Resguardo;;
          $resguardo->idArticulo = $idArticulo;
          $resguardo->idEmpleado = $idEmpleado;
          $resguardo->idEstatus = 1;
          $resguardo->motivo = 'Resguardo';
          $resguardo->fecha = Carbon::now();
          $resguardo->idUsuarioAdd = Session::get('usuarioLebasi');
          $resguardo->save();
		  return Redirect::to('admin/ConsultaResguardos'.'/'.$resguardo->idEmpleado);
	}

	public function detalleResguardo($idResguardo=0){
		$resguardo=Resguardo::find($idResguardo);
		$estatus= Estatus::all()->lists('descEstatus','idEstatus');
		return view('inventarios.admin.DetalleResguardo')->with('resguardo',$resguardo)->with('estatus',$estatus);
	}

    public function actualizaResguardo($idResguardo)
    {
        $inputs= Input::all();

        $reglas = array(
            'motivo' => 'required',
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
            $resguardo = Resguardo::find($idResguardo);
            $resguardo->motivo = $inputs['motivo'];
            $resguardo->idEstatus = $inputs['idEstatus'];
            $resguardo->actualizado = Carbon::now();
            $resguardo->idUsuarioUpdate = Session::get('usuarioLebasi');
            $resguardo->save();
            $estatus= Estatus::all()->lists('descEstatus','idEstatus');
            $err = new MessageBag;
            return view('inventarios.admin.DetalleResguardo')->with('resguardo',$resguardo)->with('estatus',$estatus)->withErrors($err->add('updateResguard','Resguardo actualizado'));;
        }
    }
}
