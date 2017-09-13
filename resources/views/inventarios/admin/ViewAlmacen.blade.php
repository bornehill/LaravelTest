@extends('inventarios.admin.layouts.base')

@section('content')
	    <p id='encabezado'>Almacenes</p>
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table border=1 align='center' class='table'>
		    	<tr>
		    		<th>No.</th>
		    		<th>Almac&eacute;n</th>
		    		<th>Sucursal</th>
		    		<th>Ciudad</th>
		    		<th>Pa&iacute;s</th>
		    		<th>Estatus</th>
		    		<th colspan='2'>Acci&oacute;n</th>
		    	</tr>
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
		      	<td><?php echo '<a href="modificaAlmacen/'.$almacen->idAlmacen.'">Modificar'?></td>
		      	<td><?php echo '<a href="eliminaAlmacen/'.$almacen->idAlmacen.'">Eliminar'?></td>
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
		    <tr>
		    	<th colspan='8'>
		    		<a href='agregarAlmacen'>Agregar
		    	</th>
		    </tr>
		    </table>
@stop