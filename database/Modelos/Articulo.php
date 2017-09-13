<?php 

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model{
	
	protected $table = 'articulos';
	protected $primaryKey = 'idArticulo';
	public $timestamps = false;

	public function tipoArticulo(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('TipoArticulo','idTipoArticulo','idTipoArticulo');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

}