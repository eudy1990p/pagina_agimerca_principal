<?php

	//Nelson.
	// Inicio las secciones
	// session_start();

	require_once("header.php");
	require_once("class/Modelos/Videos.php");
	require_once("class/Modelos/Usuarios.php");
	require_once("class/Modelos/CarpetaVideos.php");
	//require_once("class/class_usuario.php");

	if(isset($_POST)){
		if(isset($_POST["agregar_post"])){
			
		}
	}
?>

<!--No sera necesario para esta seccion. 
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type='text/javascript' src="js/jspdf.debug.js"></script>  	 -->
	  
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

			<?php 

				//debug=============================================nelson
				// $galeria = new Galeria(1);// Se carga con id 1
				// echo "prueba de importacion";
				// echo "<br>";
				// echo $galeria->user_creador;

			// echo "session actual:".$_SESSION["usuario"];

			// $usuario_actual = $_SESSION["usuario"];

			// $usuario = new UsuariosNelson($usuario_actual);

			// echo "<h1>$usuario->id<h1/>"."<br>";
			// echo "<h1>$usuario->user<h1/>"."<br>";
			// echo "<h1>$usuario->clave<h1/>"."<br>";
			// echo "<h1>$usuario->tipo<h1/>"."<br>";
			// echo "<h1>$usuario->descripcion<h1/>"."<br>";
			// echo "<h1>$usuario->video<h1/>"."<br>";
			// echo "<h1>$usuario->estado<h1/>"."<br>";

			?>

			<form action="" method="post">


				<div class="form-group">
					<label class="control-label">Nombre de la coleccion de videos</label>
					<input class="form-control" name='nombre' type="input" required="required"></input>
				</div>

				<div class="form-group">
					<label class="text-danger control-label">Solo url/s de youtube</label><br/>
					<label class="control-label">Escribe aqui las url de los videos</label>
					<textarea class="form-control" name="url_videos"></textarea>
				</div>


				<input class="btn btn-success" name="enviar" type="submit" value="Crear" />
			</form>

			<?php 

				//$galeria = new CarpetaGalerias();
				
				// debug==================================================
				// echo "<h3 class='alert alert-success'>$_SESSION[id]</h3>";

				if(isset($_POST['enviar'])){
					$c = new Conexion();
					//--------------------------------
					$datos = array(

						'usuario' => $_SESSION["id"], 
						'nombre'  => $_POST["nombre"]
					);
					//guardo un nuevo objeto CarpetaGalerias.
					CarpetaVideos::guardar($datos);
					//--------------------------------


					$textarea_line = str_replace("\n", "<br>",$_POST['url_videos']);
					
					$url_s = explode("<br>", $textarea_line);

					for ($i=0; $i <sizeof($url_s); $i++) { 
						$datos = [
							'usuario' 	=> $_SESSION["id"],
							'url_video'  => $url_s[$i],
							'id_carpeta'	=> CarpetaVideos::getUltimo()
						];

						Videos::crear($datos);
					}
					//--------------------------------
					echo "<h3 class='alert alert-success'>Datos guardados con exito</h3>";
				}
			?>

	</div>



	<div class="col-xs-4">
		<?php require_once("menuizquierdo.php"); ?>

	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	