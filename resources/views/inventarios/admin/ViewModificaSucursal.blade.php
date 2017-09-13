@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            function actualizaCiudades(){
                ruta = "{{URL::to('admin/modificaSucursal/')}}";
                document.formSucursal.action=ruta+"/"+document.formSucursal.idSucursal.value+"/"+document.formSucursal.idPais.options[document.formSucursal.idPais.selectedIndex].value;
                document.formSucursal.method='get';
                document.formSucursal.submit();
            }
        </script>            
        <form name='formSucursal' action="{{url('admin/modificaSucursal/'.$sucursal->idSucursal)}}" method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Modificaci&oacute;n de sucursal</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Sucursal</th>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n</td>
                        <td>
                            <input type='text' name='descSucursal' value="<?php echo $sucursal->descSucursal?>" placeholder='Descripci&oacute;n de sucursal'>
                            <input type='hidden' name='idSucursal' value='<?php echo $sucursal->idSucursal?>'>
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
                                $ciudadSucursal = Ciudad::find($sucursal->idCiudad);
                                foreach ($ciudad as $llave=>$valor) {
                                        echo '<option value="'.$llave.'" '.($ciudadSucursal->idCiudad==$llave?'selected':'').'>'.$valor;
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
                                   echo '<option value="'.$llave.'" '.($sucursal->idEstatus==$llave?'selected':'').'>'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idEstatus')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Calle</td>
                        <td>
                            <input type='text' name='descCalle' value="<?php echo $sucursal->calle?>" placeholder='Nombre de calle'>
                            {{$errors->first('descCalle')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Colonia</td>
                        <td>
                            <input type='text' name='descColonia' value="<?php echo $sucursal->colonia?>" placeholder='Nombre de colonia'>
                            {{$errors->first('desColonia')}}
                        </td>
                    </tr>
                    <tr>
                        <td>No. interior</td>
                        <td>
                            <input type='text' name='noInterior' value="<?php echo $sucursal->numInterior?>" placeholder='N&uacute;mero interior'>
                        </td>
                    </tr>
                    <tr>
                        <td>No. exterior</td>
                        <td>
                            <input type='text' name='noExterior' value="<?php echo $sucursal->numExterior?>" placeholder='N&uacute;mero exterior'>
                        </td>
                    </tr>
                    <tr>
                        <td>CP</td>
                        <td>
                            <input type='text' name='cp' value="<?php echo $sucursal->cp?>" placeholder='C&oacute;digo postal'>
                            {{$errors->first('cp')}}
                        </td>
                    </tr>
                  <tr>
                    <th colspan='2'><input type='submit' value='Actualizar'></th>
                  </tr>
                </table>
            </center>
        </form>
@stop