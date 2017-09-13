<?php 

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model{
	
	protected $table = 'estatus';
	protected $primaryKey = 'idEstatus';
	public $timestamps = false;

}