<?php
	require_once("header.php");
		$usuario_id = "1";
		if(isset($_GET["user_id"]) && ($_GET["user_id"] != "")){
            $usuario_id =$_GET["user_id"];
            //$usuario_id =base64_decode($_GET["user_id"]);
            //die("user ".$usuario_id);
		}

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
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

	  	
	  <!-- Nelson puso la mano aqui. -->
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Perfil"; ?> 

                <a class="btn btn-info" href="mensajeria.php?mensaje_dejado=<?php echo $_GET["user_id"]?>">Dejar mensaje</a>

</h1>
</div>

<div class="row">
		<div class="col-xs-8">
			<!--<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" id="accion" name="accion" value="agregar_post"/>
				<input type="hidden" name="add" value=""/>
				<input type="hidden" name="idpost" id="idpost" value=""/>


				<div class="row">
					<div class="col-xs-12">
						<?php require_once("vista_select_categorias_sub_subsub.php"); ?>
					</div>
					<div class="col-xs-12">
						<textarea id="post" name="post" class="form-control" rows="5"></textarea>
					</div>
					<div class="col-xs-6"><br/>
						Imagen <input type="file" name="imgProducto" />
					</div>				
					<div class="col-xs-6 text-right"><br/>
						<button id="btpublicar" type="submit" class="btn btn-success">Publicar</button>
					</div>

				</div>
			</form>
			-->
			
			
			

			<div>
				<!-- Contextual button for informational alert messages -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" <?php if( !isset($_POST["paso"])  ){ ?> class="active" <?php } ?> ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Publicaciones</a></li>
				<li role="presentation"  <?php if(  (isset($_POST["paso"]) && ( ($_POST["paso"] == "1" ) || ($_POST["paso"] == "2" ) )  ) ){ ?> class="active" <?php } ?> >
                    <a onclick="" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Galeria</a>
                </li>
				<li role="presentation" <?php if( isset($_POST["paso"]) && ( ($_POST["paso"] == "3" ) || ($_POST["paso"] == "4" ) ) ){ ?> class="active" <?php } ?> ><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Videos</a></li>
                
                
                <li role="infouser" ><a href="#infouser" aria-controls="infouser" role="tab" data-toggle="tab">Información de contacto</a></li>
				
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				
				<div role="tabpanel" class="tab-pane <?php if( !isset($_POST["paso"]) ){ ?> active <?php } ?> " id="home">
				
					<?php 

								require_once("vistas_post.php");
				//							require_once("vistas_post_edit.php");
							//vistas_post.php

								$get = $post->getPost("where user_id_creado = '".$usuario_id."' ");
								$contador=0;
								while($res = mysqli_fetch_array($get)){
									//allpost($res["img_url"],$res["user"],$res["post"],$contador,$res["id"],$post);
									allpost($res["img_perfil"],$res["user"],$res["post"],$contador,$res["id"],$post,$res["img_url"]);
									$contador++;
								}
								//$img_usuario,$nombre_usuario,$post,$contador="1",$idPost="1",$post="",
							?>
					
				</div>
				<div role="tabpanel" class="tab-pane  <?php if(    (isset($_POST["paso"]) && ( ($_POST["paso"] == "1" ) || ($_POST["paso"] == "2" ) )) ){ ?> active <?php } ?>" id="profile">
						
						<?php //ver_galeria_perfil_usuario.php
                                
								if(isset($_POST["paso"]) && ( $_POST["paso"] == "2" )){
									
                                    require_once("ver_galeria_perfil_usuario.php"); 
                                    
								}else if(isset($_POST["paso"]) &&  ($_POST["paso"] == "1" )){                                   
									require_once("galeria_imagenes_pefil_usuario.php");
								}else{
									
                                    require_once("galeria_imagenes_pefil_usuario.php");	
                                    
								}
							?>		
				
				</div>
				<div role="tabpanel" class="tab-pane <?php if( isset($_POST["paso"]) && ( ($_POST["paso"] == "3" ) || ($_POST["paso"] == "4" ) ) ){ ?> active <?php } ?>" id="messages">
					
				
					<?php //ver_galeria_perfil_usuario.php
								if(isset($_POST["paso"]) && ( $_POST["paso"] == "4" )){
									require_once("ver_videos_perfil_usuario.php"); 
								}else if(isset($_POST["paso"]) &&  ($_POST["paso"] == "3" )){
									require_once("galeria_videos_pefil_usuario.php");
								}else{
									require_once("galeria_videos_pefil_usuario.php");	
								}
							?>	
					
				</div>
				
                <div role="tabpanel" class="tab-pane" id="infouser">
					<?php 
					   require_once("ver_info_perfil_usuario.php");
					?>
				</div>
			</div>

		</div>
			
	</div>

	<div class="col-xs-4">
		
		<?php //require_once("menuizquierdo.php"); ?>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
<script type="application/javascript">
        function pasonuevo(){
            window.location = "";
        }
</script>	