<?php
	require_once("header.php");
	$permitir = $usuario->validarEntradaIlegal($_SESSION["permisos"],"generarfactura");
	$paso2 = false;
	if (isset($_POST)) {
		
		$resp = $factura->setCotizacion($_POST);

		if (isset($_POST["add"])) {
			$paso2 = true;
		}
		
		
	}
?>
<script type='text/javascript' src="js/jspdf.debug.js"></script>

<?php $totales = $factura->getTotalCotizacion();  $datoEmpresa = $empresa->getDatosEmpresa();  ?>

<script >
	$("html").ready(function () { ActivarEnlaceMenu("idMenuFactura","active","<?php echo $label->MenuAjustePermiso; ?>"); });
</script>

<?php if ($permitir) { ?> 
<input type="hidden" id="redireccionar" value="1">
<?php } ?>

	<?php if (isset($resp)) {
	  		if ($resp == '1') {
	  			unset($_POST);
	  			$paso2 = false;
	  	?>
	  		<div class="alert alert-info text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ProcesadaSolicitud; ?></strong></div>
	  	<?php 
	  		}
	  	}
	  	if($factura->respuestaAnulacion == 1){
	  ?>
	  	<div class="alert alert-danger text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ElUsuarioNoTienePermiso; ?></strong></div>
	  <?php 
		}elseif ($factura->respuestaAnulacion == 2) {
	  ?>
	  <div class="alert alert-info text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ProcesadaSolicitud; ?></strong></div>
	  <?php }
	  ?>
	  
<div class="page-header">
	        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                  <?php echo $label->MenuFactura; ?></h1>
