<?php
	require_once("header.php");
	
	if(isset($_POST)){
		if(isset($_POST["accion"]) && ($_POST["accion"] == "agregar_post")){
			$post->setPost($_POST,$_FILES);
		}
		if(isset($_POST["accion"]) && ($_POST["accion"] == "agregar_comentario")){
			$post->setComentarioPost($_POST["post"],$_POST["id_post"],$_SESSION["id"]);
			//$post->setPost($_POST,$_FILES);
		}
		if(isset($_POST["accion"]) && ($_POST["accion"] == "editar_post")){
			$post->editProducto($_POST,$_FILES);
			//$post->setPost($_POST,$_FILES);
		}
	}
$getPais = $post->getPais();
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

	  	
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                  <?php echo "Mi perfil"; ?></h1>
    <?php $ar = $_SERVER["SCRIPT_NAME"];  $exp = explode("/",$ar);
    //print_r($exp);
    //echo $exp[(count($exp) - 1)];
    ?>
</div>

<div class="row">
		<div class="col-xs-8">
			
			
			<?php 
			     require_once("vista_form_agregar_publicaciones.php");	
				require_once("vistas_post_edit.php");
				
				$get = $post->getPost("where p.user_id_creado = '".$_SESSION["id"]."' ");
				$contador=0;
				while($res = mysqli_fetch_array($get)){
					//allpost($res["img_url"],$res["user"],$res["post"],$contador,$res["id"],$post);
					allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"],$res["id_user"]);
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
	