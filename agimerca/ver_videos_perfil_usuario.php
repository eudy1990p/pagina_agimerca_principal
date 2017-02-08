
<div class="row">
		<div class="col-xs-12">

			<div class="row">
			<div class="col-xs-12">
				 <br/>
				<form action="" method="post">
					<input type="hidden" name="paso" value="3" />
					<button class="btn btn-danger" type="submit"> Regresar</button>
				</form>
				 <br/>
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
									$sql = "SELECT * from videos where carpeta_id='".$_POST["id_album_video"]."'";	
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

								}
							}
						?>

					</div>


				</div>

			</div>

			</div>
	</div>
	
</div>

