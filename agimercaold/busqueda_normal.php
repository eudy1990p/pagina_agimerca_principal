<?php
	require_once("header.php");
	
	
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


	  	
	  
<div class="page-header">
	
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
						      <?php 
								if(isset($_GET["opcionesAvanzadas"]) ){    
										echo "Busqueda Avanzada"; 
								}else{
									echo "Busqueda Normal";
								}
									?>
						
					</h1>
</div>

<div class="row">
		<div class="col-xs-8">
		<?php	if(isset($_GET["opcionesAvanzadas"]) ){
			$getPais = $post->getPais();
			 require_once("form_busqueda_avanzada.php"); 
	
				if( isset($_POST) && ( isset($_POST["buscador_avanzado"]) ||  isset($_POST["relacion_producto_sector_id"]) ||  isset($_POST["relacion_sector_roll_id"]) ||  isset($_POST["categoria_id"]) ) ){
					
					require_once("vistas_post.php");
					$get = $post->getPostBusquedaAvanzada($_POST);
					$contador=0;
					while($res = mysqli_fetch_array($get)){
							allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"]);
							$contador++;
					}
				}
			}else{
					if(isset($_POST)){

						if(isset($_POST["busqueda_post"]) && ($_POST["busqueda_post"] != "")){
							//$post->setPost($_POST,$_FILES);

								require_once("vistas_post.php");

								$get = $post->getPost(" where p.post like '%".$_POST["busqueda_post"]."%' ");
								$contador=0;
								while($res = mysqli_fetch_array($get)){
									allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"],
									$res['id_user']//id del usuario que creo el post
									);
									$contador++;
								}
								//$img_usuario,$nombre_usuario,$post,$contador="1",$idPost="1",$post="",

						}

					}	
			}
			?>
			

	</div>

	<div class="col-xs-4">
		<?php if ( isset($_SESSION["id"]) ) { ?>
		<?php require_once("menuizquierdo.php"); ?>
		<?php } ?>
	</div>
		
</div>



<?php
	require_once("footer.php");
			
	
?>
	