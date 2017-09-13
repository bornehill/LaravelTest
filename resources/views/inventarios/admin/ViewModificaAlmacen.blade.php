@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/modificaAlmacen/')}}";
                document.formAlmacen.action=ruta+"/"+document.formAlmacen.idAlmacen.value+"/"+document.formAlmacen.idPais.options[document.formAlmacen.idPais.selectedIndex].value;
                document.formAlmacen.method='get';
                document.formAlmacen.submit();
            }

            function actualizaSucursal(){
                ruta = "{{URL::to('admin/modificaAlmacen/')}}";
                document.formAlmacen.action=ruta+"/"+document.formAlmacen.idAlmacen.value+"/"+document.formAlmacen.idPais.options[document.formAlmacen.idPais.selectedIndex].value+"/"+document.formAlmacen.idCiudad.options[document.formAlmacen.idCiudad.selectedIndex].value;
                document.formAlmacen.method='get';
                document.formAlmacen.submit();
            }
        </script>            
        <form name='formAlmacen' action="{{url('admin/modificaAlmacen/'.$almacen->idAlmacen)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Modificaci&oacute;n de almac&eacute;n</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Almacen</th>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n</td>
                        <td>
                            <input type='text' name='descAlmacen' value="<?php echo $almacen->descAlmacen?>" placeholder='Descripci&oacute;n del almac&eacute;n'>
                            <input type='hidden' name='idAlmacen' value='<?php echo $almacen->idAlmacen?>'>
                            {{$errors->first('descAlmacen')}}
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
                                        echo '<option value="'.$llave.'" '.($almacen->idSucursal==$llave?'selected':'').'>'.$valor;
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
                                   echo '<option value="'.$llave.'" '.($almacen->idEstatus==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('isEstatus')}}
                        </td>
                    </tr>
                  <tr>
                    <th colspan='2'><input type='submit' value='Actualizar'></th>
                  </tr>
                </table>
            </center>
        </form>
@stop