<a href="javascript:void(0);" title="Clic para mostrar opciones o ocultarla " onclick="mostrarOpcinesAvanzadas();" id="enlaceA">Opciones Avanzadas</a>
<input type="hidden" value="0" id="agregarproducto" />
<div id="post_basico"> 
<textarea name="post" id="post" class="form-control" rows="5"></textarea>
</div>

	<div class="row" style="display:none;" id="post_avanzado">
		
        <?php require_once("vista_select_categorias_sub_subsub.php"); ?>
        
        <div title="Ingresé la caracteristicas del producto" class="col-xs-12 form-group">
			<br/>
      <input  type="text" class="form-control" name="caracteristica" placeholder="Caracteristicas">
	  </div>
	
	<div title="Selecciones el país" class="col-xs-12 form-group">

		<select  class="form-control select2" name="pais" placeholder="Seleccione Pais de la Ubicación del producto">
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
	<div  title="Ingresé la provincia o estado" class="col-xs-12 form-group">
      <input type="text" class="form-control" name="provincia" placeholder="Provincia o Estado Ubicación del producto">
	  </div>
	<br/>
	<div   title="Ingresé la dirección fisica" class="col-xs-12 form-group">
      <input type="text" class="form-control" name="localidad" placeholder="Localidad o Ubicación del producto">
	  </div>
	<br/>
	<div   title="Ingresé la cantidad, debe tambien seleccionar el tipo de medida"  class="col-xs-6 form-group">
      <input type="text" class="form-control" name="numero" placeholder="Cantidad">
	  </div>

	<div   title="Seleccione un tipo de medida, debe tambien insertar la cantidad" class="col-xs-6 form-group">

		<select  class="form-control select2" name="medida">
      <option value=""></option>			
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
		<div title="Seleccione la fecha en la que desea la entrega del producto"  class="col-xs-12 form-group">
        Seleccione la fecha para entregar el producto
      <input type="date" class="form-control" name="fecha_entrega" placeholder="Fecha Entrega">
	  </div>
		
		<div title="Ingrese la observación que tenga sobre el producto"  class="col-xs-12 form-group">
     
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
                $("#agregarproducto").val("1");
				
			}else{
				$("#post_avanzado").hide(4000);
				$("#enlaceA").html("Opciones Avanzadas");
				$("#post_basico").show(4000);
                $("#agregarproducto").val("0");
			}
		}
		
</script>