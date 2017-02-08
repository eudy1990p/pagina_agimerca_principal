<?php
	require_once("class/class_usuario.php");
	require_once("header.php");
	require_once("class/class_conexion.php");
	if(isset($_POST)){
		if(isset($_POST["agregar_post"])){
			
		}
	}
?>

<?php 
	if(isset($_POST['usuario-amigo'])){

		$_SESSION['hablante-actual']=$_POST['usuario-amigo'];

		$sql = 
		"
		update mensajes_privados set visto = true where user_id_creado=".$_POST['usuario-amigo']."
		and para_user_id=".$_SESSION['id']
		;
		mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
	}

	if(isset($_POST['mensaje-dejado'])){// el mensaje dejado es el id del usuario al que se le dejo el mensaje.
		$_SESSION['hablante-actual']=$_POST['mensaje-dejado'];

/*		$_POST['hablante-actual']=$_POST['mensaje-dejado'];//Se asigna el post para saber cual es el hablante.*/
	}

?>


<!-- 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type='text/javascript' src="js/jspdf.debug.js"></script>  	 -->
	  
	<div class="page-header">
		        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
		        	 Mensajeria
		        	<!-- Esto es una variable generica que eudy utilizo.
		        		Comentado por nelson. -->
	                <!-- <?php echo $label->MenuFactura; ?> -->
	            </h1>
	</div>

					<div class="row">
					
						<div class=" col-xs-5" style="">
							<h4 >usuarios</h4>
								<?php //echo 'hablente acutual! '.$_SESSION['hablante-actual'] ?>
								<ul class="list-group">

									<?php

										$c = new Conexion();

						                $id_usuario = $_SESSION['id'];


						                //Selecciona los usuario a los que se le an enviado mensajes
						                //y a los que nos an enviado.
						                $sql =
						                "
										select tabla.*,usuarios.user,amigo as user_id,count(visto) as cantidad, usuarios.img_perfil from 
										(select t1.*,para_user_id as amigo from mensajes_privados t1 where user_id_creado = 1  group by user_id_creado 
										union
										select t2.*,user_id_creado as amigo from mensajes_privados t2 where para_user_id = 1  group by user_id_creado) 
										as tabla
										join usuarios 
										on tabla.user_id_creado=usuarios.id	group by amigo		                ";
														//echo $sql;
						                $resultado= mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
						                //echo "consulta $sql";
						                while ($datos = mysqli_fetch_array($resultado)):
									?>
									<li class="list-group-item">
										<!-- <a href="mensajeria.php?hablante=juan">hola</a> -->
										<form action="" method="post">
											<button class="btn btn-link" type="submit" name="usuario-amigo" value="<?php echo $datos['amigo'] ?>">
											<img src="<?php echo $datos['img_perfil'] ?>" class="img-circle" width="30" height="30"> &nbsp; <?php echo $datos['user'] ?> &nbsp; <span class="badge"><?php echo $datos['cantidad'] ?></span>
											</button>
											<!-- Se elimina mensaje dejado ya que si se selecciona otro usuario 
											seguiria seleccionando mensaje dejado y por lo tanto siempre 
											se estaria hablando con el mismo usuario. -->
											<?php unset($_GET['mensaje_dejado']);?>
										</form>
										
										
									</li>

								<?php endwhile; ?>
								
								</ul>
						</div>
						
						
						<div class="panel col-xs-7">
							<h4>mensajes</h4>
							<!-- cambio  -->
							<?php if (isset($_POST['usuario-amigo']) or isset($_GET['mensaje_dejado']) or isset($_POST['btn-mensaje']) or isset($_SESSION['hablante-actual'])): ?>
							<div>
								<ul id="chat" class="list-group" style="height: 300px;overflow-y: scroll;">
									<?php 
										if(!isset($_POST['usuario-amigo'])){
										$_POST['usuario-amigo'] = $_GET['mensaje_dejado'];
										}
											if(isset($_POST['btn-mensaje'])){
											
											//$r=$_SESSION['hablante-actual'];//remitente
											$u=$_SESSION['id'];//usuario actual

											if(isset($_GET['mensaje_dejado'])){
												$r=$_GET['mensaje_dejado'];
											}else{
												$r=$_SESSION['hablante-actual'];
											}


											$m=$_POST['mensaje-enviado'];//mensaje

											$n = strip_tags($m);
										$sql = "insert into mensajes_privados values(default,$u,null,null,now(),'$m',$r,false)";

											mysqli_query($c->getContect(),$sql)or die(mysqli_error($c->getContect()));
										}

										if(isset($_POST['usuario-amigo']) or isset($_POST['btn-mensaje'])){
											$u=$_SESSION['id'];//usuario actual

											if(isset($_GET['mensaje_dejado'])){
												$r=$_GET['mensaje_dejado'];
												// mensaje que se dejo
											}else{
												$r=$_SESSION['hablante-actual'];//remitente
											}


											$sql = "select mensajes_privados.*,usuarios.img_perfil as imagen, usuarios.id

from mensajes_privados join usuarios on mensajes_privados.user_id_creado=usuarios.id 

where (user_id_creado = '".$u."' and  para_user_id = '".$r."' ) or (user_id_creado = '".$r."' and  para_user_id = '".$u."' )" 
											/*"
											select mensajes_privados.*,usuarios.img_perfil as imagen
											from mensajes_privados join usuarios 
											on mensajes_privados.user_id_creado=usuarios.id
											where user_id_creado in (".$u.",".$r.") and para_user_id in (".$u.",".$r.")
											"*/;
											//echo $sql;
											//die();
											$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
											while ($datos = mysqli_fetch_array($resultado)):
										?>
									<li class="list-group-item bg-info" style="margin-bottom: 2px;">
										<div class="panel">
											<a href="publicaciones_perfil_usuario.php?user_id=<?php echo $datos['id'] ?>" >
												<img src="<?php echo $datos['imagen'] ?>" class="img-circle" width="30" height="30">
												<?php echo $datos['fecha_creado'] ?>
											</a>
										</div>
										<div>
											<?php echo strip_tags($datos['mensaje']); ?>
										</div>
									</li>
									<?php endwhile; } ?>
								</ul>
								<form action="" method="post">
									<textarea class="form-control" placeholder="Encriba su mensaje aqu&iacute;" name="mensaje-enviado"></textarea><br>
									<button class="btn btn-info pull-right" type="submit" name="btn-mensaje">Enviar <span class="glyphicon glyphicon-send"></span>
									</button>
								</form>
							</div>
							<?php else: ?>								
								<h4 class="alert alert-info col-xs-12"><?php echo "Selecciona un usuario enviar un mensaje"; ?></h4>
							<?php endif ?>
						</div>						
				
			



			



	<!--div class="col-xs-4">
		
	<?php require_once("menuizquierdo.php"); ?>
	</div-->
	
		
	<script type="text/javascript">
		
		$(document).ready(function() {

   			var leftPos = $('#chat').scrollTop();
		    console.log(leftPos ); 

		    // $('#chat').click(function(){
		    // 	console.log($('#chat').prop("scrollHeight"));

		    // 	$("#chat").animate({
		    //     scrollTop: $('#chat').prop("scrollHeight")
		    // },1000);
		    // });
		    
		    /*
		    Mueve el scrol de la barra asia abajo.
		    en las versiones 1.7 y superiores de jquery 
		    se utiliza 'prop(propiedad)' en vez de la
		    propiedad scrollHeight de las versiones anteriores.
		    */
		    $("#chat").animate({
		        scrollTop: $('#chat').prop("scrollHeight")
		    },100);
		});
	</script>

</div>



<?php
	require_once("footer.php");
?>
	