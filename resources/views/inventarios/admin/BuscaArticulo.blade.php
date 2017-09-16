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
					<h5 class="red-text text-darken-4" id='encabezado'>Busqueda de art&iacute;culos</h5>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
			    <?php
			    if(isset($empleado)){
			    ?>
					<div class="row">
						<div class="col s1">
							Empleado :
				    	</div>
						<div class="col s3">
							<?php echo $empleado->app.' '.$empleado->apm.' '.$empleado->nombre?>
		    				<input type='hidden' name='empleadoId' value='<?php echo $empleado->idEmpleado?>'>
				    	</div>			    	
					</div>			    
				<?php
				}
			    ?>
				<div class="row">
					<div class="col s1">
						Buscar :
			    	</div>
					<div class="col s3">
						<input type='text' name='buscaArticulo' placeholder='Buscar art&iacute;culo'>	
			    </div>
			    <div class="col s1">
	                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action" onclick='buscar();'>Buscar
	                      <i class="material-icons right">search</i>
	                    </button>			    		
			    		{{-- <input type='submit' value='Buscar' onclick='buscar();'> --}}
			    	</div>	
				</div>
			    <?php
			    if(isset($articulos)){
			    	if(isset($empleado)){
			    ?>			    		
	    		<div class="row">
					<h5 class="red-text text-darken-4 center-align" id='encabezado'>Art&iacute;culos</h5>
				    <hr>
					    <table class='striped centered'>
				    	<thead>
					    	<tr>
					    		<th>No.</th>
					    		<th>Art&iacute;culo</th>
					    		<th>Num. serie</th>
					    		<th>Acci&oacute;n</th>
					    	</tr>
				    	</thead>
				    	<tbody>					    	
					    <?php
					    $consecutivo=1;
					    foreach ($articulos as $articulo) {
					    ?>
					      <tr>
					      	<td><?php echo $consecutivo?></td>
					      	<td><?php echo $articulo->desArticulo?></td>
					      	<td><?php echo $articulo->numSerie?></td>
					      	<!--td><input type='button' value='Detalle' onclick='detalleArticulo(<?php echo $articulo->idArticulo?>);'></td>
					      	<td><input type='button' value='Agregar' onclick='agrega(<?php echo $articulo->idArticulo?>);'></td-->
					      	<td><?php echo '<a class="red-text text-darken-4"
							 onclick="detalleArticulo('.$articulo->idArticulo.');" title="Detalle"><i class="material-icons">find_in_page</i></a>'.
					      		'<a class="red-text text-darken-4" onclick="agrega('.$articulo->idArticulo.');" title="Agregar"><i class="material-icons">add_circle_outline</i></a>'?>
				      		</td>					      	
					      </tr>
					    <?php
					      $consecutivo++;
					    }    
					    ?>
					    </tbody>
					    </table>
					</div>
				<?php					    
			    	}else{
			    ?>
	    		<div class="row">
					<h5 class="red-text text-darken-4 center-align" id='encabezado'>Art&iacute;culos</h5>
				    <hr>			    
				    <table class='striped centered'>
				    	<thead>
					    	<tr>
					    		<th>No.</th>
					    		<th>Art&iacute;culo</th>
					    		<th>Marca</th>
					    		<th>Modelo</th>
					    		<th>Num. serie</th>
					    		<th>Acci&oacute;n</th>
					    	</tr>
				    	</thead>
				    	<tbody>				    	
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
				      	<!--td><?php echo '<a href="'.URL::to('admin/modificaArticulo/').'/'.$articulo->idArticulo.'">Modificar'?></td>
				      	<td><?php echo '<a href="'.URL::to('admin/eliminaArticulo/').'/'.$articulo->idArticulo.'">Eliminar'?></td-->
				      	<td><?php echo '<a class="red-text text-darken-4"
						 href="../../admin/modificaArticulo/'.$articulo->idArticulo.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
				      		'<a class="red-text text-darken-4" href="../../admin/eliminaArticulo/'.$articulo->idArticulo.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
			      		</td>				      	
				      </tr>
				    <?php
				      $consecutivo++;
				    }    
				    ?>
					</tbody>
				    </table>
				</div>
				<?php
					}
				}
			    ?>
		    	<?php
		    	if(!isset($empleado)){
		    	?>
					<div class="row">
						<div class="col s2">
							<a href="{{URL::to('admin/agregarArticulo/')}}" class="btn waves-effect waves-light red darken-4">Nuevo
								<i class="material-icons right">add_circle</i>
							</a>
				    	</div>
			    	</div>		    	
		    	<?php
		    	}?>			    
		</form>
@stop