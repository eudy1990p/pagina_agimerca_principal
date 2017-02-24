<?php 

		$resultCategoriaBusqueda = $categoria->getCategoria();
?>
<select title="Seleccione un mercado " name="categoria_id" id="categoria_id" class=" select2buscador">
			<option  value=""></option>
				<?php
				 
					while($resCategoriaBusqueda = mysqli_fetch_object($resultCategoriaBusqueda)){
				?>
						<option value="<?php echo $resCategoriaBusqueda->id; ?>"><?php echo $resCategoriaBusqueda->nombre_categoria; ?></option>

				<?php 
					} 
			?>
			
		</select>