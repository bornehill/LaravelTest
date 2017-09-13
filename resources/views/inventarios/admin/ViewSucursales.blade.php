@extends('inventarios.admin.layouts.base')

@section('content')
	    <p id='encabezado'>Sucursales</p>
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table border=1 align='center' class='table'>
		    	<tr>
		    		<th>No.</th>
		    		<th>Sucursal</th>
		    		<th>Ciudad</th>
		    		<th>Pa&iacute;s</th>
		    		<th>Estatus</th>
		    		<th colspan='2'>Acci&oacute;n</th>
		    	</tr>
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
		      	<td><?php echo '<a href="modificaSucursal/'.$sucursal->idSucursal.'">Modificar'?></td>
		      	<td><?php echo '<a href="eliminaSucursal/'.$sucursal->idSucursal.'">Eliminar'?></td>
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
		    <tr>
		    	<th colspan='7'>
		    		<a href='agregarSucursal'>Agregar
		    	</th>
		    </tr>
		    </table>
@stop