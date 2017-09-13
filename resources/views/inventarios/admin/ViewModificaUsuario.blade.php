@extends('inventarios.admin.layouts.base')

@section('content')
        <form name='formUsuario' action="{{url('admin/modificaUsuario/'.$usuario->idUsuario)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Modificaci&oacute;n de usuario</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Usuario</th>
                    </tr>
                    <tr>
                        <td>Login</td>
                        <td>
                            <input type='text' name='login' value="<?php echo $usuario->login?>" placeholder='Login' disabled>
                            {{$errors->first('login')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Empleado</td>
                        <td>
                            <select name='idEmpleado'>
                                <option value='0'>Seleccione un empleado</option>
                                <?php
                                foreach ($empleados as $empleado) {
                                   echo '<option value="'.$empleado->idEmpleado.'" '.($empleado->idEmpleado==$usuario->idEmpleado?'selected':'').'>'.$empleado->app.' '.$empleado->apm.' '.$empleado->nombre;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idEmpleado')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Perfil</td>
                        <td>
                            <select name='idPerfil'>
                                <option value='0'>Seleccione un perfil</option>
                                <?php
                                foreach ($perfiles as $llave=>$valor) {
                                   echo '<option value="'.$llave.'" '.($usuario->idPerfil==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idPerfil')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Estatus</td>
                        <td>
                            <select name='idEstatus'>
                                <option value='0'>Seleccione un estatus</option>
                                <?php
                                foreach ($estatus as $llave=>$valor) {
                                   echo '<option value="'.$llave.'" '.($usuario->idEstatus==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idEstatus')}}
                        </td>
                    </tr>
                  <tr>
                    <th colspan='2'><input type='submit' value='Actualizar'></th>
                  </tr>
                </table>
            </center>
            <br>
        </form>
@stop