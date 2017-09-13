<?php 

use Illuminate\Database\Eloquent\Model;

class Pais extends Model{
	
	protected $table = 'paises';
	protected $primaryKey = 'idPais';
	public $timestamps = false;

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}