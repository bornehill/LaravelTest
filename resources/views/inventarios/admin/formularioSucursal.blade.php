@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/agregarSucursal/')}}";
                document.formSucursal.action=ruta+"/"+document.formSucursal.idPais.options[document.formSucursal.idPais.selectedIndex].value;
                document.formSucursal.method='get';
                document.formSucursal.submit();
            }
        </script>
        <form name='formSucursal' action='agregarSucursal' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Nueva sucursal</p>
                <table border=1 align='center'>
                	<tr>
                		<th colspan=2>Sucursal</th>
                	</tr>
                	<tr>
                		<td>Descripci&oacute;n</td>
                		<td>
                            <input type='text' name='descSucursal' placeholder='Descripci&oacute;n de sucursal'>
                            {{$errors->first('descSucursal')}}
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
                            <select name='idCiudad'>
                                <option value='0'>Seleccione una ciudad</option>
                                <?php
                                foreach ($ciudad as $llave=>$valor) {
                                ?>
                                    <option value='<?php echo $llave?>'><?php echo $valor?>
                                <?php
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idCiudad')}}
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
                        <td>Calle</td>
                        <td>
                            <input type='text' name='descCalle' placeholder='Nombre de calle'>
                            {{$errors->first('descCalle')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Colonia</td>
                        <td>
                            <input type='text' name='descColonia' placeholder='Nombre de colonia'>
                            {{$errors->first('descColonia')}}
                        </td>
                    </tr>
                    <tr>
                        <td>No. interior</td>
                        <td>
                            <input type='text' name='noInterior' placeholder='N&uacute;mero interior'>
                        </td>
                    </tr>
                    <tr>
                        <td>No. exterior</td>
                        <td>
                            <input type='text' name='noExterior' placeholder='N&uacute;mero exterior'>
                        </td>
                    </tr>
                    <tr>
                        <td>CP</td>
                        <td>
                            <input type='text' name='cp' placeholder='C&oacute;digo postal'>
                            {{$errors->first('cp')}}
                        </td>
                    </tr>
                  <tr>
                  	<th colspan='2'><input type='submit' value='Agregar'></th>
                  </tr>
                </table>
            </center>
        </form>
@stop