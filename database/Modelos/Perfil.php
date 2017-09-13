<?php 

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model{
	
	protected $table = 'perfiles';
	protected $primaryKey = 'idPerfil';
	public $timestamps = false;

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}