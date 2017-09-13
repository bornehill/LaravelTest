@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function buscar(){
                ruta = "{{URL::to('admin/getEmpleadoResguardo/')}}";
                if(document.formBuscaEmpleado.buscaEmpleado.value!=''){
	                document.formBuscaEmpleado.action=ruta+"/"+document.formBuscaEmpleado.buscaEmpleado.value;
	                document.formBuscaEmpleado.method='get';
	                document.formBuscaEmpleado.submit();
                }
            }
        </script>            
        <form name='formBuscaEmpleado'>
		    <p id='encabezado'>Busqueda de empleados para resguardo</p>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
			    <table border=1 align='center' class='table'>
			    	<tr>
			    		<th>Buscar : </th>
			    		<th><input type='text' name='buscaEmpleado' placeholder='Nombre, App, Apm'></th>
			    		<th><input type='submit' value='Buscar' onclick='buscar();'></th>
			    	</tr>
			    </table>
			    <?php
			    if(isset($empleados)){
			    ?>
			    	<br>
				    <table border=1 align='center' class='table'>
				    	<tr>
				    		<th>No.</th>
				    		<th>Nombre</th>
				    		<th>Apellido pat.</th>
				    		<th>Apellido mat.</th>
				    		<th>Departamento</th>
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
				      	<td><?php echo '<a href="'.URL::to('admin/ConsultaResguardos/').'/'.$empleado->idEmpleado.'">Consultar'?></td>
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