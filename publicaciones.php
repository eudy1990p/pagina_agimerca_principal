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
                  <?php echo "Mi perfil"; ?></h1>
    <?php $ar = $_SERVER["SCRIPT_NAME"];  $exp = explode("/",$ar);
    //print_r($exp);
    //echo $exp[(count($exp) - 1)];
    ?>
</div>

<div class="row">
		<div class="col-xs-8">
			<form action="" method="post" id="formPublicaciones" enctype="multipart/form-data">
				<input type="hidden" id="accion" name="accion" value="agregar_post"/>
				<input type="hidden" name="add" value=""/>
				<input type="hidden" name="idpost" id="idpost" value=""/>


				<div class="row">
					<div title="Seleccione las siguientes opciones para que pueda tener mejor resultado con el producto" class="col-xs-12">
						<?php //require_once("vista_select_categorias_sub_subsub.php"); ?>
					</div>
					<div class="col-xs-12">
						<?php require_once("vista_agregar_post.php"); ?>
					</div>
					<div title="Inserte una imagen desde su computador relacionada al producto" class="col-xs-6"><br/>
						Imagen <input type="file" id="imgProducto" name="imgProducto" />
					</div>				
					<div class="col-xs-6 text-right"><br/>
							<a title="Clic para cancelar la publicación" href="<?php echo $exp[(count($exp) - 1)]; ?>" class="btn btn-warning">Cancelar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
						<button title="Clic para guardar su publicación" id="btpublicar" type="submit" class="btn btn-success">Publicar</button>
					</div>

				</div>
			</form>
			
			
			<?php 
				
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
	