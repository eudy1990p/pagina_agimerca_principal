<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand" style="padding-top: 0.5em;">
                <a title="Clic para la página principal (www.agimerca.com)" href="http://www.agimerca.com">
                    <img src="img/mm.png" width="50" />
                </a>
            </div>
            
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.agimerca.com"  title="Clic para la página principal (www.agimerca.com)">
               Agimerca</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li class="active" id="idMenuFactura">
              <a href="inicio.php" title="Clic para ir al inicio de la red social"
              class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>">
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              <?php echo $label->MenuFactura; ?>
              </a>
            </li>

						 <li class="dropdown"  title="Aquí se encuentran las opciones para configurar su cuenta" id="idMenuAjuste">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $label->MenuAjuste; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="cambiar_mis_datos.php" title="Clic para cambiar datos de mi información"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Modificar información"; ?>
                  </a>
                </li>
                  <li class="divider"></li>
                  <li>
                  <a href="cambiar_clave.php" title="Clic para cambiar clave de mi usuario"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Cambiar Contrase&ntilde;a"; ?>
                  </a>
                </li>
								<li class="divider"></li>
								 <li>
                  <a href="galeria_imagenes.php" title="Clic para ir a la galeria de mis imagenes "
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Ver albunes"; ?>
                  </a>
                </li>
                <li class="divider"></li>
								 <li>
                  <a href="galeria_videos.php"  title="Clic para ir a la galeria de mis videos "
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Mis videos"; ?>
                  </a>
                </li>
                <li class="divider"></li>
								 <li>
                  <a href="publicaciones.php" title="Clic ir a Mi pefil "
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Mis publicaciones"; ?>
                  </a>
                </li>
                
								<li class="divider"></li>
								 <li>
                  <a href="categoria.php"  title="Administración del rol o interes de la persona"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Roll (Categoria)"; ?>
                  </a>
                </li>
               
								<li class="divider"></li>
								 <li>
                  <a  title="Administración de los sectores productos" href="sectores.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Sector (Sub Categoria)"; ?>
                  </a>
                </li>
								
								<li class="divider"></li>
								 <li>
                  <a title="Administración de los productos" href="productos.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Producto (Sub Sub Categoria)"; ?>
                  </a>
                </li>
								
								<li class="divider"></li>
								 <li title="Administración de las categorias o quien eres o rol que desempeñas para los productos">
                  <a href="relaciones_categorias.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Relaciones de categorias"; ?>
                  </a>
                </li>
								
								
              </ul>
							 
            </li>
						<?php if ( isset($_SESSION["id"]) ) { ?>
							<li  title="Clic para salir de la red social" id="idMenuFactura">
								<a href="index.php?deslogueo="
								class=" ">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
								<?php echo "Salir"; ?>
								</a>
							</li>
						<?php }else{ ?>
							<li title="Clic para entrar a la red social" id="idMenuFactura">
								<a href="index.php"
								class=" ">
								<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								<?php echo "Entrar"; ?>
								</a>
							</li>
						<?php } ?>
					

          </ul>
					
					<form action="busqueda_normal.php" method="post" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" title="Inserte el nombre del producto" name="busqueda_post" class="form-control" placeholder="Palabra a buscar">
							</div>
                            <?php require_once("vista_buscado_categoria.php"); ?>
                            <!-- Single button -->
                                <div class="btn-group">
                                  <button title="Boton para buscar, cuenta con dos opciones, 1 normal que busca de manera generica tanto en las noticias como en los productos" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Busqueda <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><button title="Clic para la busqueda normal" style="display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;width: 100%;text-align: left;
    text-decoration: none;" type="submit" class="btn-link">Normal</button></li>
                                <li><a  title="Clic para ir a la busqueda avanzada" href="busqueda_normal.php?opcionesAvanzadas=si">Avanzada</a></li>
                                    
                                  </ul>
                                </div>
                            <!--div class="dropdown">
                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                               <span class="glyphicon glyphicon-search"></span> Busqueda
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><button type="submit" class="btn-link">Normal</button></li>
                                <li><a href="busqueda_normal.php?opcionesAvanzadas=si">Avanzada</a></li>
                              </ul>
                            </div>
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button>
							<a href="busqueda_normal.php?opcionesAvanzadas=si"  class="btn btn-default">Busqueda Avanzada</a-->
						</form>
					
                    </ul>
          
          <?php if ( isset($_SESSION["id"]) ) { ?>
          <ul class="nav navbar-nav navbar-right">
              
            <li>
              <a href="mensajeria.php" title="Clic para entrar a su mensajeria" class="btn btn-xs btn-link">mensajes <span class="glyphicon glyphicon-envelope"></span>
              <span class="badge">
                <?php 
                  $c = new Conexion();

                  $id_usuario = $_SESSION['id'];

                  $sql = "select count(*) as `mensajes` from mensajes_privados where visto=false and para_user_id=$id_usuario";

                  $resultado= mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

                  if($datos = mysqli_fetch_row($resultado)){
                    echo $datos[0];
                  }

                ?>
              </span>
              </a>
            </li>
              
              <li>  <a href="publicaciones.php" title="Clic para ver mi perfil" ><img 
              width="20" height="20"
              class="img-circle" src="<?php echo $_SESSION["img_perfil"]; ?>" /> <?php   echo $_SESSION['usuario'];  ?></a></li>
          </ul>
          <?php } ?>
					
        </div><!--/.nav-collapse -->
      </div>
    </nav>


      <!--MODAL NO TIENE PERMISO-->
  <!-- Small modal -->

  <div class="modal fade bs-example-modal-sm-no-tiene-permisos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4  class="modal-title text-warning text-center" id="exampleModalLabel"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> <?php echo $label->Permiso; ?></h4>
          </div>
          
          <div class="modal-body">
         <p class="text-warning text-center"><strong><?php echo $label->UstedNoTiene; ?> <?php echo $label->MinusculaPermiso; ?></strong></p> 
          </div>
      </div>
    </div>
  </div>