</div>

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-pills nav-tabs nav-justified" role="tablist">
    <li role="presentation" class=" <?php if (!$paso2) { ?> active <?php } ?>"><a href="#home" id="paso1" aria-controls="home" role="tab" data-toggle="tab"><?php echo $label->Paso; ?> 1</a></li>
    <li role="presentation" class=" <?php if ($paso2) { ?> active <?php } ?>"><a href="#profile" id="paso2" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $label->Paso; ?> 2</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if (!$paso2) { ?> active <?php } ?>" id="home">

    	<div class="page-header">
	        <h3><?php echo $label->Paso; ?> 1 <?php echo $label->De; ?> 2<small> <?php echo $label->Seleccionar; ?> <?php echo $label->MinusculaProducto; ?></small></h3>
	    </div>

	    <form action="" method="post" id="formProductoSelect">
			 <input name="marcardoTotal" value="0" id="marcardoTotal" type="hidden" />
			 <input name="clienteNuevo" value="0" id="clienteNuevo" type="hidden" />
			 <input name="add"  type="hidden" />

		 
		 <!--CLIENTE -->
		 <div class="page-header">
	        <h4><?php echo $label->Cliente; ?> </h4>
	    </div>
		 <div class="row">
		 	<div class="col-xs-6">

		 		<div id="idDivCedulaCliente" class="form-group">
		 			
		 			<input type="number" class="form-control " id="cedulaCliente" name="cedulaCliente" autofocus placeholder="<?php echo $label->Cedula; ?> ">
					<span id="idSpanCedulaCliente" class="" aria-hidden="true"></span>
					<div id="idMsjCedulaCliente" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUna; ?> <?php echo $label->MinusculaCedula; ?>.</div>
		          
		        </div>

		 	</div>
		 	<div class="col-xs-6">

		 		<div id="idDivNombreCliente" class="form-group">
		 			
		 			<input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="<?php echo $label->Nombre; ?> <?php echo $label->MinusculaCompleto; ?>">
					<span id="idSpanNombreCliente" class="" aria-hidden="true"></span>
					<div id="idMsjNombreCliente" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?>.</div>
		          
		        </div>
		        
		 	</div>

		 </div>
		 <div class="page-header">
	        <h4>Productos</h4>
	    </div>
		 <div class="row">
		            	
		            	<?php 
		            		$c=0;
		            		$query = $producto->getInventario();
		            		while ($result = $query->fetch_object()) {
		            			if ($result->cantidad > 0) {
		            		?>

		            		<div class="col-sm-2" onclick="introducirCantidad('input<?php echo $c; ?>');">
					          
					          <input name="marcardo[]" value="0" id="marcado<?php echo $c; ?>" type="hidden" />
					          <input  value="<?php echo $result->id; ?>" name="idInvientario<?php echo $c; ?>" type="hidden" />
					          <input  value="<?php echo $result->precio; ?>" name="precio<?php echo $c; ?>" type="hidden" />
					          <input  value="<?php echo $result->cantidad; ?>" id="totalV<?php echo $c; ?>" type="hidden" />

					          <div id="panel<?php echo $c; ?>" class="panel panel-primary">
					            <div class="panel-heading">
					              <h4 class="panel-title text-capitalize"><?php echo ucwords(strtolower($result->nombre)); ?></h4>
					             
					            </div>
					            <div class="panel-body">
					            	<img src="<?php echo $result->url; ?>" class="img-responsive img-thumbnail" alt="<?php echo $label->Imagen; ?>" width="130" height="80" style=" height: 90px; " >
					            
					           	</div>
					            
					            <div class="panel-footer">
					            	<div class="row">
										  <div class="col-xs-5">
										    <p><?php echo $label->Precio; ?></p>
										    <p><?php echo $label->Cantidad; ?> </p>  
										  </div>
										  <div class="col-xs-7">										    
										    <p><span class="label label-info"> $ <?php echo $result->precio; ?></span></p>
										   <p> <input name="input<?php echo $c; ?>" onchange="marcarProductoElegido('<?php echo $c; ?>');" id="input<?php echo $c; ?>" onkeyup="marcarProductoElegido('<?php echo $c; ?>');" id="input<?php echo $c; ?>" type="number" class="form-control" placeholder="123"></p>
										  </div>
									</div>
								</div>
					          </div>
					        </div><!-- /.col-sm-4 -->
		            	<?php	
		            		$c+=1; }
		            		}
		            	?>
			</div>

		  
		</form>

    </div>









    
    <div role="tabpanel" class="tab-pane <?php if ($paso2) { ?> active <?php } ?>" id="profile">

    	<form action="" method="post" id="formPermisoPaso2">
		 <input type="hidden" id="cotizacion_id" name="cotizacion_id" value="<?php if (isset($totales["cotizacion_id"])) { echo $totales["cotizacion_id"]; } ?>">

    	<?php  
    		if (isset($_POST["add"])) {
	
    	?>
    	<div class="page-header">
	        <h3><?php echo $label->Paso; ?> 2 <?php echo $label->De; ?> 2<small> <?php echo $label->Cotizacion; ?></small></h3>
	    </div>

	    <div class="row">
		  <div class="col-md-2 col-md-offset-10">
		  		
		  		<div class="dropdown">
				  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				  	<span class="glyphicon glyphicon-save-file"></span>
				    Exportar
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="htmlWordExcel('exportEXCEL');"
				    	>EXCEL</a></li>
				    
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="htmlWordExcel('exportWORD');"
				    	>WORD</a></li>

				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="htmltopdf();"
				    	>PDF</a></li>
				  </ul>
				</div>

    		</div>
		</div>
			<br/>

    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    		
    		<div class="media">
				  <div class="media-left ">
				    <a href="#">
				       <img class="media-object" src="
			  				<?php echo $datoEmpresa["icono"]; ?>
				      " alt="icono empresa">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading text-center">
				    	<?php echo $datoEmpresa["nombre"]; ?>
				    </h4>
				     <p class="text-center">
				    	<small>
				    		<?php echo $datoEmpresa["direccion"]; ?>
				    	</small>
				    </p>
				    <p class="text-center">
				    	<small>
				    		<?php echo $label->Telefono; ?> 
			  				<?php echo $datoEmpresa["telefono1"]; ?>
				    		 / 
			  				<?php echo $datoEmpresa["telefono2"]; ?>
				    	</small>
				    </p>
				    <p class="text-center">
				    	<small>
				    		<?php echo $label->Fax; ?> 
			  				<?php echo $datoEmpresa["fax1"]; ?>
				    		 / 
			  				<?php echo $datoEmpresa["fax2"]; ?>
				    	</small>
				    </p>
				    <p class="text-center">
				    	<small>
				    		<?php echo $label->Email; ?> 
			  				<?php echo $datoEmpresa["email"]; ?>
				    	</small>
				    </p>
				     <p class="text-center">
				    	<small>
				    		<?php echo $label->Web; ?> 
			  				<?php echo $datoEmpresa["web"]; ?>
				    	</small>
				    </p>
				  </div>
				  <div class="media-right ">
				  	<p>
				  		<small>
				  			<strong><?php echo $label->RNC; ?></strong>
			  				<?php echo $datoEmpresa["rnc"]; ?>
				  		</small>
				  	</p>
				  	<p>
				  		<small>
				  			<strong><?php echo $label->No; ?></strong> 
			  				<?php echo $totales["cotizacion_id"]; ?>
				  		</small>
				  	</p>
				    <p>
				    	<small>
				    	<strong><?php echo $label->Fecha; ?></strong> 
			  				<?php echo $totales["fecha"]; ?>
				    	</small>
					</p>
				    <p>
				    	<small>
				    	<strong><?php echo $label->Fecha; ?> <?php echo $label->MinusculaFacturacion; ?></strong> 
			  				<?php echo $totales["fechaFactura"]; ?>
				    	</small>
					</p>
				  </div>
			</div>

    		<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">
			    	<?php echo $label->Cliente; ?> <?php echo $label->No; ?> 
			  				<?php echo $totales["cliente_id"]; ?>
			    </h3>
			  </div>
			  <div class="panel-body">
			  		<div class="row">
		 				<div class="col-xs-3">
			  				<p><?php echo $label->Nombre; ?></p>
		 				</div>
		 				<div class="col-xs-3">
			  				<?php echo $totales["nombreCliente"]; ?>
		 				</div>
		 				<div class="col-xs-3">
			  				<p><?php echo $label->Cedula; ?></p>
		 				</div>
		 				<div class="col-xs-3">
			  				<?php echo $totales["cedulaCliente"]; ?>
		 				</div>
			  		</div>
			  </div>
			</div>

    		<div class="table-responsive">
		          <table class="table table-bordered table-hover ">
		            <thead>
		            
		              <tr>

		                <th><?php echo $label->IconoNumero; ?></th>
		               
		                <th><?php echo $label->MayusculaProducto; ?></th>
		                <th><?php echo $label->MayusculaCantidad; ?></th>
		                <th><?php echo $label->MayusculaPrecio; ?></th>
		                <th><?php echo $label->MayusculaTotal; ?></th>
		              </tr>
		            
		            </thead>
		            <tbody>
		              
		              <?php 
				         $c=0;
				         $query = $factura->getDetalleCotizacion();
				         while ($result = $query->fetch_object()) { $c++;
				      ?>
				       
				       <tr>
		                <td><?php echo $c; ?></td>
		            
		                <td><?php echo $result->nombre; ?></td>
		                <td><?php echo $result->cantidad; ?></td>
		                <td> <?php echo $label->IconoMoneda; ?> <?php echo number_format($result->precio,2); ?></td>
		                <td> <?php echo $label->IconoMoneda; ?> <?php echo number_format($result->sub_total,2); ?></td>
		                <td>
		                	<button type="button" onclick="opcionUser('bs-example-modal-sm-anular','<?php echo $result->id; ?>','anular');" class="btn btn-link">
		                		<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 
                				<?php echo $label->Anular; ?>
                			</button>
		                </td>
		              </tr>
				     <?php	
				        }
				     ?>
		              
		            </tbody>
		            <tfoot>
		            	<tr>
			            	
			                <th colspan="4"><?php echo $label->Sub; ?> <?php echo $label->MinusculaTotal; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["monto"],2); ?></th>
		            	</tr>
		            	<tr>
			                <th  colspan="4"><?php echo $label->Itbis; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["itbis"],2); ?></th>
		            	</tr>
		            	<tr>
			                <th  colspan="4"><?php echo $label->Total; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["total"],2); ?></th>
		            	</tr>
		            </tfoot>
		          
		          </table>
		        </div> 
    		
    	</div>
    <?php } ?>
     </form>
  </div>

