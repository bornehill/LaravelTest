@extends('inventarios.admin.layouts.base')

@section('content')
        <form name='formArticulo' action='agregarArticulo' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
            <center>       
                <p id='encabezado'>Nuevo Art&iacute;culo</p>
                <table border=1 align='center'>
                    <tr>
                        <th colspan=2>Art&iacute;culo</th>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n</td>
                        <td>
                            <input type='text' name='desArticulo' placeholder='Descrici&oacute; del art&iacute;culo'>
                            {{$errors->first('descArticulo')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td>
                            <input type='text' name='marca' placeholder='Marca art&iacute;culo'>
                            {{$errors->first('marca')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td>
                            <input type='text' name='modelo' placeholder='Modelo art&iacute;culo'>
                            {{$errors->first('modelo')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Num. Serie</td>
                        <td>
                            <input type='text' name='numSerie' placeholder='N&uacute;mero de serie'>
                            {{$errors->first('numSerie')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Fech fact.</td>
                        <td>
                            <input type='date' name='fechaFactura' placeholder='dd/mm/yyyy'>
                            {{$errors->first('fechaFactura')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Folio fact.</td>
                        <td>
                            <input type='text' name='folioFactura' placeholder='Folio factura'>
                            {{$errors->first('folioFactura')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Caracter&iacute;sticas</td>
                        <td>
                            <textarea maxLength="200" name='caracteristicas' placeholder='Caracter&iacute;sticas art&iacute;culo'></textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <td>Stock</td>
                        <td>
                            <input type='number' name='stock' placeholder='Stock art&iacute;culo'>
                            {{$errors->first('stock')}}
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td>
                            <select name='idTipoArticulo'>
                                <option value='0'>Seleccione un art&iacute;culo</option>
                                <?php
                                foreach ($tipoArticulo as $llave=>$valor) {
                                    echo '<option value="'.$llave.'">'.$valor;
                                }    
                                ?>                                
                            </select>
                            {{$errors->first('idTipoArticulo')}}
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
            <br>
        </form>
@stop