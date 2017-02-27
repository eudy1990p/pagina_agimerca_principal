<form action="" method="post" id="formPublicaciones" enctype="multipart/form-data">
				<input type="hidden" id="accion" name="accion" value="agregar_post"/>
				<input type="hidden" name="add" value=""/>
				<input type="hidden" name="idpost" id="idpost" value=""/>


				<div class="row">
					<div title="Seleccione las siguientes opciones para que pueda tener mejor resultado con el producto" class="col-xs-12">
						<?php //require_once("vista_select_categorias_sub_subsub.php"); ?>
					</div>
					<div class="col-xs-12">
						<?php require_once("vista_agregar_post.php"); ?>
					</div>
					<div title="Puede agregar una imagen desde su computador" class="col-xs-6"><br/>
						Imagen <input type="file" id="imgProducto" name="imgProducto" />
					</div>				
					<div class="col-xs-6 text-right"><br/>
							<a title="Clic para cancelar la publicación" href="<?php echo $exp[(count($exp) - 1)]; ?>" class="btn btn-warning">Cancelar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
						<button title="Clic para guardar su publicación" id="btpublicar" type="submit" class="btn btn-success">Publicar</button>
					</div>

				</div>
			</form>
			