<?php if (isset($_SESSION["cambio"]) && $_SESSION["cambio"] == 1) { ?> 
 <!--MODAL ADD-->
      <div class="modal fade" id="exampleModalCambiarClave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $label->CambiarClave; ?></h4>
          </div>
          
          <div class="modal-body">
            <form action="" id="formIdCambiarClave" method="post">
              <input type="hidden" value="<?php echo $_SESSION["id"]; ?>" name="cambiarClave">
              

              <div id="idDivCambioClave" class="form-group">
                <label for="idCambioClave" class="control-label"><?php echo $label->Clave; ?>:</label>
                <input type="password" name="clave" class="form-control" id="idCambioClave">
                <span id="idSpanClave" class="" aria-hidden="true"></span>
                <div id="idMsjClave" class="alert alert-danger ocultar" role="alert"><?php echo $label->IntroduzcaUna; ?> <?php echo $label->MinusculaClave; ?> <?php echo $label->MinusculaSegura; ?>.</div>
              </div>
              
              <div id="idDivCambioClaveRepetir" class="form-group">
                <label for="idCambioClaveRepetir" class="control-label"><?php echo $label->Repetir; ?> <?php echo $label->MinusculaClave; ?>:</label>
                <input type="password" name="clave2" class="form-control" id="idCambioClaveRepetir">
                <span id="idSpanClaveR" class="" aria-hidden="true"></span>
                <div id="idMsjClaveR" class="alert alert-danger ocultar" role="alert"><?php echo $label->Clave; ?> <?php echo $label->NoCoinsiden; ?>.</div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> <?php echo $label->Cancelar; ?> </button>
            <button type="button" id="cambiarClaveBtn" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> <?php echo $label->Guardar; ?> </button>
          </div>
        </div>
      </div>
    </div>

<?php } ?>