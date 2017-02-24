<?php
	require_once("header.php");
	//require_once("class/class_conexion.php");
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
		        	Videos
		        	<!-- Esto es una variable generica que eudy utilizo.
		        		Comentado por nelson. -->
	                <!-- <?php echo $label->MenuFactura; ?> -->
	            </h1>
	</div>

	<div class="row">
		<div class="col-xs-8">

			<div class="row">
				<h1>Videos</h1>
				
				<!-- Aqui va codigo php -->
				
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2>Coleccion de videos</h2>
					</div>
					
					<div class="panel-body">
						<?php 

							if(isset($_POST)){
								$c = new Conexion();

								$sql = '';
								if(isset($_POST['id_album_video'])){
									$_SESSION['album_actual_video']=$_POST['id_album_video'];
									$sql = "SELECT * from videos where carpeta_id='$_POST[id_album_video]'";	
								}else{
									$sql = "SELECT * from videos where carpeta_id=".$_SESSION['album_actual_video'];	
								}

								$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

								//Los videos embebidos de youtube no tienen el mismo enlace estandar.
								//por lo tanto es necesario crear una serie de condiciones para youtube y vimeo y demas

								while($datos = mysqli_fetch_array($resultado)){
									static $c = 0;$c++;
									echo "videos:".$c;
									//===============Si el video es de youtuebe  
									// echo "Resultado: ".(bool)strpos($datos['url_video'],"youtube.com");//debug
									// echo "url:".$datos['url_video'];//debug

									#-----------------------------------------------------------
									#						Youtube
									#-----------------------------------------------------------
									if((bool)strpos($datos['url_video'],"youtube.com")>0){
										#============Formato 1 de youtube
										$datos['url_video']=str_replace("https://www.youtube.com/watch?v=","",$datos['url_video']);
										#============Formato 2 de youtube
										$datos['url_video']=str_replace("https://youtu.be/","",$datos['url_video']);
									 	echo 
										"
										  <iframe width='700' height='480' src='https://www.youtube.com/embed/$datos[url_video]' frameborder='1' allowfullscreen>
										  </iframe>
										";
									}
									#-----------------------------------------------------------
									#						Vimeo
									#-----------------------------------------------------------
									else if(strpos($datos['url_video'],"vimeo.com")){
										#============Formato 1 de vimeo
										$datos['url_video']=str_replace("https://vimeo.com/","",$datos['url_video']);
										
										echo 
										"
											<iframe src='https://player.vimeo.com/video/$datos[url_video]' width='700' height='400'></iframe>
										";
									#DailyMotion tiene 3 formatos de video. url,url-compartida-corta,y el embebido. 
									}
									#-----------------------------------------------------------
									#						DailyMotion
									#-----------------------------------------------------------
									else if(
										(bool)strpos($datos['url_video'],"dailymotion.com") or
										(bool)strpos($datos['url_video'],"http://dai.ly") == true
									 ){

									 	#================Formato 1
										$datos['url_video']=str_replace("http://www.dailymotion.com/video/","",$datos['url_video']);
										#================Formato 1
										$datos['url_video']=str_replace("http://dai.ly","",$datos['url_video']);

										#Los id de videos de dailymotion hay que separarlos de '_' que lleva el nombre del video

										echo "<h1>Primera posicion: <h2/>".strpos($datos['url_video'],'_');
										$delimitador=strpos($datos['url_video'],'_');
										$datos['url_video']=substr($datos['url_video'],0,$delimitador);
										echo 
										"
											<iframe src='//www.dailymotion.com/embed/video/$datos[url_video]' width='700' height='400'></iframe>
										";
									}
									#-----------------------------------------------------------
									#						Youtube
									#-----------------------------------------------------------
									else if(){}

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
							<form action="eliminar_album_video.php" method="post">
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
	