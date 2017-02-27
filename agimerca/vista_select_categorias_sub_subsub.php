<?php 

		$resultCategoria = $categoria->getCategoria();
        
		if(isset($_GET["idCategoria"]) &&  ($_GET["idCategoria"] != "")){
			$resultSelectCategoriaSubCategorio = $categoria->getRelacionCateriaSubCategoria(base64_encode($_GET["idCategoria"]));
		}
		 if(isset($_GET["idRelacionCategoriaSector"]) &&  ($_GET["idRelacionCategoriaSector"] != "")){
			$resultSelectSubCategoriaSubCategorio = $categoria->getRelacionSubCateriaSubSubCategoria(base64_encode($_GET["idRelacionCategoriaSector"])); 
		 }
			
		if(isset($_GET["opcionesAvanzadas"]) ){
			$requeridoA = false; 
		 }else{
			$requeridoA = true;
		}
    if( isset($_SESSION["id"]) ){
        $estaslogueado = "si";
    }else{
        $estaslogueado = "no";
    }
?>
<input type="hidden" id="logueado" value="<?php echo $estaslogueado; ?>" />
<input type="hidden" id="buscadorAvanzado" value="<?php if(isset($_GET["opcionesAvanzadas"])){ echo "opcionesAvanzadas"; } ?>"  />

<!-- div class="table-responsive">
<table class="table table-bordered">
	<tr>
		<th>
				Seleccionar Mercado
		</th>
		<th>
				Seleccionar Sector
		</th>
		<th>
				Seleccionar Producto
		</th>
	</tr>

	<tr>
		<td>
		
		<select <?php //if($requeridoA){ //echo "required"; } ?> name="categoria_id" id="categoria_id" class="form-control select2" onchange="mostrarSectores();">
			<option  value=""></option>
				<?php
				 
					while($resCategoria = mysqli_fetch_object($resultCategoria)){
				?>
						<option <?php if(isset($_GET["idCategoria"])){ if($resCategoria->id == $_GET["idCategoria"]){ echo "selected"; } } ?>  value="<?php echo $resCategoria->id; ?>"><?php echo $resCategoria->nombre_categoria; ?></option>

				<?php 
					} 
			?>
			
		</select>
		</td>
		
		<td>
		
		<select   <?php //if($requeridoA){ echo "required"; } ?> name="relacion_sector_roll_id" onchange="mostraProducto('<?php echo $_GET["idCategoria"]; ?>');" id="relacion_sector_roll_id" class="form-control select2">
						<option  value="" ></option>

			<?php
				if(isset($_GET["idCategoria"])){
					while($resSectores = mysqli_fetch_object($resultSelectCategoriaSubCategorio)){
				?>
						<option <?php  if(isset($_GET["idRelacionCategoriaSector"])){  if($resSectores->id_relacion == $_GET["idRelacionCategoriaSector"]){ echo "selected"; } } ?> value="<?php echo $resSectores->id_relacion; ?>"><?php echo $resSectores->sub_categoria_name; ?></option>

				<?php } } ?>
		</select>
		</td>
			
		<td>
		
		<select  <?php //if($requeridoA){ echo "required"; } ?>  name="relacion_producto_sector_id" id="relacion_producto_sector_id" class="form-control select2">
			<option  value="" ></option>
			<?php
			if(isset($_GET["idRelacionCategoriaSector"])){
					while($resProducto = mysqli_fetch_object($resultSelectSubCategoriaSubCategorio)){
				?>
						<option value="<?php echo $resProducto->id_relacion; ?>"><?php echo $resProducto->sub_sub_categoria_name; ?></option>

				<?php } } ?>
		</select>
		</td>
	</tr>
	
</table>
</div -->
<div title="Seleccione el tipo del mercado" class="col-xs-12 form-group">
        Seleccione el tipo del mercado<br/>
        <select name="categoria_id" id="categoria_id_s" class="form-control select2" >
			<option  value=""></option>
			
		</select>
</div>


<div title="Seleccione el sector que desea" class="col-xs-12 form-group">
    Seleccione el sector que desea <br/>
    <select name="relacion_sector_roll_id" id="relacion_sector_roll_id" class="form-control select2">
        <option  value="" ></option>
		</select>
</div>
<div title="Seleccione el producto que desea" class="col-xs-12 form-group">
    Seleccione el producto que desea<br/>
    <select name="relacion_producto_sector_id" id="relacion_producto_sector_id" class="form-control select2">
			<option  value="" ></option>
		</select>
