@extends('inventarios.admin.layouts.base')

@section('content')
	    <p id='encabezado'>Departamentos</p>
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table border=1 align='center' class='table'>
		    	<tr>
		    		<th>No.</th>
		    		<th>Departamento</th>
		    		<th>Sucursal</th>
		    		<th>Ciudad</th>
		    		<th>Pa&iacute;s</th>
		    		<th>Estatus</th>
		    		<th colspan='2'>Acci&oacute;n</th>
		    	</tr>
		    <?php
		    $consecutivo=1;
		    foreach ($departamentos as $departamento) {
		    ?>
		      <tr>
		      	<td><?php echo $consecutivo?></td>
		      	<td><?php echo $departamento->descDepartamento?></td>
		      	<td><?php echo $departamento->sucursal->descSucursal?></td>
		      	<td><?php echo $departamento->sucursal->ciudad->descCiudad?></td>
		      	<td><?php echo $departamento->sucursal->ciudad->pais->descPais?></td>
		      	<td><?php echo $departamento->estatus->descEstatus?></td>
		      	<td><?php echo '<a href="modificaDepartamento/'.$departamento->idDepartamento.'">Modificar'?></td>
		      	<td><?php echo '<a href="eliminaDepartamento/'.$departamento->idDepartamento.'">Eliminar'?></td>
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
		    <tr>
		    	<th colspan='8'>
		    		<a href='agregarDepartamento'>Agregar
		    	</th>
		    </tr>
		    </table>
@stop