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
        </script>
        <form name='formAlmacen' action='agregarAlmacen' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Nuevo almac&eacute;n</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Almac&eacute;n</th>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n</td>
                        <td>
                            <input type='text' name='descAlmacen' placeholder='Descripci&oacute;n del almac&eacute;n'>
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
                            <select name='idCiudad' onchange='actualizaSucursales();'>
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
                                ?>
                                    <option value='<?php echo $llave?>'><?php echo $valor?>
                                <?php
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
                                ?>
                                    <option value='<?php echo $llave?>'><?php echo $valor?>
                                <?php
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idEstatus')}}
                        </td>
                    </tr>
                  <tr>
                    <th colspan='2'><input type='submit' value='Agregar'></th>
                  </tr>
                </table>
            </center>
        </form>
@stop