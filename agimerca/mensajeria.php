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
		        	Galeria
		        	<!-- Esto es una variable generica que eudy utilizo.
		        		Comentado por nelson. -->
	                <!-- <?php echo $label->MenuFactura; ?> -->
	            </h1>
	</div>

	<div class="row">
		<div class="col-xs-8">

			<div class="row">
				<h1>Mensajeria</h1>
			
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2>Deposita los mensajes</h2>
					</div>
					
					<div class="panel-body">
						<div class="panel col-xs-3" style="">
							<h4 >usuarios</h4>
							<div class="panel-body">
								<ul class="list-group">

									<?php

										$c = new Conexion();

						                $id_usuario = $_SESSION['id'];


						                //Selecciona los usuario a los que se le an enviado mensajes
						                //y a los que nos an enviado.
						                $sql =
						                "
						                select mensajes_privados.*,usuarios.user,usuarios.id as user_id
						                from mensajes_privados join usuarios 
										on mensajes_privados.user_id_creado=usuarios.id
										where para_user_id=$id_usuario or user_id_creado=$id_usuario group by user_id_creado
						                ";

						                $resultado= mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

						                while ($datos = mysqli_fetch_array($resultado)):
									?>
									<li class="list-group-item">
										<form action="" method="post">
											<button class="btn btn-link" type="submit" name="usuario-amigo" value="<?php echo $datos['user_id'] ?>">
											<!-- <img src="img_perfil/1_1_recurso.png" class="img-circle" width="30" height="30"> -->

											<?php echo $datos['user'] ?>
											
											</button>
										</form>
									</li>

								<?php endwhile; ?>
								
								</ul>

							</div>
						</div>
						<div class="panel col-xs-9">
							<h4>mensajes</h4>
							<div>
								<ul id="chat" class="list-group" style="height: 300px;overflow-y: scroll;">
									<?php 
										if(isset($_POST['btn-mensaje'])){
											
											$r=$_SESSION['hablante-actual'];//remitente
											$u=$_SESSION['id'];//usuario actual

											if(isset($_GET['mensaje_dejado'])){
												$r=$_GET['mensaje_dejado'];
											}


											$m=$_POST['mensaje-enviado'];//mensaje
										$sql = "insert into mensajes_privados values(default,$u,null,null,now(),'$m',$r,false)";

											mysqli_query($c->getContect(),$sql)or die(mysqli_error($c->getContect()));
										}

										if(isset($_POST['usuario-amigo']) or isset($_POST['btn-mensaje'])){
											$r=$_SESSION['hablante-actual'];//remitente
											$u=$_SESSION['id'];//usuario actual

											if(isset($_GET['mensaje_dejado'])){
												$r=$_GET['mensaje_dejado'];
											}


											$sql = 
											"
											select mensajes_privados.*,usuarios.img_perfil as imagen
											from mensajes_privados join usuarios 
											on mensajes_privados.user_id_creado=usuarios.id
											where user_id_creado in (".$u.",".$r.") and para_user_id in (".$u.",".$r.")
											";

											$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
											while ($datos = mysqli_fetch_array($resultado)):
										?>
									<li class="list-group-item bg-info" style="margin-bottom: 2px;">
										<div class="panel">
											<img src="<?php echo $datos['imagen'] ?>" class="img-circle" width="30" height="30">
											<?php echo $datos['fecha_creado'] ?>
										</div>
										<div>
											<?php echo $datos['mensaje']; ?>
										</div>
									</li>
									<?php endwhile; } ?>
								</ul>
								<form action="" method="post">
									<textarea class="form-control" name="mensaje-enviado"></textarea><br>
									<button class="btn btn-info pull-right" type="submit" name="btn-mensaje">Enviar <span class="glyphicon glyphicon-send"></span>
									</button>
								</form>
							</div>
						</div>						
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
							


					</div>
				</div>
			</aside>
	</div>
	
		
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
	