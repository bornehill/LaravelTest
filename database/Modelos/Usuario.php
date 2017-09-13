<?php 

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
	
	protected $table = 'usuarios';
	protected $primaryKey = 'idUsuario';
	public $timestamps = false;

	public function perfil(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Perfil','idPerfil','idPerfil');
	}

	public function empleado(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Empleado','idEmpleado','idEmpleado');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}