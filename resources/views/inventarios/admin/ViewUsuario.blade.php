@extends('inventarios.admin.layouts.base')

@section('content')
    <script languaje='javascript'>
        function modificar(idUsuario){
            ruta = "{{URL::to('admin/modificaUsuario/')}}";
            document.formViewUsuarios.action=ruta+"/"+idUsuario;
            document.formViewUsuarios.method='get';
            document.formViewUsuarios.submit();
        }

        function eliminar(idUsuario){
            ruta = "{{URL::to('admin/eliminaUsuario/')}}";
            document.formViewUsuarios.action=ruta+"/"+idUsuario;
            document.formViewUsuarios.method='get';
            document.formViewUsuarios.submit();
        }    
        
        function agregar(){
	        ruta = "{{URL::to('admin/agregarUsuario/')}}";
	        document.formViewUsuarios.action=ruta;
	        document.formViewUsuarios.method='get';
	        document.formViewUsuarios.submit();
        }            
    </script>
	<form name='formViewUsuarios'>
		<h4 class="red-text text-darken-4 center-align" id='encabezado'>Usuarios</h4>
	    <hr>
	    <div class="row">
	    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
		    <table class="striped centered">
		    	<thead>
			    	<tr>
			    		<th>No.</th>
			    		<th>Login</th>
			    		<th>Perfil</th>
			    		<th>Estatus</th>
			    		<th>Acci&oacute;n</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    <?php
		    $consecutivo=1;
		    foreach ($usuarios as $usuario) {
		    ?>
		      <tr>
		      	<td><?php echo $consecutivo?></td>
		      	<td><?php echo $usuario->login?></td>
		      	<td><?php echo $usuario->perfil->descPerfil?></td>
		      	<td><?php echo $usuario->estatus->descEstatus?></td>
		      	<td><?php echo '<a href="#" class="red-text text-darken-4"
				 onclick="modificar('.$usuario->idUsuario.');" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
		      		'<a href="#" class="red-text text-darken-4" onclick="eliminar('.$usuario->idUsuario.');" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
		      	</td>		      	
		      </tr>
		    <?php
		      $consecutivo++;
		    }    
		    ?>
			</tbody>
		    </table>
	    </div>
		<div class="row">
			<div class="col s3">
				<a onclick='agregar();' class="btn waves-effect waves-light red darken-4">Agregar
					<i class="material-icons right">add_circle</i>
				</a>
	    		{{$errors->first('login')}}
	    	</div>
		</div>		    
	</form>
@stop