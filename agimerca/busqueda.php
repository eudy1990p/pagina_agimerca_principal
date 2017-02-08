<?php
	require_once("class/class_usuario.php");
	require_once("header.php");
	require_once("class/class_conexion.php");
	if(isset($_POST)){
		if(isset($_POST["agregar_post"])){
			
		}
	}
?>


	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<script type='text/javascript' src="js/jspdf.debug.js"></script>  	
	  
	<div class="page-header">
		        <h1><span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
		        	Galeria
		        	<!-- Esto es una variable generica que eudy utilizo.
		        		Comentado por nelson. -->
	                <!-- <?php echo $label->MenuFactura; ?> -->
	            </h1>
	</div>

	<div class="row">
		<div class="col-xs-8">

			<div class="row">
				<h1>Seccion de busqueda</h1>
			
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2>Ingresa la busqueda</h2>
					</div>
					
					<div class="panel-body">
						 <!-- by nelson -->
						<form  method="post" action="" style="margin-top: 10px;">
						    <input  class="form-control input-sm" type="text" name="txt-busqueda">
						    <br>
						    <button class="btn btn-success"  name='submit' type="submit">Buscar galeria</button>
						  </form>
						  <br>

						<?php if (isset($_POST['submit'])): 
							$c= new Conexion();
							$sql = 
							"
							select * from 
								((select * from carpeta_gallerias) union (select * from carpeta_videos)) as tabla
							where nombre like lower('%".$_POST['txt-busqueda']."%')
							";/*Tener en cuente que una busqueda simple los %% del lik tiene que ir pegados para
							que no se tomen en cuenta en la busqueda*/

							
							$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

							while($datos = mysqli_fetch_array($resultado)):
								//$usuario = new UsuariosNelson($datos['user_id_creado']);

							?>
							<!-- ==================	========================================================================== -->
							<div class='card col-xs-4'>
							  <div class='card-block'>
							    <h4 class='card-title'><?php echo $datos['nombre']; ?></h4>
							    <h6 class='card-subtitle text-muted'>Por: <?php echo $_SESSION['usuario'] ?></h6>
							  </div>
							  <img src='...' alt='Card image'>
							  <!-- <div class='card-block'> -->
							    <form action="ver_galeria.php"  method="get">
							    <button class="btn btn-warning" name="id_album" value="<?php echo $datos['id'] ?>" type="submit">Ver galeria</button>
							    </form>
							    <!-- aqui irian los me gusta y demas -->
							    <a href='#' class='card-link'>Publicado el : <?php echo $datos['fecha_creado'] ?></a>
							  </div>
							</div>
							<!-- ============================================================================================ -->
						<?php endwhile; endif ?>

					</div>
				</div>

<div class="col-md-12 text-center"><h3>Ultimas entradas</h3></div>
<!-- Se establece el tamaño en 12 en un principio -->
<div class="col-md-12">
	<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
	  <div class="carousel-inner">

	
		<?php 

		$c= new Conexion();
			$sql = 
			"
			select posts.*,max(posts.fecha_creado),usuarios.id as usuario,usuarios.user as autor
			from posts join usuarios on posts.user_id_creado=usuarios.id
			group by posts.fecha_creado desc limit 20; 
			";

			
			$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

			while($datos = mysqli_fetch_array($resultado)):
				static $c=0;
			?>
			<!-- ==================	========================================================================== -->
			<!-- Solo debe haber un item con la clase active -->
		<div class="item <?php if($c==1)echo "active";$c++; ?>">
			<div class="card col-xs-3 alert" id="carta">
		  <img class="card-img-top img-responsive" src="<?php echo $datos['img_url'] ?>">
		  <div class="card-block">
		    <!-- <h4 class="card-title"></h4> -->
		    <p class="card-text" style="max-height: 40px;overflow: hidden;"><?php echo $datos['post']; ?></p>
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item">
		    <form action="pagina para ver post" method="post">
		    	<button class="btn btn-block btn-info" name="id_publicacion" value="<?php echo $datos['id'] ?>">
		    	ver publicacion
		    	</button>
		    </form>
		    </li>
		    <li class="list-group-item">
		    <form action="pagina para ver usuario" method="post">
		    	<button class="btn btn-block btn-link" name="id_usuario" value="<?php echo $datos['usuario'] ?>">
		    	autor: <?php echo $datos['autor'] ?>
		    	</button>
		    </form>
		    </li>
		  </ul>
		  <div class="card-block">
		    <p class="alert alert-info">Fecha: <?php echo $datos['fecha_creado'] ?></p>
		  </div>
		</div>
	    </div>


			<!-- ============================================================================================ -->
		<?php endwhile;?>




	  </div>
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	</div>
</div>
<style type="text/css">
	.carousel-control 			 { width:  4%; }
.carousel-control.left,.carousel-control.right {margin-left:15px;background-image:none;}
@media (max-width: 767px) {
	.carousel-inner .active.left { left: -100%; }
	.carousel-inner .next        { left:  100%; }
	.carousel-inner .prev		 { left: -100%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }

}
@media (min-width: 767px) and (max-width: 992px ) {
	.carousel-inner .active.left { left: -50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		 { left: -50%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }
	.active > div:first-child + div { display:block; }
}
@media (min-width: 992px ) {
	.carousel-inner .active.left { left: -25%; }
	.carousel-inner .next        { left:  25%; }
	.carousel-inner .prev		 { left: -25%; }	
}

#carta{
	margin: 2px
	border-radius: 2px;
	border: 1px solid gray;
}
</style>
<script type="text/javascript">
	$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>

			</div>

			<hr/>
	</div>



	<div class="col-xs-4">
		
	<?php require_once("menuizquierdo.php"); ?>

		<aside class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
						Acciones para el album
					</div>
					<div class="panel-body">
						<label class="form-label">Reaccion</label>

						<!-- Lo programo en otra fecha... -->
							<!-- <form action="eliminar_album.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<button type="submit" name="accion" value="agregar" class="form-control btn btn-success" >
										Agregar otra foto
									</button>
								</div>
							</form> -->
							<form action="eliminar_album.php" method="post">
								<div class="form-group">
									<button type="submit" name="accion" value="eliminar" class="form-control btn btn-danger" >
										Eliminar este album
									</button>
								</div>
							</form>


					</div>
				</div>
			</aside>
	</div>
	
	
</div>



<?php
	require_once("footer.php");
?>
	