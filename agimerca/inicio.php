<?php
    $tituloAgimerca="Red Social Inicio";
	require_once("header.php");
	
	 if(isset($_POST)){
	 	if(isset($_POST["accion"]) && ($_POST["accion"] == "agregar_post")){
	 		$post->setPost($_POST,$_FILES);
	 	}
	 	if(isset($_POST["accion"]) && ($_POST["accion"] == "agregar_comentario")){
	 		$post->setComentarioPost($_POST["post"],$_POST["id_post"],$_SESSION["id"]);
	 		//$post->setPost($_POST,$_FILES);
	 	}
	 }
$getPais = $post->getPais();
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


	  
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-home" aria-hidden="true"></span> 
                  <?php echo $label->MenuFactura; ?></h1>
</div>
<div class="row">
		<div class="col-xs-8">
			<?php 
                require_once("vista_form_agregar_publicaciones.php");	

				require_once("vistas_post.php");
				
				$get = $post->getPost();
				$contador=0;
				while($res = mysqli_fetch_array($get)){
					//allpost($res["img_url"],$res["user"],$res["post"],$contador,$res["id"],$post);
					allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"]);
					$contador++;
				}
				//$img_usuario,$nombre_usuario,$post,$contador="1",$idPost="1",$post="",
			?>
			

	</div>

	<div class="col-xs-4">
		
		<?php require_once("menuizquierdo.php"); ?>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	