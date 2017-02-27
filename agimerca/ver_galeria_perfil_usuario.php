
<div class="row">
		<div class="col-xs-12">

			<div class="row">
				<div class="col-xs-12"> <br/>
				<form action="" method="post">
					<input type="hidden" name="paso" value="1" />
					<button class="btn btn-danger" type="submit"> Regresar</button>
				</form>
				</div>
				<div class="col-xs-12"><br/>
				<!-- Aqui va codigo php -->
				
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2>Galeria del album</h2>
					</div>
					
					<div class="panel-body">
						<?php 
                                //die("paso dos tres");

							if(isset($_POST)){

								$c = new Conexion();

								$sql = '';
								if(isset($_POST['id_album'])){
									$_SESSION['album_actual']=$_POST['id_album'];
									$sql = "SELECT * from galerias where carpeta_id='$_POST[id_album]'";	
								
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
					
			</div>

	</div>
	
</div>
