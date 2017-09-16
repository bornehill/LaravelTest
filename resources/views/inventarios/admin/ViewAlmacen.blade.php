@extends('inventarios.admin.layouts.base')

@section('content')
		<h4 class="red-text text-darken-4 center-align" id='encabezado'>Almacenes</h4>
	    <hr>
	    <div class="row">
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table class='striped centered'>
		    	<thead>
		    	<tr>
		    		<th>No.</th>
		    		<th>Almac&eacute;n</th>
		    		<th>Sucursal</th>
		    		<th>Ciudad</th>
		    		<th>Pa&iacute;s</th>
		    		<th>Estatus</th>
		    		<th colspan='2'>Acci&oacute;n</th>
		    	</tr>
		    	</thead>
		    	<tbody>		    	
		    <?php
		    $consecutivo=1;
		    foreach ($almacenes as $almacen) {
		    ?>
		      <tr>
		      	<td><?php echo $consecutivo?></td>
		      	<td><?php echo $almacen->descAlmacen?></td>
		      	<td><?php echo $almacen->sucursal->descSucursal?></td>
		      	<td><?php echo $almacen->sucursal->ciudad->descCiudad?></td>
		      	<td><?php echo $almacen->sucursal->ciudad->pais->descPais?></td>
		      	<td><?php echo $almacen->estatus->descEstatus?></td>
		      	<td><?php echo '<a class="red-text text-darken-4"
				 href="modificaAlmacen/'.$almacen->idAlmacen.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
		      		'<a class="red-text text-darken-4" href="eliminaAlmacen/'.$almacen->idAlmacen.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
	      		</td>		      	
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
		    </tbody>
		    </table>
	    </div>
		<div class="row">
			<div class="col s3">
				<a href='agregarAlmacen' class="btn waves-effect waves-light red darken-4">Agregar
					<i class="material-icons right">add_circle</i>
				</a>
	    		{{$errors->first('descAlmacen')}}
	    	</div>
		</div>		    
@stop