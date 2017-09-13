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
		    <p id='encabezado'>Resguardos de empleado</p>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
			    <table border=1 align='center' class='table'>
			    	<tr>
			    		<th>Empleado : </th>
			    		<td><?php echo $empleado->app.' '.$empleado->apm.' '.$empleado->nombre?></td>
			    	</tr>
			    	<tr>
			    		<th colspan='2' align='center'>
			    			<input type='submit' value='Agregar' onclick='Agrega();'>
			    			<input type='hidden' name='empleadoId' value='<?php echo $empleado->idEmpleado?>'>
			    		</th>
			    	</tr>
			    </table>
			    <?php
			    if(isset($resguardos)){
			    ?>
			    	<br>
				    <table border=1 align='center' class='table'>
				    	<tr>
				    		<th>No.</th>
				    		<th>Art&iacute;culo</th>
				    		<th>Num. serie</th>
				    		<th>Fecha</th>
				    		<th>Estatus</th>
				    		<th colspan='2'>Acci&oacute;n</th>
				    	</tr>
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
				      	<td><input type='button' value='Detalle' onclick='detalleResguardo(<?php echo $resguardo->idResguardo?>);'></td>
				      </tr>
				    <?php
				      $consecutivo++;
				    }    
				    ?>
				    </table>
				<?php
				}
			    ?>
		</form>
@stop