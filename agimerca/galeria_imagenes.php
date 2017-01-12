<?php
	require_once("header.php");
	require_once("class/class_conexion.php");
	if(isset($_POST)){
		if(isset($_POST["agregar_post"])){
			
		}
	}
?>


	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type='text/javascript' src="js/jspdf.debug.js"></script>  	
	  
	<div class="page-header">
		        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
		        	Galeria
		        	<!-- Esto es una variable generica que eudy utilizo.
		        		Comentado por nelson. -->
	                <!-- <?php echo $label->MenuFactura; ?> -->
	            </h1>
	</div>

	<div class="row">
		<div class="col-xs-8">

			<div class="row">
				<h1>Albunes creados</h1>
				
				<!-- Aqui va codigo php -->
				
				<?php 
					$c = new Conexion();

					$sql = "select * from carpeta_gallerias where user_id_creado=".$_SESSION['id']." and estado ='activo'";

					$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

					while ($datos = mysqli_fetch_array($resultado)) {

						echo 
						"
							<form action='ver_galeria.php' method='post'>
								<div class='col-xs-4'>
									<h3>$datos[nombre]</h3>
									<button class='btn btn-link btn-lg' name='id_album' type='submit' value='$datos[id]'>ver</button>
									<br/>
									<span>fecha publicacion: $datos[fecha_creado]</span>
								</div>
							<form/>
						";
					}
				?>

			</div>
			<hr/>
			<form action="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="boton">Agregar un nuevo album</label>
				    <br/>
				    <!-- Redireccionamiento -->
				    <a class="btn btn-success" href="crear_galeria.php">Ir a crear</a>
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
	