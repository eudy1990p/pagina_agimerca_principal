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
				
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2>Galeria del album</h2>
					</div>
					
					<div class="panel-body">
						<?php 

							if(isset($_POST)){
								$c = new Conexion();

								$sql = '';
								if(isset($_POST['id_album'])){
									$_SESSION['album_actual']=$_POST['id_album'];
									$sql = "SELECT * from galerias where carpeta_id='$_POST[id_album]'";	
								}else{
									$sql = "SELECT * from galerias where carpeta_id=".$_SESSION['album_actual'];	
								}

								$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

								while($datos = mysqli_fetch_array($resultado)){
									echo 
									"
									  <div class='col-xs-4'>
									    <a href='#' class='thumbnail'>
									      <img src='imagenes_galeria/$datos[url_img]'>
									    </a>
									  </div>
									"
									;
								}
							}
						?>
					</div>
				</div>

			</div>

			<hr/>
	</div>



	<div class="col-xs-4">
		
	<?php require_once("menuizquierdo.php"); ?>

		<aside class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
						Acciones para el album
					</div>
					<div class="panel-body">
						<label class="form-label">Reaccion</label>

						<!-- Lo programo en otra fecha... -->
							<!-- <form action="eliminar_album.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<button type="submit" name="accion" value="agregar" class="form-control btn btn-success" >
										Agregar otra foto
									</button>
								</div>
							</form> -->
							<form action="eliminar_album.php" method="post">
								<div class="form-group">
									<button type="submit" name="accion" value="eliminar" class="form-control btn btn-danger" >
										Eliminar este album
									</button>
								</div>
							</form>


					</div>
				</div>
			</aside>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	