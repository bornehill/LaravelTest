<?php namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use Estatus;
use Perfil;
use Empleado;
use Usuario;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

class UsuarioController extends Controller {

    /**
     * Mostrar el perfil de un usuario dado.
     *
     * @param  int  $id
     * @return Response
     */
    public function catalogoUsuario($idUsuario = 0)
    {
        $usuarios = Usuario::all();
        return view('inventarios.admin.ViewUsuario')->with('usuarios',$usuarios)->with('actualizado',0);
    }

    public function formularioUsuario()
    {
        $perfiles = Perfil::all()->lists('descPerfil','idPerfil');
        $empleados = Empleado::all();
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.formularioUsuario')->with('estatus',$estatus)->with('perfiles',$perfiles)->with('empleados',$empleados);
    }

    public function agregaUsuario()
    {
        $inputs= Input::all();

        $reglas = array(
            'login' => 'required|unique:usuarios,login',
            'password' => 'required|same:passwordConfirm',
            'passwordConfirm' => 'required',
            'idEmpleado' => 'required',
            'idPerfil' => 'required',
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
          $usuario = new Usuario;
          $usuario->login = $inputs['login'];
          $usuario->password = Hash::make(Input::get('password'));;
          $usuario->idEmpleado = $inputs['idEmpleado'];
          $usuario->idPerfil = $inputs['idPerfil'];
          $usuario->idEstatus = $inputs['idEstatus'];
          $usuario->fechaCreacion = Carbon::now();
          $usuario->idUsuarioAdd = Session::get('usuarioLebasi');
          $usuario->save();
          return Redirect::to('admin/usuario');
        }
    }

    public function modificaUsuario($idUsuario = 0)
    {
        $usuario = Usuario::find($idUsuario); 
        $perfiles= Perfil::all()->lists('descPerfil','idPerfil');
        $empleados = Empleado::all();
        $estatus= Estatus::all()->lists('descEstatus','idEstatus');
        return view('inventarios.admin.ViewModificaUsuario')->with('estatus',$estatus)->with('usuario',$usuario)->with('perfiles',$perfiles)->with('empleados',$empleados);
    }    

    public function actualizaUsuario($idUsuario)
    {
        $inputs= Input::all();

        $reglas = array(
            'idEmpleado' => 'required',
            'idPerfil' => 'required',
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
            $usuario = Usuario::find($idUsuario);
            $usuario->idEmpleado = $inputs['idEmpleado'];
            $usuario->idPerfil = $inputs['idPerfil'];
            $usuario->idEstatus = $inputs['idEstatus'];
            $usuario->actualizado = Carbon::now();
            $usuario->idUsuarioUpdate = Session::get('usuarioLebasi');
            $usuario->save();
            return Redirect::to('admin/usuario');
        }
    }

    public function eliminaUsuario($idUsuario)
    {
        if($idUsuario==''){
          return Redirect::back();
        }else{
          $usuario = Usuario::find($idUsuario);
          $usuario->delete();
          return Redirect::to('admin/usuario');
        }
    }

    public function cambiaPassword($idUsuario)
    {
        if($idUsuario==''){
          return Redirect::back();
        }else{
          $usuario = Usuario::find($idUsuario); 
          return view('inventarios.admin.cambiaPassword')->with('usuario',$usuario);
        }
    }

    public function actualizaPassword($idUsuario)
    {
        $inputs= Input::all();

        $reglas = array(
            'passwordNow' => 'required',
            'password' => 'required|same:passwordConfirm',
            'passwordConfirm' => 'required',
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
            $usuario = Usuario::find($idUsuario);
            if(Hash::check(Input::get('passwordNow'),$usuario->password)){
            $usuario->password = Hash::make(Input::get('password'));;
            $usuario->actualizado = Carbon::now();
            $usuario->idUsuarioUpdate = Session::get('usuarioLebasi');
            $usuario->save();
            $err = new MessageBag;
            return view('inventarios.admin.cambiaPassword')->with('usuario',$usuario)->withErrors($err->add('changePass','Contrase&ntilde;a actualizada'));
          }else{
            $err = new MessageBag;
            return Redirect::back()->withErrors($err->add('errorPass','Contrase&ntilde;a actual incorrecta'));
          }

        }
    }    
}