</div>
</div>
<nav>
  <ul class="pager">
    <li id="previosFactura" class="previous disabled"><a href="contenidoWizard.php"><span aria-hidden="true">&larr;</span> <?php echo $label->Atras; ?></a></li>
    <li id="nextFactura" onclick="manejarBotonesSiguienteAtrasFinFactura('previosFactura','previous','nextFactura',<?php echo $c; ?>);" class="next"><a href="javascript:;"><?php echo $label->Siguiente; ?> <span aria-hidden="true">&rarr;</span></a></li>
    <li id="finFactura" class="next hidden"><a href="javascript:;" id="idFinFactura"><?php echo $label->Finalizar; ?></a></li>
  </ul>
</nav>


	<!--MODAL PRODUCTO NO SELECCION-->
	<!-- Small modal -->
	<div class="modal fade bs-example-modal-sm-producto-no-seleccionado" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-danger text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <?php echo $label->Seleccionar; ?>  <?php echo $label->MinusculaProducto; ?> </h4>
		      </div>
		      <div class="modal-body">
		     <p class="text-center text-danger"><strong><?php echo $label->Debe; ?></strong></p> 
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
		      <form action="" id="formAnularProducto" method="post">
		 			<input type="hidden" id="cotizacion_id" name="cotizacion_id" value="<?php if (isset($totales["cotizacion_id"])) { echo $totales["cotizacion_id"]; } ?>">
		 			<input type="hidden" id="IdOpcionInpu" name="idRegistro" value="0">
		 			<input type="hidden" id="anularProducto" name="anularProducto" value="0">

		     <p class="text-danger text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaAnular; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaProducto; ?>?</strong></p> 
		     <?php 
		     	 if (isset($_SESSION["permisos"]["anularcompraproducto"]) && $_SESSION["permisos"]["anularcompraproducto"]["bloquear"] == 1) { }else{ 
		     ?>
		 		<input type="hidden" id="validPermiso" name="validPermiso" value="0">

		     	<div class="alert alert-warning" role="alert">
		     		<strong>
		     			<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
		     			<?php echo $label->UstedNoTiene; ?>
		     			<?php echo $label->MinusculaPermiso; ?>
		     			<?php echo $label->Para; ?>
		     			<?php echo $label->MinusculaAnular; ?> 
		     			<?php echo $label->Este; ?> 
		     			<?php echo $label->MinusculaProducto; ?>
		     		</strong>
		     	</div>
		     	

				  <div class="form-group">

				    <input type="text" class="form-control" id="exampleInputEmail1" name="user" placeholder="<?php echo $label->LoginEmail; ?>">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="exampleInputPassword1" name="clave" placeholder="<?php echo $label->LoginClave; ?>">
				  </div>
				 
				</form>
		      <?php 
		  			} 
		      ?>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" onclick="enviarFormulario('formAnularProducto');" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>

	    </div>
	  </div>
	</div>


	<!--MODAL PRODUCTO TOTAL EXISTENTE-->
	<!-- Small modal -->
	<div class="modal fade bs-example-modal-sm-producto-total-existente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-danger text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <?php echo $label->Cantidad; ?>  <?php echo $label->Maxima; ?> </h4>
		      </div>
		      <div class="modal-body">
		     <p class="text-center text-danger"><strong><?php echo $label->SeHaExcedidoLaCantidadMaximaDisponibleDeEsteProducto; ?> <span id="diferenciaM" class="badge"></span> <?php echo $label->MinusculaUnidad; ?>
		     									<?php echo $label->LaCantidadDisponible; ?> <span id="maximaM" class="badge"></span>
		     									</strong></p> 
		      </div>
	    </div>
	  </div>
	</div>

<?php
	require_once("footer.php");
?>
	