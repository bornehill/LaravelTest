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
        </script>            
        <form name='formEmpleado' action="{{url('admin/modificaEmpleado/'.$empleado->idEmpleado)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Modificaci&oacute;n de empleado</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Empleado</th>
                    </tr>
                    <tr>
                        <td>Nombre(s)</td>
                        <td>
                            <input type='text' name='nombre' value="<?php echo $empleado->nombre?>" placeholder='Nombre(s) del empleado.'>
                            <input type='hidden' name='idEmpleado' value='<?php echo $empleado->idEmpleado?>'>
                            {{$errors->first('nombre')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido paterno</td>
                        <td>
                            <input type='text' name='app' placeholder='Apellido paterno del empleado.' value="<?php echo $empleado->app?>">
                            {{$errors->first('app')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido materno</td>
                        <td>
                            <input type='text' name='apm' placeholder='Apellido materno del empleado.' value="<?php echo $empleado->apm?>">
                            {{$errors->first('apm')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Pa&iacute;s</td>
                        <td>
                            <select name='idPais' onchange='actualizaCiudades();'>
                                <option value='0'>Seleccione un pa&iacute;s</option>
                                <?php
                                foreach ($pais as $llave=>$valor) {
                                    echo '<option value="'.$llave.'" '.($idPais==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ciudad</td>
                        <td>
                            <select name='idCiudad' onchange='actualizaSucursal();'>
                                <option value='0'>Seleccione una ciudad</option>
                                <?php
                                foreach ($ciudad as $llave=>$valor) {
                                        echo '<option value="'.$llave.'" '.($idCiudad==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sucursal</td>
                        <td>
                            <select name='idSucursal' onchange='actualizaDepartamentos();'>
                                <option value='0'>Seleccione una sucursal</option>
                                <?php
                                foreach ($sucursal as $llave=>$valor) {
                                        echo '<option value="'.$llave.'" '.($idSucursal==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Departamento</td>
                        <td>
                            <select name='idDepartamento'>
                                <option value='0'>Seleccione un departamento</option>
                                <?php
                                foreach ($departamento as $llave=>$valor) {
                                        echo '<option value="'.$llave.'" '.($empleado->idDepartamento==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idDepartamento')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Estatus</td>
                        <td>
                            <select name='idEstatus'>
                                <option value='0'>Seleccione un estatus</option>
                                <?php
                                foreach ($estatus as $llave=>$valor) {
                                   echo '<option value="'.$llave.'" '.($empleado->idEstatus==$llave?'selected':'').'>'.$valor;
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
        </form>
@stop