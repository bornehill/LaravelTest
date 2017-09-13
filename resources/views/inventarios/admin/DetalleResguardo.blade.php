@extends('inventarios.admin.layouts.popUpBase')

@section('content')
        <script languaje='javascript'>
            function actualizaResguardo(){
                ruta = "{{URL::to('admin/detalleResguardo/')}}";
                document.formDetalleResguardo.action=ruta+"/"+document.formDetalleResguardo.resguardoId.value;
                document.formDetalleResguardo.method='post';
                document.formDetalleResguardo.submit();
            }
        </script>
    <form name='formDetalleResguardo'>
        <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>"> 
        <center>
            <p id='encabezado'>Detalle de resguardo</p>
            {{$errors->first('updateResguard')}}
            <table border=1 align='center'>
                <tr>
                    <th colspan=2>Resguardo</th>
                </tr>
                <tr>
                    <td>Empleado</td>
                    <td>
                        <input type='text' name='nombreEmpleado' value="<?php echo $resguardo->empleado->app.' '.$resguardo->empleado->apm.' '.$resguardo->empleado->nombre?>" placeholder='Nombre del empleado' disabled>
                        <input type='hidden' name='idEmpleado' value='<?php echo $resguardo->empleado->idEmpleado?>'>
                        <input type='hidden' name='resguardoId' value='<?php echo $resguardo->idResguardo?>'>
                    </td>
                </tr>
                <tr>
                    <td>Descripci&oacute;n</td>
                    <td>
                        <input type='text' name='desArticulo' value="<?php echo $resguardo->articulo->desArticulo?>" placeholder='Descrici&oacute; del art&iacute;culo' disabled>
                        <input type='hidden' name='idArticulo' value='<?php echo $resguardo->articulo->idArticulo?>'>
                    </td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td>
                        <input type='text' name='marca' value="<?php echo $resguardo->articulo->marca?>" placeholder='Marca art&iacute;culo' disabled>
                    </td>
                </tr>
                <tr>
                    <td>Modelo</td>
                    <td>
                        <input type='text' name='modelo' value="<?php echo $resguardo->articulo->modelo?>" placeholder='Modelo art&iacute;culo' disabled>
                    </td>
                </tr>
                <tr>
                    <td>Num. Serie</td>
                    <td>
                        <input type='text' name='numSerie' value="<?php echo $resguardo->articulo->numSerie?>" placeholder='N&uacute;mero de serie' disabled>
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td>
                        <input type='date' name='fecha' value="<?php echo $resguardo->toFecha()?>" placeholder='Fecha resguardo' disabled>
                    </td>
                </tr>
                <tr>
                    <td>Motivo</td>
                    <td>
                        <textarea maxLength="200" name='motivo' placeholder='Motivo del resguardo'><?php echo $resguardo->motivo?></textarea>
                        {{$errors->first('motivo')}}
                    </td>
                </tr>
                <tr>
                    <td>Estatus</td>
                    <td>
                        <select name='idEstatus'>
                            <option value='0'>Seleccione un estatus</option>
                            <?php
                            foreach ($estatus as $llave=>$valor) {
                               echo '<option value="'.$llave.'" '.($resguardo->idEstatus==$llave?'selected':'').'>'.$valor;
                            }    
                            ?>                                
                        </select>
                        {{$errors->first('idEstatus')}}
                    </td>
                </tr>
              <tr>
                <th colspan='2'>
                    <input type='button' value='Actualizar' onclick='actualizaResguardo();'>
                    <input type='button' value='Cerrar' onclick='window.close();'>
                </th>
              </tr>
            </table>
        </center>
        <br>
    </form>
@stop