<?php
	require_once("header.php");
	$paso2 = false;
	if (isset($_POST)) {
		if (isset($_POST["grupo_id"])) {
			$paso2 = true;
		}
		$resp = $permiso->setGrupo($_POST);
	}
	
?>
<script >
	$("html").ready(function () { ActivarEnlaceMenu("idMenuFactura","active",""); });
</script>

	<?php if (isset($resp)) {
	  		if ($resp == '1') {
	  			unset($_POST);
	  			$paso2 = false;
	  	?>
	  		<div class="alert alert-info text-center" role="alert">
	  			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong><?php echo $label->ProcesadaSolicitud; ?></strong></div>
	  	<?php }  	} ?>
	  

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class=" <?php if (!$paso2) { ?> active <?php } ?>"><a href="#home" id="paso1" aria-controls="home" role="tab" data-toggle="tab"><?php echo $label->Paso; ?> 1</a></li>
    <li role="presentation" class=" <?php if ($paso2) { ?> active <?php } ?>"><a href="#profile" id="paso2" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $label->Paso; ?> 2</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if (!$paso2) { ?> active <?php } ?>" id="home">

    	<div class="page-header">
	        <h1><?php echo $label->Paso; ?> 1 <?php echo $label->De; ?> 2<small> <?php echo $label->SeleccionDel; ?> <?php echo $label->MinusculaGrupo; ?></small></h1>
	    </div>

	    <form action="" method="post" id="formGrupoPermisos">
		  <div class="form-group">
		    <label for="idGrupo">

		    	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
        		<span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        		<?php echo $label->Nuevo; ?> <?php echo $label->Grupo; ?></button>

        	</label>

		    <select class="form-control" id="idGrupo"name="grupo_id">
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
		  
		</form>

    </div>
    
    <div role="tabpanel" class="tab-pane <?php if ($paso2) { ?> active <?php } ?>" id="profile">

    	<form action="" method="post" id="formPermisoPaso2">
		 <input type="hidden" id="idGrupoPermiso" name="grupo_id" value="<?php if (isset($_POST["grupo_id"])) { echo $_POST["grupo_id"]; } ?>">
		 <input type="hidden" id="idAddPermiso" name="idAddPermiso">
    	<?php  
    		if (isset($_POST["grupo_id"])) {
	
    	?>
    	<div class="page-header">
	        <h1><?php echo $label->Paso; ?> 2 <?php echo $label->De; ?> 2<small> <?php echo $label->Editar; ?> <?php echo $label->MinusculaPermiso; ?></small></h1>
	    </div>

    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    		  <!--MARCAR TODOS-->
		       	    <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					         	<?php echo $label->SeleccionarTodo; ?>
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
					      <div class="panel-body">
					       
					       <div class="table-responsive">
							  <table class="table  table-hover">

							  		<tr>
							  			<th >
					         			<?php echo $label->MayusculaSeleccionar; ?>
							  			</th>
							  			<th class="text-center"><?php echo $label->MayusculaEditar; ?></th>
							  			<th class="text-center"><?php echo $label->MayusculaEliminar; ?></th>
							  			<th class="text-center"><?php echo $label->MayusculaBloquear; ?></th>
							  			<th class="text-center"><?php echo $label->MayusculaEscribir; ?></th>
							  			<th class="text-center"><?php echo $label->MayusculaLeer; ?></th>
							  			<th class="text-center"><?php echo $label->MayusculaTodo; ?></th>
							  		</tr>

							  		<tr>
							  			<th ><?php echo $label->Seleccionar; ?></th>
							  			
							  			<td class="text-center"><input type="checkbox" id="seleccionarMarcarEditarTodo" onclick="marcarDesmarcarCheckBox('seleccionarMarcarEditarTodo','marcarEditar');" class="marcar" ></td>
							  			<td class="text-center"><input type="checkbox" id="seleccionarMarcarEliminarTodo" onclick="marcarDesmarcarCheckBox('seleccionarMarcarEliminarTodo','marcarEliminar');" class="marcar" ></td>
							  			<td class="text-center"><input type="checkbox" id="seleccionarMarcarBloquearTodo" onclick="marcarDesmarcarCheckBox('seleccionarMarcarBloquearTodo','marcarBloquear');" class="marcar" ></td>
							  			<td class="text-center"><input type="checkbox" id="seleccionarMarcarEscribirTodo" onclick="marcarDesmarcarCheckBox('seleccionarMarcarEscribirTodo','marcarEscribir');" class="marcar" ></td>
							  			<td class="text-center"><input type="checkbox" id="seleccionarMarcarLeerTodo" onclick="marcarDesmarcarCheckBox('seleccionarMarcarLeerTodo','marcarLeer');" class="marcar" ></td>
							  			
							  			<td class="text-center"><input type="checkbox" id="seleccionarRowTodo" onclick="marcarDesmarcarCheckBox('seleccionarRowTodo','marcar,.marcarLeer,.marcarEscribir,.marcarBloquear,.marcarEliminar,.marcarEditar');"></td>

							  		</tr>
							  		
							  </table>
							</div>

					      </div>
					    </div>
					  </div>
    		  <?php 
    		  		$c=0;
    		  		$c1=0;
		         	$query = $permiso->getSeccion();
		         	while ($result = $query->fetch_object()) {
		         		$c+=1;
		       ?>
		       	   

	    		  <!--CABECERA DEL ARCORDION-->
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne<?php echo $c; ?>">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $c; ?>" aria-expanded="<?php if($c == 1){ ?> true <?php }else{ ?> false <?php } ?>" aria-controls="collapseOne<?php echo $c; ?>">
				          <?php echo $result->nombre; ?>
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne<?php echo $c; ?>" class="panel-collapse collapse <?php if($c == 1){ ?> in <?php } ?>" role="tabpanel" aria-labelledby="headingOne<?php echo $c; ?>">
				      <div class="panel-body">
				        
				      	<div class="table-responsive">
						  <table class="table  table-hover">

						  		<tr>
						  			<th ><?php echo $label->MayusculaPermiso; ?></th>
						  			<th class="text-center"><?php echo $label->MayusculaEditar; ?></th>
						  			<th class="text-center"><?php echo $label->MayusculaEliminar; ?></th>
						  			<th class="text-center"><?php echo $label->MayusculaBloquear; ?></th>
						  			<th class="text-center"><?php echo $label->MayusculaEscribir; ?></th>
						  			<th class="text-center"><?php echo $label->MayusculaLeer; ?></th>
							  		<th class="text-center"><?php echo $label->MayusculaTodo; ?></th>

						  		</tr>
						  		<?php 
							         	$query1 = $permiso->getSubSeccion($result->id,$_POST["grupo_id"]);
							         	while ($result = $query1->fetch_object()) {
							         	
							       ?>
						  		<tr>
						  			<th><?php echo $result->titulo; ?></th>
						  			<td class="text-center"><input <?php if($result->editar == 1){?> checked="checked" <?php } ?> type="checkbox" value="<?php echo $result->id; ?>" name="Editar[]" class="marcarEditar marcarRow<?php echo $c1; ?>"></td>
						  			<td class="text-center"><input <?php if($result->borrar == 1){?> checked="checked" <?php } ?> type="checkbox" value="<?php echo $result->id; ?>" name="Eliminar[]" class="marcarEliminar marcarRow<?php echo $c1; ?>"></td>
						  			<td class="text-center"><input <?php if($result->bloquear == 1){?> checked="checked" <?php } ?> type="checkbox" value="<?php echo $result->id; ?>" name="Bloquear[]" class="marcarBloquear marcarRow<?php echo $c1; ?>"></td>
						  			<td class="text-center"><input <?php if($result->escribir == 1){?> checked="checked" <?php } ?> type="checkbox" value="<?php echo $result->id; ?>" name="Escribir[]" class="marcarEscribir marcarRow<?php echo $c1; ?>"></td>
						  			<td class="text-center"><input <?php if($result->leer == 1){?> checked="checked" <?php } ?> type="checkbox" value="<?php echo $result->id; ?>" name="leer[]" class="marcarLeer marcarRow<?php echo $c1; ?>"></td>
						  			
						  			<td class="text-center"><input type="checkbox" id="seleccionarRow<?php echo $c1; ?>" onclick="marcarDesmarcarCheckBox('seleccionarRow<?php echo $c1; ?>','marcarRow<?php echo $c1; ?>');"></td>

						  		</tr>
						  		<?php 
						  			$c1+=1;
						  			} ?>
						  </table>
						</div>

				      </div>
				    </div>
				  </div>

			  <?php	
		         }
		       ?>
    </div>
    <?php } ?>
     </form>
  </div>

