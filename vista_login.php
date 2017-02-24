<?php require_once("agimerca/class/class_ini1.php"); 
 if (isset($_POST)) {
    if (isset($_POST["login"])) {
     $resp = $usuario->validarDatosUser($_POST);
    }
 }
 if (isset($_GET["deslogueo"])) {
    $usuario->eliminarSesiones();
 }
/**
for this peace of software-"quality" shit you take money? 
how about, learn "programming"? ;)
*/
?>
   <div  style="background-color: rgba(51, 51, 51, 0.51);color: white;">

      <?php if (isset($resp)) {
        if ($resp == '1') {
      ?>
        <div class="alert alert-danger text-center" role="alert">
          <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo $label->LoginEmail; ?> <?php echo $label->O; ?> <?php echo $label->LoginClave; ?> <?php echo $label->NoCoinsiden; ?></strong></div>
      <?php }   } ?>

      <form action="agimerca/index.php" method="post" class="form-signin">
					
					<input type="hidden" name="login">
						
					<div class="form-group">
						<label for="inputEmail" class="sr-only"><?php echo $label->LoginEmail; ?></label>
						<input style="    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;" type="text" id="inputEmail" name="user" class="form-control" placeholder="<?php echo $label->LoginEmail; ?>" required autofocus>
					</div>
					<div class="form-group">
							<label for="inputPassword" class="sr-only"><?php echo $label->LoginClave; ?> </label>
							<input style="    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;" type="password" id="inputPassword" name="clave" class="form-control" placeholder="<?php echo $label->LoginClave; ?>" required >
						</div>

					<button class=" btn-lg btn-success btn-block" type="submit"><?php echo $label->LoginBtnEntrar; ?> </button>
					
					<a class=" btn-lg btn-primary btn-block" style="color:#fff;" href="registro.php"><?php echo "Registrarte"; ?> </a>
		  </form>

    </div> <!-- /container -->

 