<a href="javascript:void(0);" onclick="mostrarOpcinesAvanzadas();" id="enlaceA">Opciones Avanzadas</a>
<div id="post_basico"> 
<textarea name="post" class="form-control" rows="5"></textarea>
</div>

	<div class="row" style="display:none;" id="post_avanzado">
		<div  class="col-xs-12 form-group">
			<br/>
      <input type="text" class="form-control" name="caracteristica" placeholder="Caracteristicas">
	  </div>
	
	<div  class="col-xs-12 form-group">

		<select  class="form-control" name="pais" placeholder="Seleccione Pais de la Ubicación del producto">
			<option>Seleccione Pais de la Ubicación del producto</option>
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
      <option value="">Seleccione un tipo de medida </option>			
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
		
</div>


<script type="text/javascript" >
		function mostrarOpcinesAvanzadas(){
			var activo = $("#post_avanzado").css("display");
			if(activo == "none"){
				$("#post_avanzado").show(4000);
				$("#enlaceA").html("Opciones Basica");
				$("#post_basico").hide(4000);
				
			}else{
				$("#post_avanzado").hide(4000);
				$("#enlaceA").html("Opciones Avanzadas");
				$("#post_basico").show(4000);
			}
		}
		
</script>