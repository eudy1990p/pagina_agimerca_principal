<?php
	require_once("header.php");
		$usuario_id = "1";
		if(isset($_GET["user_id"]) && ($_GET["user_id"] != "")){
            $usuario_id =$_GET["user_id"];
         }
?>
	  <!-- Nelson puso la mano aqui. -->
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Perfil"; ?> 

                 <!-- Si el usuario seleccionado es el mismo actual entonces
                 no se muestra el boton dejar mensaje. ya que es ilogico dejarse un 
                 mensje a si mismo 
                 -->
   				<?php if(isset($_SESSION['id'])) { if ($_GET["user_id"] != $_SESSION['id']){ ?>
   					<a class="btn btn-info" href="mensajeria.php?mensaje-dejado=<?php echo $_GET["user_id"]; ?>">Dejar mensaje</a>	
                <?php } } ?>
               	
</h1>
</div>

<div class="row">
		<div class="col-xs-8">
	

				<!-- Contextual button for informational alert messages -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li title="Vera todas las publicaciones del usuario que está visitando" role="presentation" <?php if( !isset($_POST["paso"])  ){ ?> class="active" <?php } ?> ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Publicaciones</a></li>
				<li title="Vera todas las imagenes del usuario que está visitando" role="presentation"  <?php if(  (isset($_POST["paso"]) && ( ($_POST["paso"] == "1" ) || ($_POST["paso"] == "2" ) )  ) ){ ?> class="active" <?php } ?> >
                    <a onclick="" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Galeria</a>
                </li>
				<li title="Vera todas los videos del usuario que está visitando" role="presentation" <?php if( isset($_POST["paso"]) && ( ($_POST["paso"] == "3" ) || ($_POST["paso"] == "4" ) ) ){ ?> class="active" <?php } ?> ><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Videos</a></li>
                
                
                <li title="Vera todas la información del usuario que está visitando" role="infouser" ><a href="#infouser" aria-controls="infouser" role="tab" data-toggle="tab">Información de contacto</a></li>
				
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