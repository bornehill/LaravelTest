<?php 

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model{
	
	protected $table = 'ciudades';
	protected $primaryKey = 'idCiudad';
	public $timestamps = false;

	public function pais(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Pais','idPais','idPais');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}