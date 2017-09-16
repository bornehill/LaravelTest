@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/modificaSucursal/')}}";
                document.formSucursal.action=ruta+"/"+document.formSucursal.idSucursal.value+"/"+document.formSucursal.idPais.options[document.formSucursal.idPais.selectedIndex].value;
                document.formSucursal.method='get';
                document.formSucursal.submit();
            }

            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });            
        </script>            
        <form name='formSucursal' action="{{url('admin/modificaSucursal/'.$sucursal->idSucursal)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
             <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Modificaci&oacute;n de sucursal</h5>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Sucursal</h6>
                </div>
            </div>            
             <div class="row">
                <div class="col s1">
                    Descripci&oacute;n
                </div>
                <div class="col s5">
                    <input type='text' name='descSucursal' value="<?php echo $sucursal->descSucursal?>" placeholder='Descripci&oacute;n de sucursal'>
                    <input type='hidden' name='idSucursal' value='<?php echo $sucursal->idSucursal?>'>
                    {{$errors->first('descSucursal')}}
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
                    <select name='idCiudad' id='idCiudad' class="red-text">
                        <option value='0'>Seleccione una ciudad</option>
                        <?php
                        $ciudadSucursal = Ciudad::find($sucursal->idCiudad);
                        foreach ($ciudad as $llave=>$valor) {
                                echo '<option value="'.$llave.'" '.($ciudadSucursal->idCiudad==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idCiudad')}}
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
                           echo '<option value="'.$llave.'" '.($sucursal->idEstatus==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idEstatus')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Calle
                </div>
                <div class="col s5">
                    <input type='text' name='descCalle' value="<?php echo $sucursal->calle?>" placeholder='Nombre de calle'>
                    {{$errors->first('descCalle')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Colonia
                </div>
                <div class="col s5">
                    <input type='text' name='descColonia' value="<?php echo $sucursal->colonia?>" placeholder='Nombre de colonia'>
                    {{$errors->first('desColonia')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    No. interior
                </div>
                <div class="col s5">
                    <input type='text' name='noInterior' value="<?php echo $sucursal->numInterior?>" placeholder='N&uacute;mero interior'>
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    No. exterior
                </div>
                <div class="col s5">
                    <input type='text' name='noExterior' value="<?php echo $sucursal->numExterior?>" placeholder='N&uacute;mero exterior'>
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    CP
                </div>
                <div class="col s5">
                    <input type='text' name='cp' value="<?php echo $sucursal->cp?>" placeholder='C&oacute;digo postal'>
                    {{$errors->first('cp')}}
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