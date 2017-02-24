<?php
require_once("class/class_ini.php"); 
$query = $producto->getDetalleProducto($_POST);
?>

<div class="table-responsive">
          <table class="table table-striped">
            <thead>
            
              <tr>

                <th><?php echo $label->IconoNumero; ?></th>
                <th class="text-center"><?php echo $label->Opcion; ?></th>
                <th><?php echo $label->MayusculaCantidad; ?></th>
                <th><?php echo $label->MayusculaPrecio; ?> <?php echo $label->MayusculaCompra; ?></th>
                <th><?php echo $label->MayusculaFecha; ?></th>

              </tr>
            
            </thead>
            <tbody>
              
              <?php 
		         $c=0;
		         while ($result = $query->fetch_object()) { $c++;
		      ?>
		       
		       <tr >
                <td><?php echo $c; ?></td>
                <td class="">
                	
                	<button type="button" onclick="opcionUser('bs-example-modal-sm-anular','<?php echo $result->id; ?>','anular');" class="btn btn-link"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 
                		<?php echo $label->Anular; ?></button><br/>
                	
                </td>

                <td><?php echo $result->cantidad; ?></td>
                <td><?php echo $result->precio_compra; ?></td>
                <td><?php echo $result->f_c; ?></td>
              </tr>
		     <?php	
		        }
		     ?>
              

            </tbody>
          </table>
        </div>