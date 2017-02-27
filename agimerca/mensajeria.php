<?php
	require_once("class/class_usuario.php");
	require_once("header.php");
	require_once("class/class_conexion.php");
	if(isset($_POST)){
		if(isset($_POST["agregar_post"])){
			
		}
	}

	$ajax_put=[];

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
					
						<div class="col-xs-12 col-sm-5 " >
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
(select count(visto) as novisto from mensajes_privados where visto = false and para_user_id=$id_usuario and user_id_creado=amigos) as novistos
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
										<?php if (mysqli_num_rows($resultado)<=0 ): ?>
											<p class="alert alert-info">Aun no tienes usuarios para conversar</p>
										<?php endif ?>
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
						
						
						<div class="panel col-xs-12 col-sm-7 ">
							<h4>mensajes</h4>
							<!-- cambio  -->
							<?php //echo 	"mentaje: ".$_GET['mensaje-dejado']; ?>
							<?php if (isset($_GET['amigo-actual']) or isset($_GET['mensaje-dejado'])): ?>
							<div>
								<div id="chat" >
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

										echo 
										"
											<form id='datos_ajax'>
												<input type='hidden' name='id_usuario' value='$u'>
												<input type='hidden' name='id_amigo'   value='$amigo_actual'>
												<input type='hidden' name='get'   value='consultar mensaje'>
											</form>
										";


										?> 
										<ul id="chat-contenido" class="list-group" style="height: 300px;overflow-y: scroll;">
											<?php MensajeriaAjax::cargarMensajes($u,$r); ?>	
										</ul>
										
								</div>
	
								<form id="put_ajax">
									<textarea 
										class="form-control" 
										placeholder="Encriba su mensaje aqu&iacute;"
										name="mensaje-enviado"
										id="textarea-mensaje"
										required="required"
										title="Escribe aqui el mensaje que quieres enviar">									
									</textarea><br>


									<input type='hidden' name='usuario' value='<?php echo $_SESSION['id'] ?>'>
									<input type='hidden' name='amigo'   value='<?php echo $amigo_actual; ?>'>
									<input type='hidden' name='mensaje' value='<?php echo $amigo_actual; ?>'>
									<input type='hidden' name='put'   value='poner mensaje'>

									
									<button class="btn btn-info pull-right" type="submit" id="btn-mensaje" name="btn-mensaje"
									title="pulsa el boton para enviar un mensaje">Enviar 
									<span class="glyphicon glyphicon-send"></span>
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

		// Valida que los mensaje no esten vacios
		$('#btn-mensaje').click(function(e){
			if($("#textarea-mensaje").val().trim()===''){
				alert("campo vacio");
				e.preventDefault();
			}
			else{


				console.log($("#put_ajax").serialize());
				$.ajax({
					url: "class/Controladores/Gestor.php",
					data: $("#put_ajax").serialize(),
					type: "POST",
					success:function(){
						console.log("mensaje enviado");
						$("#chat").animate({scrollTop: $('#chat').prop("scrollHeight")},100);
					},
					error:function(error,xhr,o){
						console.log(error.responseText);
					}

				});

				e.preventDefault();
			}
			$("#chat").animate({scrollTop: $('#chat').prop("scrollHeight")},100);
			//e.preventDefault();
		});

		setInterval(function(){
			

			//$('#chat').load('class/Controladores/Gestor.php',{});

			//console.log("datos: "+$('#datos_ajax').serialize() )

			$.ajax({
				url: "class/Controladores/Gestor.php",
				data: $('#datos_ajax').serialize() ,
				type: "POST",
				success:function(respuesta){
					//alert(respuesta);
					$('#chat #chat-contenido').html(respuesta);

			

				},
				error:function(error,xhr,o){
					console.log(error.responseText);
				}
			});



		},1000);


	</script>

</div>



<?php
	require_once("footer.php");
?>
	