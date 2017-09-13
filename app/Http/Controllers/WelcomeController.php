<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Usuario;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('welcome');
		return view('Bienvenidos');
	}

	public function autentica()
	{
		//return view('welcome');

        $inputs= Input::all();

        $reglas = array(
            'usuario' => 'required|exists:usuarios,login',
            'pass' => 'required',
            );

        $mensaje = array(
            'required' => 'Dato obligatorio',
            );

        $validar = Validator::make($inputs, $reglas, $mensaje);

        if($validar->fails())
        {
          return Redirect::back()->withErrors($validar);
        }else{
          $usuario = Usuario::where('login','=',Input::get('usuario'))->first();
          if(Hash::check(Input::get('pass'),$usuario->password)){
		    Session::put('usuarioLebasi',$usuario->idUsuario);
		    Session::put('loginLebasi',$usuario->login);
		    return view('inventarios.admin.index');
		  }else{
		  	return Redirect::back();
		  }
        }
		//return Hash::make('vanessa');
	}

	public function logout()
	{
		Session::flush();
		Session::regenerateToken();
		return view('Bienvenidos');
	}
}
