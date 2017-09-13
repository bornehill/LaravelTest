@extends('inventarios.admin.layouts.base')

@section('content')
        <form name='formCambiaPassword' action="{{url('admin/actualizaPassword/'.$usuario->idUsuario)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Cambiar contrase&ntilde;a</p>
                {{$errors->first('changePass')}}
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
                        <td>Contrase&ntilde;a actual</td>
                        <td>
							<input type='password' name='passwordNow' placeholder='Contrase&ntilde;a actual'>
                            {{$errors->first('passwordNow')}}
                            {{$errors->first('errorPass')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Contrase&ntilde;a nueva</td>
                        <td>
							<input type='password' name='password' placeholder='Contrase&ntilde;a nueva'>
                            {{$errors->first('password')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Confirmar</td>
                        <td>
							<input type='password' name='passwordConfirm' placeholder='Confirmar contrase&ntilde;a'>
                            {{$errors->first('passwordConfirm')}}
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