<?php $array =$usuario->getDatoUserId($_SESSION["id"]);
?>
<div class="row">
		<div class="col-xs-12">

			<div class="row">
				<div class="col-xs-12"> <br/>
				<h1>Información </h1>
				</div>
				<div class="col-xs-12"><br/>
				<!-- Aqui va codigo php -->
				    <form class="form-horizontal">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <p class="form-control-static">
                              <?php echo $array["correo"]; ?>
                            </p>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Teléfono</label>
                        <div class="col-sm-10">
                          <p class="form-control-static">
                              <?php echo $array["telefono"]; ?>
                            </p>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Sobre mi</label>
                        <div class="col-sm-10">
                          <p class="form-control-static">
                              <?php echo $array["descripcion"]; ?>
                            </p>
                        </div>
                      </div>
                    
                         <div class="form-group">
                        <label class="col-sm-2 control-label">Video</label>
                        <div class="col-sm-10">
                          <p class="form-control-static">
                              <?php echo $array["embed_video"]; ?>
                            </p>
                        </div>
                      </div>
                    </form>
                    
				</div>
					
			</div>

	</div>
	
</div>
