<?php $result = $categoria->getProducto(); ?>
<table  class="table table-bordered">
	<tr>
		<th>Opciones</th>
		<th>Nombre Producto (Sub Sub categoria)</th>		
		
	</tr>

	
	<?php
		while($resCategoria = mysqli_fetch_object($result)){
	?>
	<tr>
		<td>
			<a onclick="mostrarEditarCategoria('<?php echo $resCategoria->nombre_categoria; ?>',<?php echo $resCategoria->id; ?>);" href="javascript:void(0);">
				Editar
			</a><br/>
			<a onclick="eliminarCategoria(<?php echo $resCategoria->id; ?>);" href="javascript:void(0);">
				eliminar
			</a>
		</td>
		<td><?php echo $resCategoria->nombre_categoria; ?></td>		
	</tr>
	<?php } ?>
	
</table>


<script type="text/javascript">
	
	function eliminarCategoria(id_categoria){
		var respuesta  = confirm("Desea eliminar este producto");
		if(respuesta){
				window.location="productos.php?id="+id_categoria;
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