<?php require_once("head.php"); ?>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<?php require_once("menu.php"); ?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/travel.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Contactanos</h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


		<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Informacion de contacto</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
							<li class="phone"><a href="tel://8299465022">(829)-946-5022</a></li>
							<li class="email"><a href="mailto:info@Agimerca.com">info@Agimerca.com</a></li>
							
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Llenar los datos </h3>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" id="fname" class="form-control" placeholder="Nombre">
							</div>
					
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" id="email" class="form-control" placeholder="Correo">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="text" id="subject" class="form-control" placeholder="Asunto">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Escribir mensaje"></textarea>
							</div>
						</div>
						<div class="form-group text-right">
							<input type="submit" value="Enviar" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>

	
<?php require_once ("foot.php"); ?>
	<script type="text/javascript">
		selectMenu('5');
</script>