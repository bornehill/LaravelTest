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
        	<h5 class="red-text text-darken-4" id='encabezado'>Busqueda de empleados para resguardo</h5>
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
				<div class="row">
					<div class="col s1">
						Buscar :
			    	</div>
					<div class="col s3">
						<input type='text' name='buscaEmpleado' placeholder='Nombre, App, Apm'>
			    	</div>
			    	<div class="col s1">
	                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action" onclick='buscar();'>Buscar
	                      <i class="material-icons right">search</i>
	                    </button>			    		
			    		{{-- <input type='submit' value='Buscar' onclick='buscar();'> --}}
			    	</div>	
				</div>
			    <?php
			    if(isset($empleados)){
			    ?>
	    		<div class="row">
					<h5 class="red-text text-darken-4 center-align" id='encabezado'>Empleados</h5>
				    <hr>
				    <table class='striped centered'>
				    	</thead>
				    	<tr>
				    		<th>No.</th>
				    		<th>Nombre</th>
				    		<th>Apellido pat.</th>
				    		<th>Apellido mat.</th>
				    		<th>Departamento</th>
				    		<th>Acci&oacute;n</th>
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
				      	<!--td><?php echo '<a href="'.URL::to('admin/ConsultaResguardos/').'/'.$empleado->idEmpleado.'">Consultar'?></td-->
				      	<td><?php echo '<a class="red-text text-darken-4"
						 href="../../admin/ConsultaResguardos/'.$empleado->idEmpleado.'" title="Consultar"><i class="material-icons">folder_shared</i></a>'?>
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
			    ?>
		</form>
@stop