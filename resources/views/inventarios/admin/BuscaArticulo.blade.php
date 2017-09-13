@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function buscar(){
                if(document.formBuscaArticulo.buscaArticulo.value!=''){
                	var ruta='';
				    <?php
				    if(isset($empleado)){
				    ?>                	
	                	ruta = "{{URL::to('admin/asignaResguardo/')}}";
		                document.formBuscaArticulo.action=ruta+"/"+document.formBuscaArticulo.empleadoId.value+"/"+document.formBuscaArticulo.buscaArticulo.value;
	                <?php
	            	}else{
	            	?>
                		ruta = "{{URL::to('admin/articulo/')}}";
		                document.formBuscaArticulo.action=ruta+"/"+document.formBuscaArticulo.buscaArticulo.value;
	                <?php
	            	}?>
	                document.formBuscaArticulo.method='get';
	                document.formBuscaArticulo.submit();	            	
            	}
            }

            function agrega(articuloId){
	            ruta = "{{URL::to('admin/asignaResguardo/')}}";
		        document.formBuscaArticulo.action=ruta+"/"+document.formBuscaArticulo.empleadoId.value+"/"+articuloId;
	            document.formBuscaArticulo.method='post';
	            document.formBuscaArticulo.submit();
            }

            function detalleArticulo(articuloId){
	            ruta = "{{URL::to('admin/detalleArticulo/')}}";
		        ruta=ruta+"/"+articuloId;
		        popUpWindow(ruta);
            }
        </script>            
        <form name='formBuscaArticulo'>
		    <p id='encabezado'>Busqueda de art&iacute;culos</p>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
			    <?php
			    if(isset($empleado)){
			    ?>
				    <table border=1 align='center' class='table'>
			    	<tr>
			    		<th>Empleado : </th>
			    		<td><?php echo $empleado->app.' '.$empleado->apm.' '.$empleado->nombre?>
			    			<input type='hidden' name='empleadoId' value='<?php echo $empleado->idEmpleado?>'>
			    		</td>
			    	</tr>
				    </table>
				    <br>
				<?php
				}
			    ?>			    		    	 
			    <table border=1 align='center' class='table'>
			    	<tr>
			    		<th>Buscar : </th>
			    		<th><input type='text' name='buscaArticulo' placeholder='Buscar art&iacute;culo'></th>
			    		<th><input type='submit' value='Buscar' onclick='buscar();'></th>
			    	</tr>
			    	<?php
			    	if(!isset($empleado)){
			    	?>
					    <tr>
					    	<th colspan='3' align='left'>
					    		<a href="{{URL::to('admin/agregarArticulo/')}}">Nuevo
					    	</th>
				    	</tr>
			    	<?php
			    	}?>
			    </table>
			    <?php
			    if(isset($articulos)){
			    	if(isset($empleado)){
			    ?>			    		
				    	<br>
					    <table border=1 align='center' class='table'>
					    	<tr>
					    		<th>No.</th>
					    		<th>Art&iacute;culo</th>
					    		<th>Num. serie</th>
					    		<th colspan='2'>Acci&oacute;n</th>
					    	</tr>
					    <?php
					    $consecutivo=1;
					    foreach ($articulos as $articulo) {
					    ?>
					      <tr>
					      	<td><?php echo $consecutivo?></td>
					      	<td><?php echo $articulo->desArticulo?></td>
					      	<td><?php echo $articulo->numSerie?></td>
					      	<td><input type='button' value='Detalle' onclick='detalleArticulo(<?php echo $articulo->idArticulo?>);'></td>
					      	<td><input type='button' value='Agregar' onclick='agrega(<?php echo $articulo->idArticulo?>);'></td>
					      </tr>
					    <?php
					      $consecutivo++;
					    }    
					    ?>
					    </table>
				<?php					    
			    	}else{
			    ?>
				    	<br>
					    <table border=1 align='center' class='table'>
					    	<tr>
					    		<th>No.</th>
					    		<th>Art&iacute;culo</th>
					    		<th>Marca</th>
					    		<th>Modelo</th>
					    		<th>Num. serie</th>
					    		<th colspan='2'>Acci&oacute;n</th>
					    	</tr>
					    <?php
					    $consecutivo=1;
					    foreach ($articulos as $articulo) {
					    ?>
					      <tr>
					      	<td><?php echo $consecutivo?></td>
					      	<td><?php echo $articulo->desArticulo?></td>
					      	<td><?php echo $articulo->marca?></td>
					      	<td><?php echo $articulo->modelo?></td>
					      	<td><?php echo $articulo->numSerie?></td>
					      	<td><?php echo '<a href="'.URL::to('admin/modificaArticulo/').'/'.$articulo->idArticulo.'">Modificar'?></td>
					      	<td><?php echo '<a href="'.URL::to('admin/eliminaArticulo/').'/'.$articulo->idArticulo.'">Eliminar'?></td>
					      </tr>
					    <?php
					      $consecutivo++;
					    }    
					    ?>
					    </table>
				<?php
					}
				}
			    ?>
		</form>
@stop