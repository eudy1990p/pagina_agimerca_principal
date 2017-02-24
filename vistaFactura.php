<?php

	require_once("headerImprimir.php");
	$paso2 = false;
	if (isset($_REQUEST)) {

		if ($_REQUEST["add"] == "factura") {
			$resp = $factura->imprimirFactura($_REQUEST);			
		}else{
			$resp = $factura->exportarCotizacioin($_REQUEST);
		}
		
	}
?>
<?php $totales = $factura->getTotalCotizacion();  $datoEmpresa = $empresa->getDatosEmpresa(); ?>


    	<form action="" method="post" id="formPermisoPaso2">
		<input type="hidden" id="cotizacion_id" name="cotizacion_id" value="<?php if (isset($totales["cotizacion_id"])) { echo $totales["cotizacion_id"]; } ?>"> 

    	<?php  
    		if (isset($_REQUEST["add"])) {
	
    	?>
    	
    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    		
    		<div class="media">
				  <?php 
				  		if ($_REQUEST["add"] == "factura") {
				  	?>
				  <div class="media-left ">
				    
				      <img class="media-object" src="
			  				<?php echo $datoEmpresa["icono"]; ?>
				      " alt="icono empresa">
				   
				  </div>
				  <?php 
				     	}
				    ?>
				  <div class="media-body">
				  	<?php 
				  		if ($_REQUEST["add"] == "factura") {
				  	?>
				    <h4 class="media-heading text-center">
			  				<?php echo $datoEmpresa["nombre"]; ?>
				     </h4>
				    <?php 
				  		}else{
				  	?>
				     <p class="text-center" style="font-size:300%">
				    	<small>
			  				<?php echo $datoEmpresa["nombre"]; ?>
			  			</small>
				    </p>
				    <?php } ?>
				    <p class="text-center">
				    	<small>
			  				<?php echo $datoEmpresa["direccion"]; ?>
			  			</small>
				    </p>
				    <p class="text-center">
				    	<small><?php echo $label->Telefono; ?> 
			  				<?php echo $datoEmpresa["telefono1"]; ?>
				    		 / 
			  				<?php echo $datoEmpresa["telefono2"]; ?>
				    		</small>
				    </p>
				    <p class="text-center">
				    	<small><?php echo $label->Fax; ?> 
			  				<?php echo $datoEmpresa["fax1"]; ?>
				    		 / 
			  				<?php echo $datoEmpresa["fax2"]; ?>
				    		</small>
				    </p>
				    <p class="text-center">
				    	<small><?php echo $label->Email; ?> 
			  				<?php echo $datoEmpresa["email"]; ?>
				    		</small>
				    </p>
				     <p class="text-center">
				    	<small><?php echo $label->Web; ?> 
			  				<?php echo $datoEmpresa["web"]; ?>
				    	</small>
				    </p>
				  </div>
				  <div class="media-right ">
				  	<p><small>
				  			<strong><?php echo $label->RNC; ?></strong>
			  				<?php echo $datoEmpresa["rnc"]; ?>
				  	</small></p>
				  	<p><small>
				  			<strong><?php echo $label->No; ?></strong> 
				  			<?php 
				  				if ($_REQUEST["add"] == "factura") {
				  			?>
			  				<?php echo $totales["noFactura"]; ?>
			  				<?php 
				  				}else{
				  			?>
			  				<?php echo $totales["cotizacion_id"]; ?>

			  				<?php } ?>

				  	</small></p>
				    <p><small>
				    		<strong><?php echo $label->Fecha; ?></strong> 
			  				<?php echo $totales["fecha"]; ?>
				    	</small></p>
				    <p><small>
				    		<strong><?php echo $label->Fecha; ?> <?php  if ($_REQUEST["add"] == "factura") { echo $label->MinusculaFacturacion; }else{ echo $label->Cotizacion; } ?></strong> 
			  				<?php echo $totales["fechaFactura"]; ?>
				    	</small></p>
				  </div>
			</div>

    		<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?php echo $label->Cliente; ?> <?php echo $label->No; ?> 
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

				         	if ($_REQUEST["add"] == "factura") { $factura->descontarProductoInventario($result->id,$result->cantidad);	}
				      ?>
				       
				       <tr>
		                <td><?php echo $c; ?></td>
		            
		                <td><?php echo $result->nombre; ?></td>
		                <td><?php echo $result->cantidad; ?></td>
		                <td> <?php echo $label->IconoMoneda; ?> <?php echo number_format($result->precio,2); ?></td>
		                <td> <?php echo $label->IconoMoneda; ?> <?php echo number_format($result->sub_total,2); ?></td>
		              </tr>
				     <?php	
				        }
				     ?>
		              
		            </tbody>
		            <tfoot>
		            	<tr>
			            	 <?php if ($_REQUEST["add"] == "factura") {}else{ ?> <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th> <?php } ?> 
			                <th <?php if ($_REQUEST["add"] == "factura") { ?> colspan="4" <?php } ?> ><?php echo $label->Sub; ?> <?php echo $label->MinusculaTotal; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["monto"],2); ?></th>
		            	</tr>
		            	<tr>
		            		<?php if ($_REQUEST["add"] == "factura") {}else{ ?> <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th> <?php } ?>
			                <th <?php if ($_REQUEST["add"] == "factura") { ?> colspan="4" <?php } ?> ><?php echo $label->Itbis; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["itbis"],2); ?></th>
		            	</tr>
		            	<tr>
		            		<?php if ($_REQUEST["add"] == "factura") {}else{ ?> <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th> <?php } ?>
			                <th <?php if ($_REQUEST["add"] == "factura") { ?> colspan="4" <?php } ?> ><?php echo $label->Total; ?></th>
			                <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["total"],2); ?></th>
		            	</tr>
		            </tfoot>
		          
		          </table>
		        </div> 
    		
    	</div>
    <?php } ?>
     </form>
 




<?php
	require_once("footerImprimir.php");
?>
	