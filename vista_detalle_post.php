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
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Detalle de la publicación"; ?></h1>
</div>

<div class="row">
		<div class="col-xs-8">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" id="accion" name="accion" value="agregar_post"/>
				<input type="hidden" name="add" value=""/>
				<input type="hidden" name="idpost" id="idpost" value=""/>

			</form>
			
			
			<?php 
				
                if(isset($_SESSION["id"])){
                    require_once("vistas_post.php");

                    $get = $post->getPost("where p.id = '".$_GET["id"]."' ");
                    $contador=0;
                    if($res = mysqli_fetch_array($get)){
                        allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"],$res["id_user"],false);
                        $contador++;
                    }
                }else{
                    ?>
            <h3><span class="glyphicon glyphicon-info-sign"></span> Necesita estar logueado para poder ver el detalle de la publicación</h3>
            <h3> <a href="index.php" ><span class="glyphicon glyphicon-info-sign"></span> Para entrar a la red social, clic aquí </a></h3>
            <h3> <a href="registro.php" ><span class="glyphicon glyphicon-info-sign"></span> Si aun no eres usuario de nuestra red social clic aquí para unirte </a></h3>
            <?php
                }
            
            ?>
			
	</div>

	<!--div class="col-xs-4">
		
		<?php require_once("menuizquierdo.php"); ?>
	</div-->
	
	
</div>



<?php
	require_once("footer.php");
?>
	