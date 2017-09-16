@extends('inventarios.admin.layouts.base')

@section('content')
		<h4 class="red-text text-darken-4 center-align" id='encabezado'>Empleados</h4>
	    <hr>
	    <div class="row">
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table class='striped centered'>
		    	<thead>
			    	<tr>
			    		<th>No.</th>
			    		<th>Nombres</th>
			    		<th>Apellido pat.</th>
			    		<th>Apellido mat.</th>
			    		<th>Departamento</th>
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
		    foreach ($empleados as $empleado) {
		    ?>
		      <tr>
		      	<td><?php echo $consecutivo?></td>
		      	<td><?php echo $empleado->nombre?></td>
		      	<td><?php echo $empleado->app?></td>
		      	<td><?php echo $empleado->apm?></td>
		      	<td><?php echo $empleado->departamento->descDepartamento?></td>
		      	<td><?php echo $empleado->departamento->sucursal->descSucursal?></td>
		      	<td><?php echo $empleado->departamento->sucursal->ciudad->descCiudad?></td>
		      	<td><?php echo $empleado->departamento->sucursal->ciudad->pais->descPais?></td>
		      	<td><?php echo $empleado->estatus->descEstatus?></td>
		      	<td><?php echo '<a class="red-text text-darken-4"
				 href="modificaEmpleado/'.$empleado->idEmpleado.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
		      		'<a class="red-text text-darken-4" href="eliminaEmpleado/'.$empleado->idEmpleado.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
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
				<a href='agregarEmpleado' class="btn waves-effect waves-light red darken-4">Agregar
					<i class="material-icons right">add_circle</i>
				</a>
	    		{{$errors->first('app').$errors->first('nombre')}}
	    	</div>
		</div>		    
@stop