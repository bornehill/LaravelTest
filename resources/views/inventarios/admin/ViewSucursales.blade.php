@extends('inventarios.admin.layouts.base')

@section('content')
		<h4 class="red-text text-darken-4 center-align" id='encabezado'>Sucursales</h4>
	    <hr>
	    <div class="row">
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table class='striped centered'>
		    	<thead>
			    	<tr>
			    		<th>No.</th>
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
		    foreach ($sucursales as $sucursal) {
		    ?>
		      <tr>
		      	<td><?php echo $consecutivo?></td>
		      	<td><?php echo $sucursal->descSucursal?></td>
		      	<td><?php echo $sucursal->ciudad->descCiudad?></td>
		      	<td><?php echo $sucursal->ciudad->pais->descPais?></td>
		      	<td><?php echo $sucursal->estatus->descEstatus?></td>
		      	<td><?php echo '<a class="red-text text-darken-4"
				 href="modificaSucursal/'.$sucursal->idSucursal.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
		      		'<a class="red-text text-darken-4" href="eliminaSucursal/'.$sucursal->idSucursal.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
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
				<a href='agregarSucursal' class="btn waves-effect waves-light red darken-4">Agregar
					<i class="material-icons right">add_circle</i>
				</a>
	    		{{$errors->first('descSucursal')}}
	    	</div>
		</div>		    
@stop