<?php
	require_once("header.php");
	$permitir = $usuario->validarEntradaIlegal($_SESSION["permisos"],"manejarproducto");
	if (isset($_POST)) {
		$resp = $producto->setProducto($_POST,$_FILES);
		//$producto->verQuery($resp);
		//die("para");
	}
?>
<script >
	$("html").ready(function () { ActivarEnlaceMenu("idMenuProducto","active","<?php echo $label->MenuProducto; ?>"); });
</script>
<?php if ($permitir) { ?> 
<input type="hidden" id="redireccionar" value="1">
<?php } ?>
	  <div class="page-header">
	  	<?php if (isset($resp)) {
	  		if ($resp == '1') {
	  	?>
	  		<div class="alert alert-info text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ProcesadaSolicitud; ?></strong></div>
	  	<?php 
	  		}
	  		elseif($resp == '3'){
	  	?>
	  	<div class="alert alert-danger text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ElTamanoDeLaImagenEsMayor; ?></strong></div>
	  	<?php 
	  		}  	
	  	} 
	  ?>
	  
        <h1><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> <?php echo $label->Producto; ?></h1>
        <div class="row">
        	<?php $query = $producto->getInventario(); ?>
		  <div class="col-md-4"><h4 ><span class="label label-success"><?php echo $label->Total; ?> <?php echo $label->Registros; ?>: <?php echo $query->num_rows; ?> </span></h4></div>

		  <div class="col-md-4 col-md-offset-4">

		  	<div class="text-right">
        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
        		<span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        		<?php echo $label->Nuevo; ?></button>
    		</div>
    	</div>

		</div>

      </div>
      
      <div class="row">
        <div class="col-md-12">
         <div class="table-responsive">
          <table class="table table-striped">
            <thead>
            
              <tr>

                <th><?php echo $label->IconoNumero; ?></th>
                <th class="text-center"><?php echo $label->Opcion; ?></th>
                <th><?php echo $label->MayusculaImagen; ?></th>
                <th><?php echo $label->MayusculaCodigo; ?></th>
                <th><?php echo $label->MayusculaNombre; ?></th>
                <th><?php echo $label->MayusculaCantidad; ?></th>
                <th><?php echo $label->MayusculaPrecio; ?></th>
              </tr>
            
            </thead>
            <tbody>
              
              <?php 
		         $c=0;
		         while ($result = $query->fetch_object()) { $c++;
		      ?>
		       
		       <tr <?php if($result->cantidad <= 0){ ?> class="warning text-warning" <?php } ?> >
                <td><?php echo $c; ?></td>
                <td class="">
                	
                	<button type="button" onclick="opcionUser('bs-example-modal-sm-eliminar','<?php echo $result->id; ?>','eliminar');" class="btn btn-link"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                		<?php echo $label->Eliminar; ?></button><br/>
                	<button type="button"onclick="getInfoProductoEdit('<?php echo $result->id; ?>','<?php echo $result->nombre; ?>','<?php echo $result->precio; ?>');" class="btn btn-link"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                		<?php echo $label->Editar; ?></button><br/>
                	<button type="button"onclick="getInfoDetalleProducto('<?php echo $result->id; ?>','<?php echo $result->nombre; ?>');" class="btn btn-link"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
                		<?php echo $label->Detalle; ?></button>
                </td>
                <td><img src="<?php echo $result->url; ?>" class="img-responsive img-thumbnail" alt="<?php echo $label->Imagen; ?>" width="100" height="80" style=" height: 90px; " ></td>
                <td><?php echo $result->codigo; ?></td>
                <td><?php echo $result->nombre; ?></td>
                <td><?php echo $result->cantidad; ?></td>
                <td><?php echo $result->precio; ?></td>
              </tr>
		     <?php	
		        }
		     ?>
              

            </tbody>
          </table>
        </div> 
	</div>
        
      </div>

      <form action="" method="post" id="opcionForm">
      	<input type="hidden" id="opcionInpu">
      	<input type="hidden" id="IdOpcionInpu" name="idRegistro">
      </form>

      <!--MODAL ADD-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> <?php echo $label->Nuevo; ?> <?php echo $label->MinusculaProducto; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		        <form action="" id="formIdProducto" method="post" enctype="multipart/form-data">
		        	<input type="hidden" value="1" name="add"><input type="hidden">
		        	
      			
		        <div id="idDivCodigo" class="form-group">
		            <label for="idCodigo" class="control-label"><?php echo $label->Codigo; ?>:</label>
		            <input type="text" name="codigo" class="form-control" id="idCodigo">
					<span id="idSpanCodigo" class="" aria-hidden="true"></span>
					<div id="idMsjCodigo" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUn; ?> <?php echo $label->MinusculaCodigo; ?>.</div>
				</div>

		          <div id="idDivNombre" class="form-group">
		            <label for="idNombre" class="control-label"><?php echo $label->Nombre; ?> <?php echo $label->MinusculaProducto; ?>:</label>
		            <input type="text" name="nombre" class="form-control" id="idNombre">
					<span id="idSpanNombre" class="" aria-hidden="true"></span>
					<div id="idMsjNombre" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?> <?php echo $label->MinusculaProducto; ?>.</div>
				</div>

				 <div class="form-group">
				    <label for="exampleInputFile"><?php echo $label->Imagen; ?></label>
				    <input type="file" name="imgProducto" id="exampleInputFile">
				    <p class="help-block"></p>
				  </div>

		          <div id="idDivCantidad" class="form-group">
		            <label for="idCantidad" class="control-label"><?php echo $label->Cantidad; ?>:</label>
		            <input type="text" name="cantidad" class="form-control" id="idCantidad">
					<span id="idSpanCantidad" class="" aria-hidden="true"></span>
					<div id="idMsjCantidad" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUna; ?> <?php echo $label->MinusculaCantidad; ?>.</div>
				 </div>

		          <div id="idDivCompra" class="form-group">
		            <label for="idPrecioCompra" class="control-label"><?php echo $label->Precio; ?> <?php echo $label->MinusculaCompra; ?> <?php echo $label->MinusculaUnidad; ?>:</label>
		            <input type="text" name="precioCompra" class="form-control" id="idPrecioCompra">
					<span id="idSpanPrecioCompra" class="" aria-hidden="true"></span>
					<div id="idMsjCompra" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUn; ?> <?php echo $label->MinusculaPrecio; ?>.</div>
				</div>

		          <div id="idDivPrecio" class="form-group">
		            <label for="idPrecio" class="control-label"><?php echo $label->Precio; ?> <?php echo $label->MinusculaVenta; ?>venta <?php echo $label->MinusculaUnidad; ?>:</label>
		            <input type="text" name="precio" class="form-control" id="idPrecio">
					<span id="idSpanPrecio" class="" aria-hidden="true"></span>
					<div id="idMsjPrecio" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUn; ?> <?php echo $label->MinusculaPrecio; ?>.</div>
				 </div>
		          
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" id="guardarProducto" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>
		    </div>
		  </div>
		</div>


	<!--MODAL EDITAR-->
	 <div class="modal fade" id="exampleModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $label->Editar; ?> <?php echo $label->MinusculaProducto; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		        <form action="" id="formIdProductoEditar" method="post" enctype="multipart/form-data">
		        	<input type="hidden" name="edit">
      				<input type="hidden" id="idEdit" name="idRegistro">

      			  <div class="form-group">
				    <label for="exampleInputFile"><?php echo $label->Imagen; ?></label>
				    <input type="file" name="imgProducto" id="exampleInputFile">
				    <p class="help-block"></p>
				  </div>

		        	<div id="idDivNombreEdit" class="form-group">
			            <label for="idNombre" class="control-label"><?php echo $label->Nombre; ?> <?php echo $label->MinusculaProducto; ?>:</label>
			            <input type="text" name="nombre" class="form-control" id="idNombreEdit">
						<span id="idSpanNombreEdit" class="" aria-hidden="true"></span>
						<div id="idMsjNombreEdit" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?> <?php echo $label->MinusculaProducto; ?>.</div>
					</div>
      				
      				<div id="idDivPrecioEdit" class="form-group">
			            <label for="idPrecioEdit" class="control-label"><?php echo $label->Precio; ?> <?php echo $label->MinusculaVenta; ?> <?php echo $label->MinusculaUnidad; ?>:</label>
			            <input type="text" name="precio" class="form-control" id="idPrecioEdit">
						<span id="idSpanPrecioEdit" class="" aria-hidden="true"></span>
						<div id="idMsjPrecioEdit" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUn; ?> <?php echo $label->MinusculaPrecio; ?>.</div>
					 </div>
		          


		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?></button>
		        <button type="button" id="guardarProductoEditar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?></button>
		      </div>
		    </div>
		  </div>
		</div>

	<!--MODAL ELIMINAR-->
    <!-- Small modal -->

	<div class="modal fade bs-example-modal-sm-eliminar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-danger text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <?php echo $label->Eliminar; ?> <?php echo $label->MinusculaProducto; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		      	
		     <p class="text-danger text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaEliminar; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaProducto; ?>?</strong></p> 

		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" onclick="enviarFormulario('opcionForm');" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>

	    </div>
	  </div>
	</div>

	<!--MODAL DETALLE-->
	 <div class="modal fade" id="exampleModalDetalleProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> <?php echo "Detalle"; ?> <?php echo $label->MinusculaProducto; ?></h4>
		      </div>
		      
		      <div class="modal-body" id="detalleIdProducto">
		        
		      </div>
		     
		    </div>
		  </div>
		</div>

	<!--MODAL ANULAR -->
    <!-- Small modal -->

	<div class="modal fade bs-example-modal-sm-anular" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-danger text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <?php echo $label->Anular; ?> <?php echo $label->MinusculaProducto; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		      	
		     <p class="text-danger text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaAnular; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaProducto; ?>?</strong></p> 

		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" onclick="enviarFormulario('opcionForm');" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>

	    </div>
	  </div>
	</div>


<?php
	require_once("footer.php");
?>