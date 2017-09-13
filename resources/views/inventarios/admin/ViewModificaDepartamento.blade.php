@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/modificaDepartamento/')}}";
                document.formDepartamento.action=ruta+"/"+document.formDepartamento.idDepartamento.value+"/"+document.formDepartamento.idPais.options[document.formDepartamento.idPais.selectedIndex].value;
                document.formDepartamento.method='get';
                document.formDepartamento.submit();
            }

            function actualizaSucursal(){
                ruta = "{{URL::to('admin/modificaDepartamento/')}}";
                document.formDepartamento.action=ruta+"/"+document.formDepartamento.idDepartamento.value+"/"+document.formDepartamento.idPais.options[document.formDepartamento.idPais.selectedIndex].value+"/"+document.formDepartamento.idCiudad.options[document.formDepartamento.idCiudad.selectedIndex].value;
                document.formDepartamento.method='get';
                document.formDepartamento.submit();
            }
        </script>            
        <form name='formDepartamento' action="{{url('admin/modificaDepartamento/'.$departamento->idDepartamento)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Modificaci&oacute;n de departamento</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Departamento</th>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n</td>
                        <td>
                            <input type='text' name='descDepartamento' value="<?php echo $departamento->descDepartamento?>" placeholder='Nombre del depto.'>
                            <input type='hidden' name='idDepartamento' value='<?php echo $departamento->idDepartamento?>'>
                            {{$errors->first('descDepartamento')}}
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
                            <select name='idSucursal'>
                                <option value='0'>Seleccione una sucursal</option>
                                <?php
                                foreach ($sucursal as $llave=>$valor) {
                                        echo '<option value="'.$llave.'" '.($departamento->idSucursal==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idSucursal')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Estatus</td>
                        <td>
                            <select name='idEstatus'>
                                <option value='0'>Seleccione un estatus</option>
                                <?php
                                foreach ($estatus as $llave=>$valor) {
                                   echo '<option value="'.$llave.'" '.($departamento->idEstatus==$llave?'selected':'').'>'.$valor;
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