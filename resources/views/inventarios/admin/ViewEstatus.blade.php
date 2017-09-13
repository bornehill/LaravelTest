@extends('inventarios.admin.layouts.base')

@section('content')
	    <h4 class="red-text text-darken-4 center-align" id='encabezado'>Estatus</h4>
	    <hr>	    
	    <form action='estatus' method='post'>
	    	<div class="row">
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
			    <table class="striped centered">
			    	<thead>
				    	<tr>
				    		<th>No.</th>
				    		<th>Estatus</th>
				    		<th colspan='2'>Acci&oacute;n</th>
				    	</tr>
			    	</thead>
			    	<tbody>
			    <?php
			    $consecutivo=1;
			    foreach ($estatus as $estatusObj) {
			    ?>
			      <tr>
			      	<td><?php echo $consecutivo?></td>
			      	<td><?php echo $estatusObj->descEstatus?></td>
			      	<td><?php echo '<a class="red-text text-darken-4" href="modificaEstatus/'.$estatusObj->idEstatus.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
			      		'<a class="red-text text-darken-4" href="eliminaEstatus/'.$estatusObj->idEstatus.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
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
					<h6 class="red-text text-darken-4">Agregar Estatus</h6>
		    		<input type='text' name='descEstatus' placeholder='Descripci&oacute;n de estatus'>

                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Agregar
                      <i class="material-icons right">add_circle</i>
                    </button>		    		
		    		{{$errors->first('descEstatus')}}
		    	</div>
			</div>
		</form>    
@stop