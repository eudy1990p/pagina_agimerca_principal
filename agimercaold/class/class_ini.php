<?php
/**
what the fuck is that?
Do you ever heard about PSR-0 ? 
**/
	session_start();
	require_once("class_label.php");
	require_once("class_conexion.php");
	require_once("class_usuario.php");
	require_once("class_permisos.php");
	require_once("class_producto.php");
	require_once("class_factura.php");
	require_once("class_empresa.php");
	require_once("class_post.php");
	require_once("class_categoria.php");


	$label = new Labeles("spanish");
	$conexion = new Conexion();
	$usuario = new Usuarios($conexion->getContect());
	$permiso = new Permisos($conexion->getContect());
	$producto = new Productos($conexion->getContect());
	$factura = new Facturas($conexion->getContect());
	$empresa = new Empresa($conexion->getContect());
	$post = new Post($conexion->getContect());
	$categoria= new Categoria($conexion->getContect());
?>