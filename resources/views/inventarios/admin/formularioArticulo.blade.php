@extends('inventarios.admin.layouts.base')

@section('content')
        <script languaje='javascript'>
            $(document).ready(function() {
                $('select').material_select();
                $(".dropdown-content li>a, .dropdown-content li>span").css("color", "red");
              });            
        </script>
        <form name='formArticulo' action='agregarArticulo' method='post' >
            <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
            <div class="row">
                <div class="col s6">
                    <h5 class="red-text text-darken-4" id='encabezado'>Nuevo Art&iacute;culo</h5>
                </div>
            </div>
             <div class="row">
                <div class="col s6">
                    <h6 class="red-text text-darken-4">Art&iacute;culo</h6>
                </div>
            </div>
             <div class="row">
                <div class="col s1">
                    Descripci&oacute;n
                </div>
                <div class="col s5">
                    <input type='text' name='desArticulo' placeholder='Descrici&oacute; del art&iacute;culo'>
                    {{$errors->first('descArticulo')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Marca
                </div>
                <div class="col s5">
                    <input type='text' name='marca' placeholder='Marca art&iacute;culo'>
                    {{$errors->first('marca')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Modelo
                </div>
                <div class="col s5">
                    <input type='text' name='modelo' placeholder='Modelo art&iacute;culo'>
                    {{$errors->first('modelo')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Num. Serie
                </div>
                <div class="col s5">
                    <input type='text' name='numSerie' placeholder='N&uacute;mero de serie'>
                    {{$errors->first('numSerie')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Fecha fact.
                </div>
                <div class="col s5">
                    <input type='date' name='fechaFactura' placeholder='dd/mm/yyyy'>
                    {{$errors->first('fechaFactura')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Folio fact.
                </div>
                <div class="col s5">
                    <input type='text' name='folioFactura' placeholder='Folio factura'>
                    {{$errors->first('folioFactura')}}
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Caracter&iacute;sticas
                </div>
                <div class="col s5">
                    <textarea maxLength="200" name='caracteristicas' placeholder='Caracter&iacute;sticas art&iacute;culo'></textarea>
                </div>                
            </div>
             <div class="row">
                <div class="col s1">
                    Stock
                </div>
                <div class="col s5">
                    <input type='number' name='stock' placeholder='Stock art&iacute;culo'>
                    {{$errors->first('stock')}}
                </div>                
            </div>                                                                        
            <div class="row">
                <div class="col s1">
                    Tipo
                </div>
                <div class="col s5">
                    <select name='idTipoArticulo' id='idTipoArticulo' class="red-text">
                        <option value='0'>Seleccione un tipo</option>
                        <?php
                        foreach ($tipoArticulo as $llave=>$valor) {
                            echo '<option value="'.$llave.'">'.$valor;
                        }    
                        ?>
                    </select>
                    {{$errors->first('idTipoArticulo')}}
                </div>                
            </div>
            <div class="row">
                <div class="col s1">
                    Estatus
                </div>
                <div class="col s5">
                    <select name='idEstatus' id='idEstatus' class="red-text">
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
                </div>                
            </div>
             <div class="row">
                <div class="col s6">
                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Agregar
                      <i class="material-icons right">create</i>
                    </button>
                </div>                
            </div>
        </form>
@stop