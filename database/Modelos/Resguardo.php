<?php 

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Resguardo extends Model{
	
	protected $table = 'resguardos';
	protected $primaryKey = 'idResguardo';
	public $timestamps = false;

	public function articulo(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Articulo','idArticulo','idArticulo');
	}

	public function empleado(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Empleado','idEmpleado','idEmpleado');
	}

	public function estatus(){
							//Onjeto, llave en objeto, llave local
		return $this->hasOne('Estatus','idEstatus','idEstatus');
	}

	public function toFecha(){
		$thisDate = new Carbon($this->fecha);
		return $thisDate->format('Y-m-d');
	}
}