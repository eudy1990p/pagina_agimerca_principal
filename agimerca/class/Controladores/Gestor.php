<?php 

	include('Mensajeria.php');
	include('../class_conexion.php');
	/*
	* Gestor de serivcios 
	*/

	//Consultar
	if(isset($_REQUEST['get'])){


		$id_usuario = $_REQUEST['id_usuario'];
		$id_amigo = $_REQUEST['id_amigo'];
		MensajeriaAjax::cargarMensajes($id_usuario,$id_amigo);
	}


	//Guardar mensaje
	if(isset($_REQUEST['put'])){

		$usuario = $_REQUEST['usuario'];
		$amigo = $_REQUEST['amigo'];
		$mensaje = $_REQUEST['mensaje-enviado'];

		MensajeriaAjax::guardarMensaje($usuario,$amigo,$mensaje);


	}


?>