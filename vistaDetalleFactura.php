<?php
require_once("class/class_ini.php"); 
    $resp = $factura->detalleFactura($_POST);
?>

<?php $totales = $factura->getTotalCotizacion();  $datoEmpresa = $empresa->getDatosEmpresa(); ?>


      <?php  
        if (isset($_POST["add"])) {
  
      ?>
      
      <div class="" id="accordion" role="tablist" aria-multiselectable="true" style="width:70%;">
        <div class="row">
          <div class="col-md-2 col-md-offset-10">
          <button type="button" onclick="opcionUser('bs-example-modal-sm-anular','<?php echo $totales["cotizacion_id"]; ?>','anularFactura');" class="btn btn-danger">
                    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 
                    <?php echo $label->Anular; ?>
                  </button>
                </div>
        </div>
        
        <div class="media">
          
          <div class="media-left ">
            
              <img class="media-object" src="
                <?php echo $datoEmpresa["icono"]; ?>
              " alt="icono empresa">
           
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
                
                <?php echo $totales["noFactura"]; ?>
                

            </small></p>
            <p><small>
                <strong><?php echo $label->Fecha; ?></strong> 
                <?php echo $totales["fecha"]; ?>
              </small></p>
            <p><small>
                <strong><?php echo $label->Fecha; ?> <?php echo $label->MinusculaFacturacion; ?></strong> 
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
                      <th colspan="4" ><?php echo $label->Sub; ?> <?php echo $label->MinusculaTotal; ?></th>
                      <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["monto"],2); ?></th>
                  </tr>
                  <tr>
                      <th  colspan="4"  ><?php echo $label->Itbis; ?></th>
                      <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["itbis"],2); ?></th>
                  </tr>
                  <tr>
                      <th  colspan="4"  ><?php echo $label->Total; ?></th>
                      <th> <?php echo $label->IconoMoneda; ?> <?php echo number_format($totales["total"],2); ?></th>
                  </tr>
                </tfoot>
              
              </table>
            </div> 
        
      </div>
    <?php } ?>