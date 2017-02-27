<?php 


	/**
	* Clase encargada de controlar la mensajeria con ajax de la aplicacion
	*/
	class MensajeriaAjax
	{
	

		public static function saludar(){
			echo "HOla como estas";
		}


		public static function cargarMensajes($u,$r){
			$c = new Conexion();

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
			
			<?php endwhile;  

		}

		public static function guardarMensaje($creado,$para,$mensaje){

			$c = new Conexion();


			$mensaje = strip_tags($mensaje);
			$sql = "insert into mensajes_privados values(default,$creado,null,null,now(),'$mensaje',$para,false)";
			mysqli_query($c->getContect(),$sql)or die(mysqli_error($c->getContect()));


		}


	}


?>