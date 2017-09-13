@extends('inventarios.admin.layouts.base')

@section('content')
        <form action='actualizaTipoArticulo' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
             <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Modificaci&oacute;n de tipo de art&iacute;culos</h5>
                    <?php  echo $errors->first('nombre')?>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Art&iacute;culo</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Descripci&oacute;n
                </div>
                <div class="col s5">
                    <input type='text' name='descTipoArticulo' value="<?php echo $descTipoArticulo?>"  placeholder='Tipo de art&iacute;culo.'>
                    <input type='hidden' name='idTipoArticulo' value='<?php echo $idTipoArticulo?>'>
                    {{$errors->first('descTipoArticulo')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s6">
                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Actualizar
                      <i class="material-icons right">create</i>
                    </button>
                </div>                
            </div>
        </form>
@stop