<div class="row">
	<form action="" method="post">

			<div class="col-xs-12">
					<?php require_once("vista_select_categorias_sub_subsub.php"); ?>
			</div>

			<div class="col-xs-12">
					<input id="textbuscador_avanzado" value="<?php if( isset($_GET["textbuscador_avanzado"]) ){ echo $_GET["textbuscador_avanzado"]; } ?>" name="buscador_avanzado" type="text" class="form-control" placeholder="Post a buscar">	
			</div>
		
		
		
		
		<div  class="col-xs-12 form-group">
			<br/>
      <input type="text" class="form-control" name="caracteristica" placeholder="Caracteristicas">
	  </div>
	
	<div  class="col-xs-12 form-group">

		<select  class="form-control" name="pais" placeholder="Seleccione Pais de la Ubicación del producto">
			<option value="">Seleccione Pais de la Ubicación del producto</option>
			<?php 	 
		
				while($resPais = mysqli_fetch_array($getPais)){
					//allpost($res["img_url"],$res["user"],$res["post"],$contador,$res["id"],$post);
			?>
			
						<option value="<?php echo $resPais["id"]; ?>"><?php echo utf8_encode($resPais["nombre"]); ?></option>

			<?php		
				}
				//$img_usuario,$nombre_usuario,$post,$contador="1",$idPost="1",$post="",
			?>
			
			
		</select>
	</div>
	<br/>
	<div  class="col-xs-12 form-group">
      <input type="text" class="form-control" name="provincia" placeholder="Provincia o Estado Ubicación del producto">
	  </div>
	<br/>
	<div  class="col-xs-12 form-group">
      <input type="text" class="form-control" name="localidad" placeholder="Ubicación del producto">
	  </div>
	<br/>
	<div  class="col-xs-6 form-group">
      <input type="text" class="form-control" name="numero" placeholder="Nùmero">
	  </div>

	<div  class="col-xs-6 form-group">

		<select  class="form-control" name="medida">
						<option value="">Seleccione Tipo de medida</option>
			<option value="unidad">Unidad</option>
  		<option value="millar">Millar</option>
  		<option value="metro">Metro</option>
  		<option value="qg">QQ</option>
  		<option value="yarda">Yarda</option>
  		<option value="zon">Zon</option>
  		<option value="galones">Galones</option>
  		<option value="barriles">Barriles</option>
  		<option value="litros">Litros</option>
  		<option value="cajas">Cajas</option>
  		<option value="fulgones">Fulgones</option>
  		<option value="otro">Otros</option>
		</select>
	</div>
		<br/>
		<div  class="col-xs-12 form-group">
      <input type="date" class="form-control" name="fecha_entrega" placeholder="Fecha Entrega">
	  </div>
		
		<div  class="col-xs-12 form-group">
     
			<input type="text" class="form-control" name="observacion" placeholder="Observación del producto">
	  </div>
		
		
		
		
		
		
		

			<div class="col-xs-12 text-right"><br/>
					<button type="submit" class="btn btn-success">Buscar</button>	
			</div>
		</form>
	</div>