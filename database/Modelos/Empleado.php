<?php 

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model{
	
	protected $table = 'empleados';
	protected $primaryKey = 'idEmpleado';
	public $timestamps = false;

	public function departamento(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Departamento','idDepartamento','idDepartamento');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}