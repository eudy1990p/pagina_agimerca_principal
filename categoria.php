<?php
	require_once("header.php");
	
	if(isset($_POST)){
		if(isset($_POST["accion"]) && ($_POST["accion"] == "categoria")){
			$categoria->addCategoria($_POST);
		}
		if(isset($_POST["accion"]) && ($_POST["accion"] == "editar_categoria")){
			$categoria->editCategoria($_POST);
		}
		if( isset($_GET["id"]) ){
			$categoria->deleteCategoria($_GET);
		}
	}
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

<script type='text/javascript' src="js/jspdf.debug.js"></script>

	  	
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo "Roll (Categoria)"; ?></h1>
</div>

<div class="row">
		<div class="col-xs-8">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" id="accion" name="accion" value="categoria"/>
			 <input type="hidden" name="idCategoria" id="idCategoria" value=""/>


				<div class="row">

					<div class="col-xs-12">
						Roll (Categoria)<br/>
						<input type="text" id="categoria" name="categoria" placeholder="Nombre de categoria" class="form-control" >
					</div>
					<div class="col-xs-12 text-right"><br/>
						<button id="btCategoria" type="submit" class="btn btn-success">Agregar</button>
					</div>

				</div>
			</form>
			
			<div class="row">

					<div class="col-xs-12"><br/>
							<?php require_once("vista_tabla_categoria.php"); ?>
					</div>
			</div>

	</div>

	<div class="col-xs-4">
	<?php require_once("menuizquierdo.php"); ?>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	