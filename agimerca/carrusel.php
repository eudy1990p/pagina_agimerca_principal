<?php
	require_once("class/class_usuario.php");
	require_once("class/class_conexion.php");
?>
<!-- Impresindible para que la pagina funcione -->
<script src="js/jquery.min.js"></script>
<script src="js/ie-emulation-modes-warning.js"></script>
<!-- Impresindible para que la pagina funcione -->

<div class="col-xs-12 text-center">	
	<h3 class="alert alert-info text-primary" style="margin-top: 1em">Ultimas entradas</h3>
</div>
<!-- Se establece el tamaño en 12 en un principio -->
<div class="col-xs-12">
	<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
	  <div class="carousel-inner">

	
		<?php 

		$c= new Conexion();
			$sql = 
			"
			select posts.*,DATE_FORMAT(posts.fecha_creado, '%d/%m/%Y') as fecha_formato,max(posts.fecha_creado),usuarios.id as usuario,usuarios.user as autor
			from posts join usuarios on posts.user_id_creado=usuarios.id
			group by posts.fecha_creado desc limit 20; 
			";

			
			$resultado = mysqli_query($c->getContect(),$sql) or die(mysqli_error($c->getContect()));

			while($datos = mysqli_fetch_array($resultado)):
				static $c=0;
			?>
			<!-- ==================	=====================================n===================================== -->
			<!-- Solo debe haber un item con la clase active -->
		<div class="item <?php if($c==1)echo "active";$c++; ?>">
		
			<div class="card   col-lg-3 col-md-4 col-sm-6 col-xs-12" onclick="window.location='new_page.html'">
			  <div class="card-block" >
			    <p class="card-text texto-post" style="
			    	width: 100%;
			    	height: 200px;
			    	font-size: 11px;
			    	overflow: hidden;
			    	text-align: justify;
			    	padding-top: 15px;
			    	padding: 5px;
			    	margin-bottom: 5px;/*El margen en la paret inferior es de 20 y hace que lusca extraño*/
			    	">	
		    	
			    	<img 
			    	class="img-thumbnail imagen-post" 
			    	style="float: left;height: 90%;width: 45%;margin: 5px"  
			    	src="agimerca/<?php echo $datos['img_url'] ?>" 
			    	alt="Post sin imagen">
			    	<?php echo strip_tags($datos['post']); ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			    	
			    </p>
			    <a class="" href="agimerca/publicaciones_perfil_usuario.php?user_id=<?php echo $datos['usuario'] ?>">
			    		ver publicacion
			    	</a>
			  </div>
			  <ul class="list-group list-group-flush" style="cursor:pointer;" onclick="window.location='agimerca/publicaciones_perfil_usuario.php?user_id=<?php echo $datos['usuario'] ?>' ">
			    <li class="list-group-item">
			    	<span>autor:</span><a href="#" class="card-link">
				   	<?php echo $datos['autor'] ?>
					</a>
					<span class="pull-right "><?php echo $datos['fecha_formato'] ?></span>
					<span class="clearfix"></span>
			    </li>
			  </ul>
			  
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

.texto-post{
	margin-top: 8px;
	border: 1px solid #80808033;
	border-radius: 3px;
}

.card:hover .texto-post{
	box-shadow: 0px 0px 15px #004bff4d;
	/*background: #0093ff1a;*/
}

</style>

<script type="text/javascript">
	$(document).ready(function(){
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

	  //vista con texto y con imagen viene por defecto.

	  //Vista de texto sin imagen
	  	$('.imagen-post').load(function(){

	  	}).error(function(){
	  		$(this).remove();
	  	});
	  //vista de imagen sin texto
	  	if($('.texto-post').text().trim()==''){
	  		$('.imagen-post').css({
	  			'width':'100%',
	  			'float':'none'
	  		});
	  	}

	  $(document).on('hover','.item',function(e){
	  	alert('hola');
	  });


		});
	});
</script>