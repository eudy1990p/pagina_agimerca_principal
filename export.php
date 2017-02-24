<?php
	require_once("headerImprimir.php");
	if (isset($_POST)) {
		$resp = $usuario->setUsario($_POST);
	}
?>




<script type='text/javascript' src='js/jquery-git2.js'></script>


<script >
	$("html").ready(function () { ActivarEnlaceMenu("idMenuAjuste","dropdown active","<?php echo $label->AjusteUsuarioTituloVenta; ?>"); });
</script>


	  <div class="page-header">
	  	<?php if (isset($resp)) {
	  		if ($resp == '1') {
	  	?>
	  		<div class="alert alert-info text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ProcesadaSolicitud; ?></strong></div>
	  	<?php }  	} ?>
	  
        <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $label->AjusteUsuarioTitulo; ?></h1>
	        
	        <div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    Exportar
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="$('#exportTable').tableExport({type:'excel',escape:'false',ignoreColumn: [1] });"
				    	>EXCEL</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="$('#exportTable').tableExport({type:'doc',escape:'false',ignoreColumn: [1],htmlContent:'false' });"
				    	>WORD</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="$('#exportTable').tableExport({type:'csv',escape:'false',ignoreColumn: [1] });"
				    	>CSV</a></li>

				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="htmltopdf();"
				    	>PDF</a></li>
				    	
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;" 
				    	onClick ="$('#exportTable').tableExport({type:'txt',escape:'false',ignoreColumn: [1] });"
				    	>TXT</a></li>
				  </ul>
			</div>

        <div class="row">
        	<?php $query = $usuario->getUsuarios(); ?>
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
         <div id="exportTable" class="table-responsive">
         	<h3>Prueba de titulo</h3>
          <table  class="table table-striped">
            <thead>
           
              <tr>

                <th><?php echo $label->IconoNumero; ?></th>
                <th class="text-center"><?php echo $label->Opcion; ?></th>
                <th><?php echo $label->MayusculaUsuario; ?></th>
                <th><?php echo $label->MayusculaGrupo; ?></th>
                <th><?php echo $label->MayusculaFechaCreado; ?></th>
                <th><?php echo $label->MayusculaCreadoPor; ?></th>
              </tr>
            
            </thead>
            <tbody>
              
              <?php 
		         $c=0;
		         while ($result = $query->fetch_object()) { $c++;
		      ?>
		       
		       <tr <?php if($result->estado == "bloqueado"){ ?> class="warning text-warning" <?php } ?> >
                <td><?php echo $c; ?></td>
                <td class="">
                		<?php 
                			if ( $result->estado == "activo") {
                		?>
                		<button type="button" onclick="opcionUser('bs-example-modal-sm-bloquear','<?php echo $result->id; ?>','bloquear');" class="btn btn-link"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 
                			<?php echo $label->Bloquear; ?></button>
                		<?php	
                			}else if( $result->estado == "bloqueado"){
                		?>
                		<button type="button" onclick="opcionUser('bs-example-modal-sm-desbloquear','<?php echo $result->id; ?>','desbloquear');" class="btn btn-link"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 
                			<?php echo $label->Desbloquear; ?></button>

                		<?php
                			}
                		?>
                	</button><br/>
                	<button type="button" onclick="opcionUser('bs-example-modal-sm-eliminar','<?php echo $result->id; ?>','eliminar');" class="btn btn-link"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                		<?php echo $label->Eliminar; ?></button><br/>
                	<button type="button"onclick="getInfoUserEdit('<?php echo $result->id; ?>');" class="btn btn-link"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                		<?php echo $label->Editar; ?></button>
                </td>
                <td><?php echo $result->user; ?></td>
                <td><?php echo $result->nombre; ?></td>
                <td><?php echo $result->f_c; ?></td>
                <td><?php echo $result->creador; ?></td>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $label->Nuevo; ?> <?php echo $label->MinusculaUsuario; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		        <form action="" id="formIdUser" method="post">
		        	<input type="hidden" value="1" name="add" id="userValido"><input type="hidden">
		        	
      			 <div id="idDivGrupo" class="form-group">
		            
		            <label for="idGrupo" class="control-label"><?php echo $label->Grupo; ?>:</label>
		            <select class="form-control" name="grupo" id="idGrupo">
		            	<option value=""><?php echo $label->SeleccioneUn; ?> <?php echo $label->MinusculaGrupo; ?> </option>
		            	<?php 
		            		$query = $usuario->getGrupos();
		            		while ($result = $query->fetch_object()) {
		            		?>
		            		<option value="<?php echo $result->id; ?>"><?php echo $result->nombre; ?></option>
		            	<?php	
		            		}
		            	?>
				        
				    </select>
					<span id="idSpanGrupo" aria-hidden="true"></span>
					<div id="idMsjGrupo" class="alert alert-danger ocultar" role="alert"><?php echo $label->SeleccioneUn; ?> <?php echo $label->MinusculaGrupo; ?>.</div>
		            
		          </div>

		          <div id="idDivUsuario" class="form-group">
		            <label for="idUsuario" class="control-label"><?php echo $label->Usuario; ?>:</label>
		            <input type="text" name="usuario" class="form-control" id="idUsuario">
					<span id="idSpanUsuario" class="" aria-hidden="true"></span>
					<div id="idMsjUsuario" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?> <?php echo $label->MinusculaUsuario; ?>.</div>
					<div id="idMsjUsuarioExiste" class="alert alert-danger ocultar" role="alert"><?php echo $label->El; ?> <?php echo $label->MinusculaUsuario; ?> <?php echo $label->YaExiste; ?>.</div>
		          </div>

		          <div id="idDivClave" class="form-group">
		            <label for="idClave" class="control-label"><?php echo $label->Clave; ?>:</label>
		            <input type="password" name="clave" class="form-control" id="idClave">
					<span id="idSpanClave" class="" aria-hidden="true"></span>
					<div id="idMsjClave" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUna; ?> <?php echo $label->MinusculaClave; ?> <?php echo $label->MinusculaSegura; ?>.</div>

		          </div>
		          
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" id="guardarUsuario" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Nuevo; ?> </button>
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
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $label->Editar; ?> <?php echo $label->MinusculaUsuario; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		        <form action="" id="formIdUserEditar" method="post">
		        	<input type="hidden" name="edit">
      				<input type="hidden" id="idEdit" name="idRegistro">

		        	
      			 <div id="idDivGrupoEditar" class="form-group">
		            
		            <label for="idGrupoEditar" class="control-label"><?php echo $label->Grupo; ?>:</label>
		            <select class="form-control" name="grupo" id="idGrupoEditar">
		            	<option value=""><?php echo $label->SeleccioneUn; ?> <?php echo $label->MinusculaGrupo; ?> </option>
		            	<?php 
		            		$query = $usuario->getGrupos();
		            		while ($result = $query->fetch_object()) {
		            		?>
		            		<option value="<?php echo $result->id; ?>"><?php echo $result->nombre; ?></option>
		            	<?php	
		            		}
		            	?>
				        
				    </select>
					<span id="idSpanGrupoEditar" aria-hidden="true"></span>
					<div id="idMsjGrupoEditar" class="alert alert-danger ocultar" role="alert"><?php echo $label->SeleccioneUn; ?> <?php echo $label->MinusculaGrupo; ?>.</div>
		            
		          </div>

		          <div id="idDivUsuarioEditar" class="form-group">
		            <label for="idUsuarioEditar" class="control-label"><?php echo $label->Usuario; ?>:</label>
		            <p  class="form-control" id="idUsuarioEditar"></p>
					<span id="idSpanUsuarioEditar" class="" aria-hidden="true"></span>
					<div id="idMsjUsuarioEditar" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?> <?php echo $label->MinusculaUsuario; ?>.</div>
		          </div>



		          <div id="idDivClaveEditar" class="form-group">
		            <label for="idClaveEditar" class="control-label"><?php echo $label->Clave; ?>:</label>
		            <input type="password" name="clave" class="form-control" id="idClaveEditar">
					<span id="idSpanClaveEditar" class="" aria-hidden="true"></span>
					<div id="idMsjClaveEditar" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUna; ?> <?php echo $label->MinusculaClave; ?> <?php echo $label->MinusculaSegura; ?>.</div>

		          </div>
		          
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?></button>
		        <button type="button" id="guardarUsuarioEditar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Nuevo; ?></button>
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
		        <h4 class="modal-title text-danger text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <?php echo $label->Eliminar; ?> <?php echo $label->MinusculaUsuario; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		      	
		     <p class="text-danger text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaEliminar; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaUsuario; ?>?</strong></p> 

		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" onclick="enviarFormulario('opcionForm');" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>

	    </div>
	  </div>
	</div>

	<!--MODAL BLOQUEAR-->
	<!-- Small modal -->

	<div class="modal fade bs-example-modal-sm-bloquear" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-warning text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <?php echo $label->Bloquear; ?>  <?php echo $label->MinusculaUsuario; ?> </h4>
		      </div>
		      
		      <div class="modal-body">
		      
		     <p class="text-warning text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaBloquear; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaUsuario; ?>?</strong></p> 


		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" onclick="enviarFormulario('opcionForm');" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
		      </div>

	    </div>
	  </div>
	</div>

	<!--MODAL DESBLOQUEAR-->
	<!-- Small modal -->

	<div class="modal fade bs-example-modal-sm-desbloquear" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4  class="modal-title text-warning text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <?php echo $label->Desbloquear; ?>  <?php echo $label->MinusculaUsuario; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		     <p class="text-warning text-center"><strong><?php echo $label->EstaSeguroQueDesea; ?> <?php echo $label->MinusculaDesBloquear; ?> <?php echo $label->Este; ?> <?php echo $label->MinusculaUsuario; ?> ?</strong></p> 
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
<script type="text/javascript" src="js/tableExport.js"></script>
<script type="text/javascript" src="js/jquery.base64.js"></script>
