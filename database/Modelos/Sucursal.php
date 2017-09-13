<?php 

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model{
	
	protected $table = 'sucursales';
	protected $primaryKey = 'idSucursal';
	public $timestamps = false;

	public function ciudad(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Ciudad','idCiudad','idCiudad');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}