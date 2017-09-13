<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Pais;
use Estatus;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PaisController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoPais($idPais = 0)
    {
        $paises = Pais::all();
        return view('inventarios.admin.ViewPaises')->with('paises',$paises)->with('actualizado',0);
    }

    public function modificaPais($idPais = 0)
    {
        $pais = Pais::find($idPais); 
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaPais')->with('pais',$pais)->with('estatus',$estatus);
    }

    public function formularioPais()
    {
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioPais')->with('estatus',$estatus);
    }

    public function agregaPais()
    {
        $inputs= Input::all();

        $reglas = array(
            'descPais' => 'required',
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
          $pais = new Pais;
          $pais->descPais = $inputs['descPais'];
          $pais->idEstatus = $inputs['idEstatus'];
          $pais->fechaCreacion = Carbon::now();
          $pais->idUsuarioAdd = Session::get('usuarioLebasi');          
          $pais->save();
          return Redirect::to('admin/pais');
        }
    }

    public function eliminaPais($idPais)
    {
        if($idPais==''){
          return Redirect::back();
        }else{
          $pais = Pais::find($idPais);
          $pais->delete();
          return Redirect::to('admin/pais');
        }
    }

    public function actualizaPais()
    {
        $inputs= Input::all();

        $reglas = array(
            'descPais' => 'required',
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
            $pais = Pais::find($inputs['idPais']);
            $pais->descPais = $inputs['descPais'];
            $pais->idEstatus = $inputs['idEstatus'];
            $pais->actualizado = Carbon::now();
            $pais->idUsuarioUpdate = Session::get('usuarioLebasi');            
            $pais->save();
            return Redirect::to('admin/pais');
        }
    }

}