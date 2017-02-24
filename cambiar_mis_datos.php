<?php
	require_once("header.php");
    
	if(isset($_POST)){
		if(isset($_POST["accion"]) && ($_POST["accion"] == "cambiar_datos")){
			$usuario->editUsuarioExtra($_POST,$_FILES);
		}
		
	}
$array =$usuario->getDatoUserId($_SESSION["id"]);
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

<script type='text/javascript' src="js/jspdf.debug.js"></script>

	  	
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Cambiar mis datos"; ?></h1>
</div>

<div class="row">
		<div class="col-xs-8">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="accion" value="cambiar_datos"/>
                <input type="hidden" name="img_p" value="<?php echo $array["img_perfil"]; ?>"/>

				<div class="row">

					<div class="col-xs-12" title="">
						Imagen de perfil<br/>
						<input type="file" id="ImgPerfil" name="ImgPerfil" placeholder="" class="form-control" >
					</div>
                    <div class="col-xs-12" title="Teléfono para que se puedan contactar">
						Teléfono<br/>
						<input value="<?php echo $array["telefono"]; ?>" type="text" name="telefono" placeholder="809-777-7777,892-788-2419" class="form-control" >
					</div>
                    <div class="col-xs-12" title="Email para que se puedan contactar">
						Email<br/>
						<input value="<?php echo $array["correo"]; ?>" type="text" name="email" placeholder="Email" class="form-control" >
					</div>
                    <div class="col-xs-12" title="Información sobre ti mismo ">
						Sobre mi<br/>
						<input type="text" value="<?php echo $array["descripcion"]; ?>" name="sobre_mi" placeholder="sobre_mi" class="form-control" >
					</div>
                    <div class="col-xs-12" title="Sugerencia este video deberia ser informativo para mostrar sus productos">
						Url video informativo desde YOUTUBE<br/>
						<input value="<?php echo $array["embed_video"]; ?>" type="text" name="url_video" placeholder="http://youtube.com" class="form-control" >
					</div>
					</div>				
					<div class="col-xs-12 text-right"><br/>
						<button type="submit" class="btn btn-success">Cambiar</button>
					</div>

				
			</form>
			
			
	
			

	</div>

	<div class="col-xs-4">
	<?php require_once("menuizquierdo.php"); ?>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
<script type="text/javascript" >
    function colocarImagen(){
        var img = $("#img_perfil").val();
        alert(img);
        $("#imagen_perfil").attr("src",""+img);
    }
</script>	