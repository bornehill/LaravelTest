<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use TipoArticulo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TipoArticuloController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoTipoArticulos($idTipoArticulo = 0)
    {
        $tipoArticulos = TipoArticulo::all();
        return view('inventarios.admin.ViewTipoArticulo')->with('tipoArticulos',$tipoArticulos)->with('actualizado',0);
    }

    public function modificaTipoArticulo($idTipoArticulo = 0)
    {
        $tipoArticulo = TipoArticulo::find($idTipoArticulo);        
        return view('inventarios.admin.ViewModificaTipoArticulo')->with('idTipoArticulo',$tipoArticulo->idTipoArticulo)->with('descTipoArticulo',$tipoArticulo->Descripcion);
    }

    public function agregaTipoArticulo()
    {
        $inputs= Input::all();

        $reglas = array(
            'descTipoArticulo' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
          return Redirect::back()->withErrors($validar);
        }else{
          $tipoArticulo = new TipoArticulo;
          $tipoArticulo->Descripcion = $inputs['descTipoArticulo'];
          $tipoArticulo->fechaCreacion = Carbon::now();
          $tipoArticulo->idUsuarioAdd = Session::get('usuarioLebasi');
          $tipoArticulo->save();
          return Redirect::to('admin/tipoArticulo');
        }
    }

    public function eliminaTipoArticulo($idTipoArticulo)
    {
        if($idTipoArticulo==''){
          return Redirect::back();
        }else{
          $tipoArticulo = TipoArticulo::find($idTipoArticulo);
          $tipoArticulo->delete();
          return Redirect::to('admin/tipoArticulo');
        }
    }

    public function actualizaTipoArticulo()
    {
        $inputs= Input::all();

        $reglas = array(
            'descTipoArticulo' => 'required',
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
            $tipoArticulo = TipoArticulo::find($inputs['idTipoArticulo']);
            $tipoArticulo->Descripcion = $inputs['descTipoArticulo'];
            $tipoArticulo->actualizado = Carbon::now();
            $tipoArticulo->idUsuarioUpdate = Session::get('usuarioLebasi');                        
            $tipoArticulo->save();
            return Redirect::to('admin/tipoArticulo');
        }
    }

}