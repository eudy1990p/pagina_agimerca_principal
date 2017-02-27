<?php 
require_once("class/class_ini.php"); 
if (isset($_POST["cambiarClave"])) {
   $usuario->cambiarClave($_POST);
}
if(!isset($tituloAgimerca) || empty($tituloAgimerca)){
    $tituloAgimerca = "Inicio";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="Agimerca">
    <meta name="author" content="Eudy Arias programador">
    <link rel="icon" href="img/mm.png">

    <title id="titulosPH"><?php echo $tituloAgimerca; ?>-Agimerca</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">

     <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    
      <link rel="stylesheet" href="//select2.github.io/select2/select2-3.5.2/select2.css">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/ -->
    <script src="js/jquery.min.js"></script>
      
<script src="//select2.github.io/select2/select2-3.4.2/select2.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <script src="js/MisFunciones.js"></script>

      <script>
         $( document ).ready(function() {
  // Handler for .ready() called.
           $( ".select2" ).select2( { placeholder: "Seleccione una opción"} );
             $( ".select2buscador" ).select2( { placeholder: "Seleccione un mercado"} );
});
      </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

   <?php require_once("menu.php"); ?>

  <div class="container theme-showcase" role="main">
