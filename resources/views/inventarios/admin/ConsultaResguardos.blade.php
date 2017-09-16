@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function Agrega(){
                ruta = "{{URL::to('admin/asignaResguardo/')}}";
                document.formConsultaResguardo.action=ruta+"/"+document.formConsultaResguardo.empleadoId.value;
                document.formConsultaResguardo.method='get';
                document.formConsultaResguardo.submit();
            }

            function detalleResguardo(resguardoId){
	            ruta = "{{URL::to('admin/detalleResguardo/')}}";
		        ruta=ruta+"/"+resguardoId;
		        popUpWindow(ruta,400);
            }            
        </script>            
        <form name='formConsultaResguardo'>
        	<h5 class="red-text text-darken-4" id='encabezado'>Resguardos de empleado</h5>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
				<div class="row">
					<div class="col s1">
						Empleado
			    	</div>
					<div class="col s3">
						<?php echo $empleado->app.' '.$empleado->apm.' '.$empleado->nombre?>
			    	</div>			    	
				</div>
				<div class="row">
					<div class="col s3">
	                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action" onclick='Agrega();'>Agregar
	                      <i class="material-icons right">create</i>
	                    </button>
		    			<input type='hidden' name='empleadoId' value='<?php echo $empleado->idEmpleado?>'>
			    	</div>
				</div>						    	 
			    <?php
			    if(isset($resguardos)){
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
					    		<th>Fecha</th>
					    		<th>Estatus</th>
					    		<th>Acci&oacute;n</th>
					    	</tr>
				    	</thead>
				    	<tbody>				    	
				    <?php
				    $consecutivo=1;
				    foreach ($resguardos as $resguardo) {
				    ?>
				      <tr>
				      	<td><?php echo $consecutivo?></td>
				      	<td><?php echo $resguardo->articulo->desArticulo?></td>
				      	<td><?php echo $resguardo->articulo->numSerie?></td>
				      	<td><?php echo $resguardo->fecha?></td>
				      	<td><?php echo $resguardo->estatus->descEstatus?></td>
				      	<!--td><input type='button' value='Detalle' onclick='detalleResguardo(<?php echo $resguardo->idResguardo?>);'></td-->
				      	<td><?php echo '<a class="red-text text-darken-4"
						 onclick="detalleResguardo('.$resguardo->idResguardo.');" title="Detalle"><i class="material-icons">find_in_page</i></a>'?>
			      		</td>				      	
				      </tr>
				    <?php
				      $consecutivo++;
				    }    
				    ?>
				    </table>
				    </tbody>
			    </div>
				<?php
				}
			    ?>
		</form>
@stop