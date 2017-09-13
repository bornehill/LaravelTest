@extends('inventarios.admin.layouts.base')

@section('content')
	    <h4 class="red-text text-darken-4 center-align" id='encabezado'>Tipo de art&iacute;culos</h4>
	    <hr>
	    <form action='tipoArticulo' method='post'>
	    	<div class="row">
		    	<input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
			    <table class="striped centered">
			    	<thead>
				    	<tr>
				    		<th>No.</th>
				    		<th>Tipo</th>
				    		<th>Acci&oacute;n</th>
				    	</tr>
			    	</thead>
			    	<tbody>
			    <?php
			    $consecutivo=1;
			    foreach ($tipoArticulos as $tipoArticulo) {
			    ?>
			      <tr>
			      	<td><?php echo $consecutivo?></td>
			      	<td><?php echo $tipoArticulo->Descripcion?></td>
			      	<td><?php echo '<a class="red-text text-darken-4" href="modificaTipoArticulo/'.$tipoArticulo->idTipoArticulo.'" title="Modificar"><i class="material-icons">mode_edit</i></a>'.
			      		'<a class="red-text text-darken-4" href="eliminaTipoArticulo/'.$tipoArticulo->idTipoArticulo.'" title="Eliminar"><i class="material-icons">remove_circle</i></a>'?>
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
					<h6 class="red-text text-darken-4">Agregar tipo de art&iacute;culo</h6>
		    		<input type='text' name='descTipoArticulo'  placeholder='Tipo de art&iacute;culo.'>

                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Agregar
                      <i class="material-icons right">add_circle</i>
                    </button>		    		
		    		{{$errors->first('descTipoArticulo')}}
		    	</div>
			</div>
		</form>    
@stop