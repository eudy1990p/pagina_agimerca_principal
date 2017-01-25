<?php require_once("head.php"); ?>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<?php require_once("menu.php"); ?>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/fondo.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Bienvenido a Agimerca</h1>
							<h2>La red social donde encontraras todo sobre los sectores productivos del pais y del mundo </h2>
							
							<div class="row">
								<form class="form-inline" id="fh5co-header-subscribe">
									<div class="col-md-8 col-md-offset-2">
										<div class="form-group">
											<a href="agimerca/" class="btn btn-success">Entra Ahora!!</a>
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Carrusel agregado por nelson -->
	<div class="container-fluid">
		<?php require_once 'agimerca/carrusel.php'; ?>
	</div>

	<div id="fh5co-core-feature" style="margin-top: -5em">
		<div class="container">
			<div class="row">
				<div class="features">
					<div class="col-half animate-box" data-animate-effect="fadeInLeft">
						<div class="table-c">
							<div class="desc">
								
								<h3>Enterate de las facilidades que te ofrece Agimerca</h3>
								<p>Para publicar y conocer: Ofertas y Demandas, conéctate a Agimerca; Eventos y Actividades Agimerca te publica, gratis</p>
								<p><a href="servicio.html" class="btn btn-lg btn-primary">Leer mas</a></p>
							</div>
						</div>
					</div>
					<div class="col-half-image-holder animate-box" data-animate-effect="fadeInRight">
						<img class="img-responsive" src="images/mm1.jpg" alt="samsung">
					</div>
				</div>
			</div>
		</div>
	</div><br>

	
<?php require_once ("foot.php"); ?>
	