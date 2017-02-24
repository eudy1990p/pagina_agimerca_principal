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

?>


<!-- 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type='text/javascript' src="js/jspdf.debug.js"></script>  	 -->
	  <!--comentario  -->
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
select *,
(select count(visto) as novisto from mensajes_privados where visto = false and para_user_id=2 and user_id_creado=amigos) as novistos
from (select para_user_id  as amigos from mensajes_privados where user_id_creado=$id_usuario group by amigos
union
select user_id_creado as amigos from mensajes_privados 
where para_user_id  =$id_usuario group by user_id_creado) as tabla
join usuarios u on u.id=tabla.amigos
;       
										 ";
														//echo $sql;
						                $resultado= mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
						                //echo "consulta $sql";
						                while ($datos = mysqli_fetch_array($resultado)):
									?>
									<li class="list-group-item">
										<!-- <a href="mensajeria.php?hablante=juan">hola</a> -->
										<form action="" method="post">
											
											<a href="mensajeria.php?amigo-actual=<?php echo $datos['amigos'] ?>">
											<img src="<?php echo $datos['img_perfil'] ?>" class="img-circle" width="30" height="30">
											<?php echo $datos['user'] ?>
												
											</a>

											<!-- Si los mensajes no vistos son mayor que cero los muestra -->
											<?php if ($datos['novistos']>0): ?>
												<span class="badge"><?php echo $datos['novistos'] ?></span>	
											<?php endif ?>
											
										
										</form>
										
										
									</li>

								<?php endwhile; ?>
								
								</ul>
						</div>
						
						
						<div class="panel col-xs-7">
							<h4>mensajes</h4>
							<!-- cambio  -->
							<?php //echo 	"mentaje: ".$_GET['mensaje-dejado']; ?>
							<?php if (isset($_GET['amigo-actual']) or isset($_GET['mensaje-dejado'])): ?>
							<div>
								<ul id="chat" class="list-group" style="height: 300px;overflow-y: scroll;">
									<?php 

										$amigo_actual= "nada";

										if(isset($_GET['amigo-actual'])){
											$amigo_actual=$_GET['amigo-actual'];
										}else{
											$amigo_actual=$_GET['mensaje-dejado'];
										}

										if(isset($_POST['btn-mensaje'])){


											$u=$_SESSION['id'];//usuario actual

											$mensaje_enviado=$_POST['mensaje-enviado'];
											$mensaje_enviado = strip_tags($mensaje_enviado);

											$sql = "insert into mensajes_privados values(default,$u,null,null,now(),'$mensaje_enviado',$amigo_actual,false)";
											mysqli_query($c->getContect(),$sql)or die(mysqli_error($c->getContect()));
										}

										#------------
										//Se marcan como no vistos los mensajes del usuario seleccionado
										$sql = 
										"
										update mensajes_privados set visto = true where user_id_creado=$amigo_actual
										and para_user_id=".$_SESSION['id'];
										;
										mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));
										#------------


										$u=$_SESSION['id'];//usuario actual
										$r=$amigo_actual;//amigo con el que se habla actualmente


										$sql = "
										select mensajes_privados.*,usuarios.img_perfil as imagen, usuarios.id
										from mensajes_privados join usuarios on mensajes_privados.user_id_creado=usuarios.id 
										where user_id_creado in ($u,$r) order by fecha_creado";
									

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
									<?php endwhile;  ?>
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
	