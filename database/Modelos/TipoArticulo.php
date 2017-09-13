<?php 

use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model{
	
	protected $table = 'tipoarticulo';
	protected $primaryKey = 'idTipoArticulo';
	public $timestamps = false;

}