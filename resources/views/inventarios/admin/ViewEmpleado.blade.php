@extends('inventarios.admin.layouts.base')

@section('content')
	    <p id='encabezado'>Empleados</p>
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table border=1 align='center' class='table'>
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
		      	<td><?php echo '<a href="modificaEmpleado/'.$empleado->idEmpleado.'">Modificar'?></td>
		      	<td><?php echo '<a href="eliminaEmpleado/'.$empleado->idEmpleado.'">Eliminar'?></td>
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
		    <tr>
		    	<th colspan='11' align='left'>
		    		<a href='agregarEmpleado'>Agregar
		    	</th>
		    </tr>
		    </table>
@stop