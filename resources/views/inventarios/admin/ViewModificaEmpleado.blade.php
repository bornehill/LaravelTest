@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/modificaEmpleado/')}}";
                document.formEmpleado.action=ruta+"/"+document.formEmpleado.idEmpleado.value+"/"+document.formEmpleado.idPais.options[document.formEmpleado.idPais.selectedIndex].value;
                document.formEmpleado.method='get';
                document.formEmpleado.submit();
            }

            function actualizaSucursal(){
                ruta = "{{URL::to('admin/modificaEmpleado/')}}";
                document.formEmpleado.action=ruta+"/"+document.formEmpleado.idEmpleado.value+"/"+document.formEmpleado.idPais.options[document.formEmpleado.idPais.selectedIndex].value+"/"+document.formEmpleado.idCiudad.options[document.formEmpleado.idCiudad.selectedIndex].value;
                document.formEmpleado.method='get';
                document.formEmpleado.submit();
            }

            function actualizaDepartamentos(){
                ruta = "{{URL::to('admin/modificaEmpleado/')}}";
                document.formEmpleado.action=ruta+"/"+document.formEmpleado.idEmpleado.value+"/"+document.formEmpleado.idPais.options[document.formEmpleado.idPais.selectedIndex].value+"/"+document.formEmpleado.idCiudad.options[document.formEmpleado.idCiudad.selectedIndex].value+"/"+document.formEmpleado.idSucursal.options[document.formEmpleado.idSucursal.selectedIndex].value;
                document.formEmpleado.method='get';
                document.formEmpleado.submit();
            }

            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });            
        </script>            
        <form name='formEmpleado' action="{{url('admin/modificaEmpleado/'.$empleado->idEmpleado)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Modificaci&oacute;n empleado</h5>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Empleado</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Nombre(s)
                </div>
                <div class="col s5">
                    <input type='text' name='nombre' value="<?php echo $empleado->nombre?>" placeholder='Nombre(s) del empleado.'>
                    <input type='hidden' name='idEmpleado' value='<?php echo $empleado->idEmpleado?>'>
                    {{$errors->first('nombre')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Apellido paterno
                </div>
                <div class="col s5">
                    <input type='text' name='app' placeholder='Apellido paterno del empleado.' value="<?php echo $empleado->app?>">
                    {{$errors->first('app')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Apellido materno
                </div>
                <div class="col s5">
                    <input type='text' name='apm' placeholder='Apellido materno del empleado.' value="<?php echo $empleado->apm?>">
                    {{$errors->first('apm')}}
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
                    <select name='idCiudad' id='idCiudad' class="red-text" onchange='actualizaSucursal();'>
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
                    <select name='idSucursal' id='idSucursal' class="red-text" onchange='actualizaDepartamentos();'>
                        <option value='0'>Seleccione una sucursal</option>
                        <?php
                        foreach ($sucursal as $llave=>$valor) {
                                echo '<option value="'.$llave.'" '.($idSucursal==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idSucursal')}}
                </div>                
            </div>            
            <div class="row">
                <div class="col s1">
                    Departamento
                </div>
                <div class="col s5">
                    <select name='idDepartamento' id='idDepartamento' class="red-text">
                        <option value='0'>Seleccione un departamento</option>
                        <?php
                        foreach ($departamento as $llave=>$valor) {
                                echo '<option value="'.$llave.'" '.($empleado->idDepartamento==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idDepartamento')}}
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
                           echo '<option value="'.$llave.'" '.($empleado->idEstatus==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idEstatus')}}
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