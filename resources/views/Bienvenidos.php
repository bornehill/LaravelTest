<!DOCTYPE html>
 <html>  
<head>
   <meta charset="utf-8" >
   <title>Inventarios</title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!--link rel="stylesheet" href="css/lebasi.css"-->
   <link rel="stylesheet" href="css/materialize.min.css" />
</head>  
<body>
  <form name="acceso" action='autentica' method='post'>
    <input type='hidden' name="_token" value="<?php echo csrf_token(); ?>">
      <div id="container">
        <header>
              <h3 class="red darken-4 white-text center-align">Sistema de Inventarios</h3>
        </header>
          <div class="row">
            <div class="col s4">
              <div class="row">
                <div class="input-field">
                  <input id="usuario" name="usuario" type="text" class="validate">
                  <label for="usuario">Usuario</label>
                </div>                
              </div>
              <div class="row">
                <div class="input-field">
                  <input id="pass" name="pass" type="password" class="validate">
                  <label for="pass">Contraseña</label>
                </div>                
              </div>
              <div class="row">
                <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Autenticar
                  <i class="material-icons right">vpn_key</i>
                </button>                
              </div>                            
            </div>
            <div class="col s8">
               <h3>Bienvenidos</h3>
                <p class="flow-text">Sistema de inventarios de ejemplo para el control de insumos, equipo, software, etc. 
                  Desarrollado en Laravel y Material Design</p>              
            </div>
          </div>
       </div>
   </form>
    <footer class"page-footer">
      <div class="container-fluid red darken-4">
        <div class="row">
          <div class="col s12">
            <h6 class="white-text center-align">App por @Alí Escamilla Navarro</h6>
          </div>
        </div>
      </div>
    </footer>   
   <script src="js/jquery.js"></script>
   <script src="js/materialize.min.js"></script>
 </body>
 </html> 