<?php require_once("class/class_ini.php"); 
 if (isset($_POST)) {
    if (isset($_POST["registro"])) {
     $resp = $usuario->addUsuarioConImagen($_POST,$_FILES);
    }
 }

/**
for this peace of software-"quality" shit you take money? 
how about, learn "programming"? ;)
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="Red Social de agimerca">
    <meta name="author" content="Eudy Arias programador">
    <link rel="icon" href="img/mm.png">

    <title><?php echo "Registro"; ?>-Agimerca</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body  style="background-image: url(img/fondo.jpg);
    background-size: cover;">

    <div class="container" style="    background-color: rgba(51, 51, 51, 0.51);
    padding-bottom: 10%;
    color: white;">


      <form action="" method="post" id="formRegistro" enctype="multipart/form-data" class="form-signin">
        <input type="hidden" name="registro">
        <h2 class="form-signin-heading">Agimerca-<?php echo "Registro"; ?></h2>
				Seleccione una imagen desde su computador<br/>
				<input type="file" id="inputImgPerfil" name="ImgPerfil" class="form-control" />
<br/>
				
        <label for="inputEmail" class="sr-only"><?php echo $label->LoginEmail; ?></label>
        <input type="email" id="inputEmail" name="user" class="form-control" placeholder="<?php echo $label->LoginEmail; ?>" required autofocus><span id="usuarioexiste" style="background-color: rgba(255, 255, 255, 0.46);
    display: block;
    text-align: center;"></span>
        <label for="inputPassword" class="sr-only"><?php echo $label->LoginClave; ?> </label><br/>
				
        <input type="password" id="inputPassword" name="clave" class="form-control" placeholder="<?php echo $label->LoginClave; ?>" required><span id="msjClave" style="background-color: rgba(255, 255, 255, 0.46);
    display: block;
    text-align: center;"></span>
        
				
				<input type="password" id="inputPassword1" name="clave1" class="form-control" placeholder="<?php echo "Repetir ".$label->LoginClave; ?>" required><span id="msjClave1" style="background-color: rgba(255, 255, 255, 0.46);
    display: block;
    text-align: center;"></span>
				
        <button class="btn btn-lg btn-primary btn-block" id="btRegistrate" type="submit"><?php echo "Registrarse"; ?> </button>
      </form>

    </div> <!-- /container -->




    <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="http://eudy.260mb.net"><?php echo $label->FooterDerechos; ?></a></p>
      </div>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
      <script type="text/javascript" >
            $("#inputEmail").blur(function (){
            if($("#inputEmail").val() != 0){
                $.ajax({
                          url:"ajax.php",
                          data:{accion:"validarUsuario",usuario:$("#inputEmail").val()},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                         // alert(data);
                            if(data["total"] > 0){  
                                $("#usuarioexiste").html("El usuario ya existe <br/>");
                                $("#usuarioexiste").css("color","#8f0909");
                                $("#inputEmail").val("");$("#inputEmail").css("border-color","red");
                            }else{
                                $("#usuarioexiste").html("El usuario disponible <br/>");
                                $("#usuarioexiste").css("color","#0f710f");
                                $("#inputEmail").css("border-color","green");
                            }
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });
              }
            });
          $("#btRegistrate").click(function (e){
              e.preventDefault();
                
                if($("#inputEmail").val() == 0 ){
                    notificacionesMensaje("usuarioexiste","inputEmail","No puede estar vacío el campo usuario y debe ser un correo electronico",true);
                    return false;
                }else{
                    notificacionesMensaje("usuarioexiste","inputEmail","",false);
                }
                var respuesta = validarUsuario();
                if(respuesta){
                    return false;
                }
                if($("#inputPassword").val() == 0 ){
                    notificacionesMensaje("msjClave","inputPassword","No puede estar vacío el campo clave",true);
                    return false;
                }else{
                    notificacionesMensaje("msjClave","inputPassword","",false);
                }
              if($("#inputPassword1").val() == 0 ){
                    notificacionesMensaje("msjClave1","inputPassword1","No puede estar vacío el campo repita clave",true);
                    return false;
                }else{
                    notificacionesMensaje("msjClave1","inputPassword1","",false);
                }
              
              
              if($("#inputPassword1").val() != $("#inputPassword").val() ){
                    notificacionesMensaje("msjClave","inputPassword","Las claves no coinsiden",true);
                    notificacionesMensaje("msjClave1","inputPassword1","Las claves no coinsiden",true);
                    return false;
                }else{
                    notificacionesMensaje("msjClave1","inputPassword1","",false);
                    notificacionesMensaje("msjClave","inputPassword","",false);
                }
                
          
                $("#formRegistro").submit();
              //formRegistro
          });
          function notificacionesMensaje(span,input,msj,incorrecto){
              if(incorrecto){  
                                $("#"+span).html(msj+" <br/>");
                                $("#"+span).css("color","#8f0909");
                                $("#"+input).val("");$("#"+input).css("border-color","red");
                            }else{
                                $("#"+span).html(msj+" <br/>");
                                $("#"+span).css("color","#0f710f");
                                $("#"+input).css("border-color","green");
                            }
          }
          function validarUsuario(){
            if($("#inputEmail").val() != 0){
                var respuesta = false;
                $.ajax({
                          url:"ajax.php",
                          data:{accion:"validarUsuario",usuario:$("#inputEmail").val()},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                         // alert(data);
                            if(data["total"] > 0){  
                                $("#usuarioexiste").html("El usuario ya existe <br/>");
                                $("#usuarioexiste").css("color","#8f0909");
                                $("#inputEmail").val("");$("#inputEmail").css("border-color","red");
                                respuesta =true;
                            }else{
                                $("#usuarioexiste").html("El usuario disponible <br/>");
                                $("#usuarioexiste").css("color","#0f710f");
                                $("#inputEmail").css("border-color","green");
                                repuesta = false;
                            }
                          },
                          error:function (){
                              console.error("Nada bueno");
                              repuesta = false;
                          }
                      });
                return respuesta;
              }
            }
      </script>
  </body>
</html>
