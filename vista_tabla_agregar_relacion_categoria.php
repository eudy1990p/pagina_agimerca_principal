<?php 

	$result = $categoria->getCategoria(); 
	$accion = base64_encode("agregar_sub_categoria");
?>
<table  class="table table-bordered">
	<tr>
		<th>Nombre Categoria</th>		
		<th>Opciones</th>
	</tr>

	
	<?php
		while($resCategoria = mysqli_fetch_object($result)){
	?>
	<tr>
		
		<td><?php echo $resCategoria->nombre_categoria; ?></td>	
		<td>
			<!--a onclick="mostrarEditarCategoria('<?php echo $resCategoria->nombre_categoria; ?>',<?php echo $resCategoria->id; ?>);" href="javascript:void(0);">
				Editar
			</a><br-->
			<?php 
				$idcategoria= base64_encode($resCategoria->id); 
			?>
			<a onclick="agregarCategoria('<?php echo $idcategoria; ?>','<?php echo $accion; ?>');" href="javascript:void(0);">
				Agregar Sector (Sub Categoria)
			</a>
		</td>
	</tr>
	<?php } ?>
	
</table>


<script type="text/javascript">
	
	function agregarCategoria(id_categoria,accion){
				window.location="relaciones_categorias.php?accion="+accion+"&idcategoria="+id_categoria;
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