</div>
</div>
<nav>
  <ul class="pager">
    <li id="previos" class="previous disabled"><a href="contenidoWizard.php"><span aria-hidden="true">&larr;</span> <?php echo $label->Atras; ?></a></li>
    <li id="next" onclick="manejarBotonesSiguienteAtrasFin('previos','previous','next');" class="next"><a href="javascript:;"><?php echo $label->Siguiente; ?> <span aria-hidden="true">&rarr;</span></a></li>
    <li id="fin" class="next hidden"><a href="javascript:;" id="idFin"><?php echo $label->Finalizar; ?></a></li>
  </ul>
</nav>

      <!--MODAL ADD-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicons glyphicons-group" aria-hidden="true"></span> <?php echo $label->Nuevo; ?> <?php echo $label->MinusculaGrupo; ?></h4>
		      </div>
		      
		      <div class="modal-body">
		        <form action="" id="formIdGrupoadd" method="post">
		        	<input type="hidden" value="1" name="add" id="grupoValido"><input type="hidden">
		        	
	      			  <div id="idDivGrupoadd" class="form-group">
			            <label for="idGrupoadd" class="control-label"><?php echo $label->Grupo; ?>:</label>
			            <input type="text" name="grupo" class="form-control" id="idGrupoadd" placeholder="<?php echo $label->Nombre; ?> <?php echo $label->MinusculaGrupo; ?>">
						<span id="idSpanGrupoadd" class="" aria-hidden="true"></span>
						<div id="idMsjGrupoadd" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUnNombre; ?> <?php echo $label->MinusculaGrupo; ?>.</div>
						<div id="idMsjGrupoExisteadd" class="alert alert-danger ocultar" role="alert"><?php echo $label->El; ?> <?php echo $label->MinusculaGrupo; ?> <?php echo $label->YaExiste; ?>.</div>
			          </div>

		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
		        <button type="button" id="guardarGrupoadd" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Nuevo; ?> </button>
		      </div>
		    </div>
		  </div>
		</div>

<?php
	require_once("footer.php");
?>
	