@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            $(document).ready(function() {
                $('#idEstatus').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });
        </script>
        <form action='agregarPais' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
             <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Nuevo pa&iacute;s</h5>
                    <?php  echo $errors->first('descPais')?>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Pa&iacute;s</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Descripci&oacute;n
                </div>
                <div class="col s5">
                    <input type='text' name='descPais' placeholder='Nombre de pa&iacute;s'>
                    {{$errors->first('descPais')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Estatus
                </div>
                <div class="col s5">
                    <select name='idEstatus' id='idEstatus' class="red-text">
                        <option value='0'>Seleccione un estatus</option>
                        <?php
                        foreach ($estatus as $llave=>$valor) {
                        ?>
                            <option value='<?php echo $llave?>'><?php echo $valor?>
                        <?php
                        }    
                        ?>
                    </select>
                    {{$errors->first('idEstatus')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s6">
                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Agregar
                      <i class="material-icons right">create</i>
                    </button>
                </div>                
            </div>
        </form>
@stop