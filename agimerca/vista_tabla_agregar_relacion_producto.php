<?php 
	$resultSelectCategoriaSubCategorio = $categoria->getRelacionSubCateriaSubSubCategoria($_GET["idcategoria"]); 
	
	$accion = base64_encode("agregar_sub_sub_categoria");
	$accionEliminar =$_GET["accion"];
	$id_categoriaFiltrarEliminar = $_GET["idcategoria"];
	require_once("vista_checkbox_producto.php");
?>
<hr/>
<table  class="table table-bordered">
	<tr>
		
		<th>Nombre Producto (Sub Sub Categoria)</th>		
		<th>Opciones</th>
	</tr>

	
	<?php
	$resultSelectCategoriaSubCategorio->field_seek(0);
		while($resCategoria = mysqli_fetch_object($resultSelectCategoriaSubCategorio)){
	?>
	<tr>
		<td><?php echo $resCategoria->sub_sub_categoria_name; ?></td>		
		<td>
			<?php 
				$idcategoria= base64_encode($resCategoria->id_relacion); 
			?>
			
			<a onclick="eliminarSector('<?php echo $idcategoria; ?>','<?php echo $id_categoriaFiltrarEliminar; ?>','<?php echo $accionEliminar; ?>');"  href="javascript:void(0);">Eliminar Relación</a>
		</td>

	</tr>
	<?php } ?>
	
</table>


<script type="text/javascript">
	function agregarCategoria(id_categoria,accion){
				window.location="relaciones_categorias.php?accion="+accion+"&idcategoria="+id_categoria;
	}
	
	function eliminarSector(id_relacion,id_categoria,accion){
		var respuesta  = confirm("Desea eliminar este producto");
		if(respuesta){
				window.location="relaciones_categorias.php?accion="+accion+"&idcategoria="+id_categoria+"&id="+id_relacion+"&eliminarRelacionProducto=si";
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