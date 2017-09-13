<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Estatus;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EstatusController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoEstatus($idEstatus = 0)
    {
        $estatus = Estatus::all();
        return view('inventarios.admin.ViewEstatus')->with('estatus',$estatus)->with('actualizado',0);
    }

    public function modificaEstatus($idEstatus = 0)
    {
        $estatus = Estatus::find($idEstatus);        
        return view('inventarios.admin.ViewModificaEstatus')->with('idEstatus',$estatus->idEstatus)->with('descEstatus',$estatus->descEstatus);
    }

    public function agregaEstatus()
    {
        $inputs= Input::all();

        $reglas = array(
            'descEstatus' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
          return Redirect::back()->withErrors($validar);
        }else{
          $estatus = new Estatus;
          $estatus->descEstatus = $inputs['descEstatus'];
          $estatus->fechaCreacion = Carbon::now();
          $estatus->idUsuarioAdd = Session::get('usuarioLebasi');
          $estatus->save();
          return Redirect::to('admin/estatus');
        }
    }

    public function eliminaEstatus($idEstatus)
    {
        if($idEstatus==''){
          return Redirect::back();
        }else{
          $estatus = Estatus::find($idEstatus);
          $estatus->delete();
          return Redirect::to('admin/estatus');
        }
    }

    public function actualizaEstatus()
    {
        $inputs= Input::all();

        $reglas = array(
            'descEstatus' => 'required',
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
            $estatus = Estatus::find($inputs['idEstatus']);
            $estatus->descEstatus = $inputs['descEstatus'];
            $estatus->actualizado = Carbon::now();
            $estatus->idUsuarioUpdate = Session::get('usuarioLebasi');            
            $estatus->save();
            return Redirect::to('admin/estatus');
        }
    }

}