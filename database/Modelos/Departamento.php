<?php 

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{
	
	protected $table = 'departamentos';
	protected $primaryKey = 'idDepartamento';
	public $timestamps = false;

	public function sucursal(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Sucursal','idSucursal','idSucursal');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}