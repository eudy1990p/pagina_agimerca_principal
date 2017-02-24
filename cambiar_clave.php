<?php
	require_once("header.php");
	
	if(isset($_POST)){
		if(isset($_POST["accion"]) && ($_POST["accion"] == "cambiar_clave")){
			$usuario->editUsuario($_POST);
		}
		
	}
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

<script type='text/javascript' src="js/jspdf.debug.js"></script>

	  	
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Cambiar clave"; ?></h1>
</div>

<div class="row">
		<div class="col-xs-8">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="accion" value="cambiar_clave"/>

				<div class="row">

					<div class="col-xs-12">
						Clave nueva<br/>
						<input type="password" name="clave" placeholder="Clave" class="form-control" >
					</div>
					<div class="col-xs-12"><br/>
						Repetir clave nueva<br/>
						<input type="password" name="clave" placeholder="Clave" class="form-control" >
					</div>				
					<div class="col-xs-12 text-right"><br/>
						<button type="submit" class="btn btn-success">Cambiar</button>
					</div>

				</div>
			</form>
			
			
	
			

	</div>

	<div class="col-xs-4">
	<?php require_once("menuizquierdo.php"); ?>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	