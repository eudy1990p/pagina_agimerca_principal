<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand" style="padding-top: 0.5em;">
                <a href="http://www.agimerca.com">
                    <img src="img/mm.png" width="50" />
                </a>
            </div>
            
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.agimerca.com">
               Agimerca</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li class="active" id="idMenuFactura">
              <a href="inicio.php"
              class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>">
              <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
              <?php echo $label->MenuFactura; ?>
              </a>
            </li>

						 <li class="dropdown" id="idMenuAjuste">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $label->MenuAjuste; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="cambiar_mis_datos.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Modificar información"; ?>
                  </a>
                </li>
                  <li class="divider"></li>
                  <li>
                  <a href="cambiar_clave.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Cambiar Contrase&ntilde;a"; ?>
                  </a>
                </li>
								<li class="divider"></li>
								 <li>
                  <a href="galeria_imagenes.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Ver albunes"; ?>
                  </a>
                </li>
                <li class="divider"></li>
								 <li>
                  <a href="galeria_videos.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Mis videos"; ?>
                  </a>
                </li>
                <li class="divider"></li>
								 <li>
                  <a href="publicaciones.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ($_SESSION["tipo_usuario"] == "normal" || $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Mis publicaciones"; ?>
                  </a>
                </li>
                
								<li class="divider"></li>
								 <li>
                  <a href="categoria.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Roll (Categoria)"; ?>
                  </a>
                </li>
               
								<li class="divider"></li>
								 <li>
                  <a href="sectores.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Sector (Sub Categoria)"; ?>
                  </a>
                </li>
								
								<li class="divider"></li>
								 <li>
                  <a href="productos.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Producto (Sub Sub Categoria)"; ?>
                  </a>
                </li>
								
								<li class="divider"></li>
								 <li>
                  <a href="relaciones_categorias.php"
                   class="<?php if (isset($_SESSION["tipo_usuario"]) && ( $_SESSION["tipo_usuario"] == "admin") ) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <?php echo "Relaciones de categorias"; ?>
                  </a>
                </li>
								
								
              </ul>
							 
            </li>
						<?php if ( isset($_SESSION["id"]) ) { ?>
							<li id="idMenuFactura">
								<a href="index.php?deslogueo="
								class=" ">
								<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								<?php echo "Salir"; ?>
								</a>
							</li>
						<?php }else{ ?>
							<li id="idMenuFactura">
								<a href="index.php"
								class=" ">
								<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								<?php echo "Entrar"; ?>
								</a>
							</li>
						<?php } ?>
						
						
						<!--
            <li id="idMenuProducto">
              <a href="producto.php"
               class="<?php if (isset($_SESSION["permisos"]["manejarproducto"]) && $_SESSION["permisos"]["manejarproducto"]["leer"] == 1) { ?><?php }else{ ?>sinPrivilegios <?php } ?>">
              <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
              <?php echo $label->MenuProducto; ?>
              </a>
          </li>
           <!-- <li><a href="#contact">Contact</a></li> --
            <li class="dropdown" id="idMenuAdministrador">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">  
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
               <?php echo $label->MenuAdministrador; ?> <span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu" role="menu">
                
                <li>
                  <a href="administradorAnularFactura.php"
                   class="<?php if (isset($_SESSION["permisos"]["anularfactura"]) && $_SESSION["permisos"]["anularfactura"]["leer"] == 1) { ?><?php }else{ ?>sinPrivilegios <?php } ?>"
                  >
                  <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                  <?php echo $label->MenuAdministradorAnularFactura; ?>
                  </a>
                </li>
                
                <!--<li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              --
              </ul>
            </li>

            <li class="dropdown" id="idMenuAjuste">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $label->MenuAjuste; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="ajusteUsuario.php"
                   class="<?php if (isset($_SESSION["permisos"]["usuario"]) && $_SESSION["permisos"]["usuario"]["leer"] == 1) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <?php echo $label->MenuAjusteUsuario; ?>
                  </a>
                </li>
                
                <li>
                  <a href="ajustePermisos.php"
                   class="<?php if (isset($_SESSION["permisos"]["permiso"]) && $_SESSION["permisos"]["permiso"]["leer"] == 1) { ?> <?php }else{ ?>sinPrivilegios <?php } ?>"
                  > 
                  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> 
                  <?php echo $label->MenuAjustePermiso; ?>
                  </a>
                </li>
                
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>-->

          </ul>
					
					<form action="busqueda_normal.php" method="post" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" name="busqueda_post" class="form-control" placeholder="Buscar post">
							</div>
							<button type="submit" class="btn btn-default">Buscar</button>
							<a href="busqueda_normal.php?opcionesAvanzadas=si"  class="btn btn-default">Busqueda Avanzada</a href="">
						</form>
					
                    </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="mensajeria.php" class="btn btn-xs btn-link">mensajes <span class="glyphicon glyphicon-envelope"></span>
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
          </ul>
					
					
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