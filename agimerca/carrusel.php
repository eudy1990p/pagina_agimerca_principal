<?php
	require_once("class/class_usuario.php");
	require_once("class/class_conexion.php");
?>
<!-- Impresindible para que la pagina funcione -->
<script src="js/jquery.min.js"></script>
<!-- Impresindible para que la pagina funcione -->

<div class="col-md-12 text-center">	
	<h3 class="alert alert-info text-primary" style="margin-top: 1em">Ultimas entradas</h3>
</div>
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
			<div class="card col-xs-3 alert" >
			  <!-- <img class="card-img-top img-responsive" src="<?php echo $datos['img_url'] ?>" alt="sin imagen"> -->
			  <h5><strong>Contenido</strong></h5>
			  <div class="card-block">
			    <!-- <h4 class="card-title"></h4> -->
			    <div class="card-text texto-publicacion" style="height: 5em;overflow: hidden;">
					<?php echo $datos['post']; ?>
			    </div>
			  </div>
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item">
			    	<a class="btn btn-block btn-info" href="agimerca/publicaciones_perfil_usuario.php?user_id=<?php echo $datos['usuario'] ?>">
			    		ver publicacion
			    	</a>
			    </li>
			    <li class="list-group-item">
				    <a href="agimerca/publicaciones_perfil_usuario.php?user_id=<?php echo $datos['usuario'] ?>">
				    	author:<?php echo $datos['autor'] ?>
				    </a>
			    <!--
			    http://localhost/agimercaEudy/publicaciones_perfil_usuario.php?user_id=2 
			     -->
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

.card{
	margin: 2px
	border-radius: 2px;
	border: 1px solid #e3e3e3;
}

.texto-publicacion{
	border:solid 1px #70c58f4d;
	border-radius: 5px;
	text-align: justify;
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