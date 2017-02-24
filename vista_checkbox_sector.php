<?php 

		$result1 = $categoria->getSector();
		
		$selectArray= array();
		$resultSelectCategoriaSubCategorio;
		while($resC = mysqli_fetch_object($resultSelectCategoriaSubCategorio)){
			$selectArray[] = $resC->sub_categoria_name;
		}
		mysqli_data_seek($resultSelectCategoriaSubCategorio,0);
		
?>

<form action="" method="post">
	<div class="panel panel-default">
		<div class="panel-heading">Seleccionar sectores (Sub Categoria)</div>
		<div class="panel-body">



					 <input type="hidden" name="realizar" value="agregar_relacion_sub_categoria" />
					 <input type="hidden" name="accion" value="<?php echo $_GET["accion"]; ?>" />
					 <input type="hidden" name="idcategoria" value="<?php echo $_GET["idcategoria"]; ?>" />

						<?php
							while($resCategoria = mysqli_fetch_object($result1)){
								if(!in_array($resCategoria->nombre_categoria,$selectArray)){
						?>
								
									<label>
										<input type="checkbox" name="sector[]" value="<?php echo $resCategoria->id; ?>"> <?php echo $resCategoria->nombre_categoria; ?>
									</label>
												
						<?php 
								}
							} 
						?>



		</div>
		<div class="panel-footer text-right"><button type="submit" class="btn btn-success">Agregar</button></div>
	</div>
</form>


	
	
	


<script type="text/javascript">
	
	function eliminarCategoria(id_categoria){
		var respuesta  = confirm("Desea eliminar este sector");
		if(respuesta){
				window.location="sectores.php?id="+id_categoria;
		}
	}
	
	function mostrarEditarCategoria(cuerpo,idpost){
			//$("#post").val(cuerpo);
			agregarVariabeTextBox(cuerpo);
			$("#accion").val("editar_categoria");
			$("#idCategoria").val(idpost);
			$("#btCategoria").html("Editar");
			//$("#post").focus();
		$( "body" ).scrollTop( 0 );
	}
	
	function agregarVariabeTextBox(cuerpo){
  		$("#categoria").val(cuerpo);
	}
</script>