@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/agregarAlmacen/')}}";
                document.formAlmacen.action=ruta+"/"+document.formAlmacen.idPais.options[document.formAlmacen.idPais.selectedIndex].value;
                document.formAlmacen.method='get';
                document.formAlmacen.submit();
            }

            function actualizaSucursales(){
                ruta = "{{URL::to('admin/agregarAlmacen/')}}";
                document.formAlmacen.action=ruta+"/"+document.formAlmacen.idPais.options[document.formAlmacen.idPais.selectedIndex].value+"/"+document.formAlmacen.idCiudad.options[document.formAlmacen.idCiudad.selectedIndex].value;
                document.formAlmacen.method='get';
                document.formAlmacen.submit();
            }

            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });            
        </script>
        <form name='formAlmacen' action='agregarAlmacen' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Nuevo almac&eacute;n</h5>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Almac&eacute;n</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Descripci&oacute;n
                </div>
                <div class="col s5">
                    <input type='text' name='descAlmacen' placeholder='Descripci&oacute;n del almac&eacute;n'>
                    {{$errors->first('descAlmacen')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Pa&iacute;s
                </div>
                <div class="col s5">
                    <select name='idPais' id='idPais' onchange='actualizaCiudades();' class="red-text">
                        <option value='0'>Seleccione un pa&iacute;s</option>
                        <?php
                        foreach ($pais as $llave=>$valor) {
                            echo '<option value="'.$llave.'" '.($idPais==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idPais')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Ciudad
                </div>
                <div class="col s5">
                    <select name='idCiudad' id='idCiudad' class="red-text" onchange='actualizaSucursales();'>
                        <option value='0'>Seleccione una ciudad</option>
                        <?php
                        foreach ($ciudad as $llave=>$valor) {
                            echo '<option value="'.$llave.'" '.($idCiudad==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idCiudad')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Sucursal
                </div>
                <div class="col s5">
                    <select name='idSucursal' id='idSucursal' class="red-text">
                        <option value='0'>Seleccione una sucursal</option>
                        <?php
                        foreach ($sucursal as $llave=>$valor) {
                        ?>
                            <option value='<?php echo $llave?>'><?php echo $valor?>
                        <?php
                        }    
                        ?>
                    </select>
                    {{$errors->first('idSucursal')}}
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