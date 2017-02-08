<?php 

function   allpost($img_usuario,$nombre_usuario,$postCuerpo,$contador="1",$idPost="1",$post="",$imagen="img/Imagen_no_disponible.jpg",$id_user="1"){ ?>
<hr/>
<div class="row" style="background-color: rgba(232, 232, 232, 0.3);padding: 6px;">
	<div class="col-xs-2">
		<a href="publicaciones_perfil_usuario.php?user_id=<?php echo $id_user; ?>" ><img width="50" src="<?php echo $img_usuario; ?>" class="img-responsive img-circle" alt="Usuario" /></a>
	</div>
	<div class="col-xs-7"  valign="center">
		<stron><a href="publicaciones_perfil_usuario.php?user_id=<?php echo $id_user; ?>" ><?php echo $nombre_usuario; ?></a></stron>
	</div>
	
	<div class="col-xs-1"  valign="center">
		<button onclick="mostrarEditarPost('<?php echo $postCuerpo; ?>','<?php echo $idPost; ?>')" class="glyphicon glyphicon-pencil btn btn-default" ></button>
	</div>
	<div class="col-xs-2"  valign="center">
		<button onclick="mostarComentario('<?php echo $contador; ?>')" class="btn btn-default" >Comentar</button>
	</div>
	
	<?php if($imagen != "img/Imagen_no_disponible.jpg"){	?>
	<div class="col-xs-12" style="background-color: #fff;margin-top: 11px;">
		
		<img src="<?php echo $imagen; ?>" class="img-responsive img-rounded" alt="Imagen post" />
     </div>
	<?php	}	?>
	
	<?php if($postCuerpo != ""){?>
	<div class="col-xs-12" style="background-color: #fff;margin-top: 11px;">
		<?php echo $postCuerpo; ?>
	</div>
	<?php	}	?>
</div>
<?php 
	if(!empty($post)){
$resultComent = $post->getComentarioPost($idPost);	
while($resComent = mysqli_fetch_object($resultComent)){
?>
<ul class="media-list" style="    background-color: rgba(203, 212, 235, 0.23);
    padding-top: 6px;
    padding-left: 7px;    margin-bottom: 1px;">
  <li class="media">
    <div class="media-left">
      <a href="publicaciones_perfil_usuario.php?user_id=<?php echo $resComent->id_user; ?>" >
        <img width="50" class="media-object" src="<?php echo $resComent->img_perfil; ?>" alt="img usuario">
      </a>
    </div>
    <div class="media-body">
      
			<h5 class="media-heading">
				<div class="row">
					<div class="col-xs-9">
						<a href="publicaciones_perfil_usuario.php?user_id=<?php echo $resComent->id_user; ?>" >
						<?php echo $resComent->user; ?>
						</a>
					</div>
					<div class="col-xs-3">
						<a href="publicaciones_perfil_usuario.php?user_id=<?php echo $resComent->id_user; ?>" >
						<?php echo $resComent->fecha_creado; ?>
						</a>
					</div>
				</div>
				 
			</h5>
			
      <?php echo $resComent->comentario; ?>
    </div>
  </li>
</ul>
<?php 
		}
	}
?>


<div style="display:none;" id="comentario<?php echo $contador; ?>" class="row">
	<form method="post" action="" >
		<input type="hidden" name="accion" value="agregar_comentario"/>		
		<input type="hidden" name="id_post" value="<?php echo $idPost; ?>"/>

		

		<input type="hidden"  id="mostrar<?php echo $contador; ?>" value="0"/>
	<div  class="col-xs-12">
			<textarea name="post" class="form-control" rows="2"></textarea>
	</div>
	<div  class="col-xs-12">
			<button type="submit" class="btn btn-primary btn-lg btn-block">Comentar</button>
	</div>
	</form>
</div>
<?php } ?>


<script type="text/javascript">
	function mostarComentario(id){
		var mostrado = $("#mostrar"+id);
		if(mostrado.val() == 0){
			$("#comentario"+id).show(2000);
			mostrado.val(1);
		}else{
			mostrado.val(0);
			$("#comentario"+id).hide(2000);
		}
	}
	
	function mostrarEditarPost(cuerpo,idpost){
			//$("#post").val(cuerpo);
			agregarVariabeTextBox(cuerpo);
			$("#accion").val("editar_post");
			$("#idpost").val(idpost);
			$("#btpublicar").html("Editar publicaci&oacute;n");
			//$("#post").focus();
		$( "body" ).scrollTop( 0 );
	}
	
	function agregarVariabeTextBox(cuerpo){
   var ed = tinyMCE.get('post');
 		ed.setContent(cuerpo);
	}
</script>

