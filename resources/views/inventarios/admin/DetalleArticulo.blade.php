@extends('inventarios.admin.layouts.popUpBase')

@section('content')
    <form name='formDetalleArticulo'>
        <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
        <center>       
            <p id='encabezado'>Detalle de art&iacute;culo</p>
            <table border=1 align='center'>
                <tr>
                    <th colspan=2>Art&iacute;culo</th>
                </tr>
                <tr>
                    <td>Descripci&oacute;n</td>
                    <td>
                        <input type='text' name='desArticulo' value="<?php echo $articulo->desArticulo?>" placeholder='Descrici&oacute; del art&iacute;culo' disabled>
                        <input type='hidden' name='idArticulo' value='<?php echo $articulo->idArticulo?>'>
                        {{$errors->first('desArticulo')}}
                    </td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td>
                        <input type='text' name='marca' value="<?php echo $articulo->marca?>" placeholder='Marca art&iacute;culo' disabled>
                    </td>
                    {{$errors->first('marca')}}
                </tr>
                <tr>
                    <td>Modelo</td>
                    <td>
                        <input type='text' name='modelo' value="<?php echo $articulo->modelo?>" placeholder='Modelo art&iacute;culo' disabled>
                        {{$errors->first('modelo')}}
                    </td>
                </tr>
                <tr>
                    <td>Num. Serie</td>
                    <td>
                        <input type='text' name='numSerie' value="<?php echo $articulo->numSerie?>" placeholder='N&uacute;mero de serie' disabled>
                        {{$errors->first('numSerie')}}
                    </td>
                </tr>
                <tr>
                    <td>Fech fact.</td>
                    <td>
                        <input type='date' name='fechaFactura' value="<?php echo $articulo->fechaFactura?>" placeholder='dd/mm/yyyy' disabled>
                        {{$errors->first('fechaFactura')}}
                    </td>
                </tr>
                <tr>
                    <td>Folio fact.</td>
                    <td>
                        <input type='text' name='folioFactura' value="<?php echo $articulo->folioFactura?>" placeholder='Folio factura' disabled>
                        {{$errors->first('folioFactura')}}
                    </td>
                </tr>
                <tr>
                    <td>Caracter&iacute;sticas</td>
                    <td>
                        <textarea maxLength="200" name='caracteristicas' placeholder='Caracter&iacute;sticas art&iacute;culo' disabled><?php echo $articulo->caracteristicas?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td>
                        <input type='number' name='stock' value="<?php echo $articulo->stock?>" placeholder='Stock art&iacute;culo' disabled>
                        {{$errors->first('stock')}}
                    </td>
                </tr>
                <tr>
                    <td>Tipo</td>
                    <td>
                        <select name='idTipoArticulo' disabled>
                            <option value='0'>Seleccione un art&iacute;culo</option>
                            <?php
                            foreach ($tipoArticulo as $llave=>$valor) {
                               echo '<option value="'.$llave.'" '.($articulo->idTipoArticulo==$llave?'selected':'').'>'.$valor;
                            }    
                            ?>                                
                        </select>
                        {{$errors->first('idTipoArticulo')}}
                    </td>
                </tr>
                <tr>
                    <td>Estatus</td>
                    <td>
                        <select name='idEstatus' disabled>
                            <option value='0'>Seleccione un estatus</option>
                            <?php
                            foreach ($estatus as $llave=>$valor) {
                               echo '<option value="'.$llave.'" '.($articulo->idEstatus==$llave?'selected':'').'>'.$valor;
                            }    
                            ?>                                
                        </select>
                        {{$errors->first('idEstatus')}}
                    </td>
                </tr>
              <tr>
                <th colspan='2'><input type='button' value='Cerrar' onclick='window.close();'></th>
              </tr>
            </table>
        </center>
        <br>
    </form>
@stop