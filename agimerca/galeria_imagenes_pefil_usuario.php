
<div class="row">
		<div class="col-xs-12">

			<div class="row">
				<h1>Albunes creados</h1>
				
				<!-- Aqui va codigo php -->
				
				<?php 
					$c = new Conexion();
					$contador = 0;
					$sql = "select * from carpeta_gallerias where user_id_creado='".$usuario_id."' and estado ='activo'";
                    
					$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

					while ($datos = mysqli_fetch_array($resultado)) {

						mostarGaleria($datos,$contador);
						$contador++;
					}
				?>

			</div>
	</div>



	
	
</div>
<?php function mostarGaleria($datos,$contador){ ?>
<form id="galeria<?php echo $contador; ?>" action='' method='post'>
	<input type="hidden" name='id_album'  value='<?php echo $datos["id"]; ?>' />
	<input type="hidden" name="paso"  value="2" >
								<div class='col-xs-4' >
									<div onclick="verDetalle('galeria<?php echo $contador; ?>');" style="
       border: solid rgba(51, 153, 255, 0.17) 1px;
    background-color: rgba(213, 213, 213, 0.26);
    padding: 3%; margin-top: 5%;
    padding-top: 1%;
		cursor: pointer;
"> 
									<h3><?php echo $datos["nombre"]; ?></h3>
									<button class='btn btn-link btn-lg' name='id_album' type='submit' value='<?php echo $datos["id"]; ?>'>Click para entrar</button>
									<br/>
									<span>fecha publicacion: <?php echo $datos["fecha_creado"]; ?></span>
								</div>
							</div>
</form>
<?php } ?>

<script type="text/javascript" >
	function verDetalle(id){
		console.info("prueba"+id);
		$("#"+id).submit();
	}
</script>