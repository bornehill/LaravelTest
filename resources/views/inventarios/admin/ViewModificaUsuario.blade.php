@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });
        </script>
        <form name='formUsuario' action="{{url('admin/modificaUsuario/'.$usuario->idUsuario)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
             <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Modificaci&oacute;n de usuario</h5>
                    <?php  echo $errors->first('descCiudad')?>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Usuario</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Login
                </div>
                <div class="col s5">
                    <input type='text' name='login' value="<?php echo $usuario->login?>" placeholder='Login' disabled>
                    {{$errors->first('login')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Empleado
                </div>
                <div class="col s5">
                    <select name='idEmpleado' id='idEmpleado' class="red-text">
                        <option value='0'>Seleccione un empleado</option>
                        <?php
                        foreach ($empleados as $empleado) {
                           echo '<option value="'.$empleado->idEmpleado.'" '.($empleado->idEmpleado==$usuario->idEmpleado?'selected':'').'>'.$empleado->app.' '.$empleado->apm.' '.$empleado->nombre;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idEmpleado')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Perfil
                </div>
                <div class="col s5">
                    <select name='idPerfil' id='idPerfil' class="red-text">
                        <option value='0'>Seleccione un perfil</option>
                        <?php
                        foreach ($perfiles as $llave=>$valor) {
                           echo '<option value="'.$llave.'" '.($usuario->idPerfil==$llave?'selected':'').'>'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idPerfil')}}
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
                           echo '<option value="'.$llave.'" '.($usuario->idEstatus==$llave?'selected':'').'>'.$valor;
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