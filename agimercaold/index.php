<?php require_once("class/class_ini.php"); 
 if (isset($_POST)) {
    if (isset($_POST["login"])) {
     $resp = $usuario->validarDatosUser($_POST);
    }
 }
 if (isset($_GET["deslogueo"])) {
    $usuario->eliminarSesiones();
	 header("location:index.php");
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
     <meta name="description" content="manejador de multiples banca">
    <meta name="author" content="Eudy Arias programador">
    <link rel="icon" href="http://eudy.260mb.net/eudyarias/img/eudyicono.png">

    <title><?php echo $label->LoginTitle; ?>-Agimerca</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-image: url(img/fondo.jpg);
    background-size: cover;">

    <div class="container" style="background-color: rgba(51, 51, 51, 0.51);
    padding-bottom: 10%;
    color: white;">

      <?php if (isset($resp)) {
        if ($resp == '1') {
      ?>
        <div class="alert alert-danger text-center" role="alert">
          <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $label->LoginEmail; ?> <?php echo $label->O; ?> <?php echo $label->LoginClave; ?> <?php echo $label->NoCoinsiden; ?></strong></div>
      <?php }   } ?>

      <form action="" method="post" class="form-signin">
        <input type="hidden" name="login">
        <h2 class="form-signin-heading">Agimerca-<?php echo $label->LoginTitle; ?></h2>
        <label for="inputEmail" class="sr-only"><?php echo $label->LoginEmail; ?></label>
        <input type="text" id="inputEmail" name="user" class="form-control" placeholder="<?php echo $label->LoginEmail; ?>" required autofocus><br/>
				
        <label for="inputPassword" class="sr-only"><?php echo $label->LoginClave; ?> </label>
        <input type="password" id="inputPassword" name="clave" class="form-control" placeholder="<?php echo $label->LoginClave; ?>" required>
				
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> <?php echo $label->LoginRecordarClave; ?>
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit"><?php echo $label->LoginBtnEntrar; ?> </button>
				<br/>
				<a class="btn btn-lg btn-primary btn-block" href="registro.php"><?php echo "Registrarte"; ?> </a>
      </form>


      

    </div> <!-- /container -->


    <footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="http://eudy.260mb.net"><?php echo $label->FooterDerechos; ?></a></p>
      </div>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