</div>
<div id="agregarOpcion" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar nueva opción</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group"  title="Ingrese el mercado que desea agregar">
                <label for="mercado">Mercado</label>
                <input type="text" class="form-control" id="mercado" placeholder="Mercado">
              </div>
              <div class="form-group" title="Ingrese el sector que desea agregar">
                <label for="sector">Sector</label>
                <input type="text" class="form-control" id="sector" placeholder="Sector">
              </div>
              <div class="form-group" title="Ingrese el sub sector que desea agregar">
                <label for="sub_sector">Sub Sector</label>
                <input type="text" class="form-control" id="sub_sector" placeholder="Sub Sector">
              </div>
              <div class="form-group" title="Ingrese el producto que desea agregar">
                <label for="producto">Producto</label>
                <input type="text" class="form-control" id="producto" placeholder="Producto">
              </div>
            </form>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="idBtGuardar" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
			function mostrarSectores(){
				var idCategoria = $("#categoria_id").val();
				var busquedaAvanzada = buscadorAvanzadoActivo();
				window.location = "?idCategoria="+idCategoria+busquedaAvanzada;
				
			}
			function mostraProducto(idCategoria){
				var idRelacion = $("#relacion_sector_roll_id").val();
				var busquedaAvanzada = buscadorAvanzadoActivo();
				window.location = "?idCategoria="+idCategoria+"&idRelacionCategoriaSector="+idRelacion+busquedaAvanzada;
			}
			function buscadorAvanzadoActivo(){
				var busquedaAvanzada = "";
				if($("#buscadorAvanzado").val() != 0){
						busquedaAvanzada = "&opcionesAvanzadas=si";
				}
				if($("#textbuscador_avanzado").val() != 0){
						busquedaAvanzada += "&textbuscador_avanzado="+$("#textbuscador_avanzado").val();
				}
				
				
				return busquedaAvanzada;
			}
    
    
    
    
    
    
    
    
    
    
    
            $(document).ready(function (){
                /* $.ajax({
                          url:"ajax.php",
                          data:{accion:"sectores",idRelacionCategoriaSector:"1"},
                          method:"post",
                          dataType:"html",
                          success:function (data){
                         alert(data);
                              $("#relacion_sector_roll_id").html("<option value='' ></option>");
                            console.log(data+" - "+$("#categoria_id_s").val()); 
                            
                            for( i = 0 ; i < data.length ; i++){
                            //console.log("entro");   
                              var opciones = "<option value='"+data[i]["id"]+"' >"+data[i]["nombre"]+"</option>";
                            //console.log(opciones);
                              $("#relacion_sector_roll_id").append(opciones);    
                            }
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });*/
                 $.ajax({
                          url:"ajax.php",
                          data:{accion:"cargarMercado"},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                             //console.log(data);
                            //console.log(data.length);
                            $("#categoria_id_s").html("<option value='' ></option>");
                            console.log(data); 
                            
                            for( i = 0 ; i < data.length ; i++){
                            //console.log("entro");   
                              var opciones = "<option value='"+data[i]["id"]+"' >"+data[i]["nombre"]+"</option>";                   
                                $("#categoria_id_s").append(opciones);    
                            }
                            /*  var opciones = "<option value='CLIC PARA AGREGAR UNO NUEVO' >CLIC PARA AGREGAR UNO NUEVO</option>";
                              $("#categoria_id_s").append(opciones);*/
                              if(logueado()){
                              var opciones = "<option value='CLIC PARA AGREGAR UNO NUEVO' >CLIC PARA AGREGAR UNO NUEVO</option>";
                              $("#categoria_id_s").append(opciones);
                              }else{
                              var opciones = "<option value='registrate' >PARA AGREGAR UNO NUEVO DEBE ESTAR LOGUEADO</option>";
                              $("#categoria_id_s").append(opciones);
                                  
                              }
                              
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });
                
                $("#categoria_id_s").on("change", function (e){
                    //console.error( $("#categoria_id_s").val() );
                    $("#relacion_sector_roll_id").html("<option value='' ></option>");
                    $("#relacion_producto_sector_id").html("<option value='' ></option>");
                    
                    if($("#categoria_id_s").val() != 0){
                        if($("#categoria_id_s").val() ==  "CLIC PARA AGREGAR UNO NUEVO" ){
                            mostrarModal();
                        }else if($("#categoria_id_s").val() ==  "registrate" ){
                            irregistrate();
                             //registrate
                        }else{
                    
                    $.ajax({
                          url:"ajax.php",
                          data:{accion:"sectores",idRelacionCategoriaSector:$("#categoria_id_s").val()},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                         // alert(data);
                              $("#relacion_sector_roll_id").html("<option value='' ></option>");
                            console.log(data+" - "+$("#categoria_id_s").val()); 
                            
                            for( i = 0 ; i < data.length ; i++){
                            //console.log("entro");   
                              var opciones = "<option value='"+data[i]["id"]+"' >"+data[i]["nombre"]+"</option>";
                            //console.log(opciones);
                              $("#relacion_sector_roll_id").append(opciones);    
                            }
                            /*var opciones = "<option value='CLIC PARA AGREGAR UNO NUEVO' >CLIC PARA AGREGAR UNO NUEVO</option>";
                              $("#relacion_sector_roll_id").append(opciones);*/
                              if(logueado()){
                              var opciones = "<option value='CLIC PARA AGREGAR UNO NUEVO' >CLIC PARA AGREGAR UNO NUEVO</option>";
                              $("#relacion_sector_roll_id").append(opciones);
                              }else{
                              var opciones = "<option value='registrate' >PARA AGREGAR UNO NUEVO DEBE ESTAR LOGUEADO</option>";
                              $("#relacion_sector_roll_id").append(opciones);
                                  
                              }
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });
                    }
                    }else{
                        alert("Debe seleccinar un mercado");
                        return false;
                    }
                });
            
                $("#relacion_sector_roll_id").on("change", function (e){
                    //console.error( $("#categoria_id_s").val() );
                    $("#relacion_producto_sector_id").html("<option value='' ></option>");
                    
                    if($("#relacion_sector_roll_id").val() != 0){
                         if($("#relacion_sector_roll_id").val() ==  "CLIC PARA AGREGAR UNO NUEVO" ){
                            mostrarModal();
                             //registrate
                        }else if($("#relacion_sector_roll_id").val() ==  "registrate" ){
                            irregistrate();
                             //registrate
                        }else{    
                    
                    $.ajax({
                          url:"ajax.php",
                          data:{accion:"productos",idRelacionCategoriaSector:$("#relacion_sector_roll_id").val()},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                         // alert(data);
                              $("#relacion_producto_sector_id").html("<option value='' ></option>");
                            console.log(data+" - "+$("#relacion_sector_roll_id").val()); 
                            
                            for( i = 0 ; i < data.length ; i++){
                            //console.log("entro");   
                              var opciones = "<option value='"+data[i]["id"]+"' >"+data[i]["nombre"]+"</option>";
                            //console.log(opciones);
                              $("#relacion_producto_sector_id").append(opciones);    
                            }
                              if(logueado()){
                              var opciones = "<option value='CLIC PARA AGREGAR UNO NUEVO' >CLIC PARA AGREGAR UNO NUEVO</option>";
                              $("#relacion_producto_sector_id").append(opciones);
                              }else{
                              var opciones = "<option value='registrate' >PARA AGREGAR UNO NUEVO DEBE ESTAR LOGUEADO</option>";
                              $("#relacion_producto_sector_id").append(opciones);
                                  
                              }
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });
                        }
                    }else{
                        alert("Debe seleccinar un mercado");
                        return false;
                    }
                });
                
                //relacion_producto_sector_id
                $("#relacion_producto_sector_id").on("change", function (e){
                    if($("#relacion_producto_sector_id").val() != 0){
                        if($("#relacion_producto_sector_id").val() == "CLIC PARA AGREGAR UNO NUEVO"){
                            mostrarModal();  
                        }else if($("#relacion_producto_sector_id").val() ==  "registrate" ){
                            irregistrate();
                             //registrate
                        }
                    }
                });
                
                $("#idBtGuardar").click( function (e){
                    //console.error( $("#categoria_id_s").val() );
                    $.ajax({
                          url:"ajax.php",
                          data:{accion:"productoSugerido",mercado:$("#mercado").val(),sector:$("#sector").val(),subsector:$("#sub_sector").val(),producto:$("#producto").val()},
                          method:"post",
                          dataType:"json",
                          success:function (data){
                                //alert(data);
                              console.log(data);
                              if(data["respuesta"] == "1"){
                                alert("Se guardo correctamente");  
                                $('#agregarOpcion').modal('hide');
                              }else{
                                alert("No se pudo guardar");  
                              }
                          },
                          error:function (){
                              console.error("Nada bueno");
                          }
                      });
                });
                
            });
            function mostrarModal(){
                $('#agregarOpcion').modal('show');
            }
            function logueado(){
                if($("#logueado").val() == "si"){
                    return true;
                }else{
                    return false;
                }
            }
            function irregistrate(){
                window.location = "registro.php";
            }
    
    //productoSugerido
      </script>