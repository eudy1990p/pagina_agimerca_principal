<?php 
	
require_once("class/class_ini.php");

if (isset($_POST)) {
	
	switch ($_POST["accion"]) {
		
		case 'infoEditUsuario':
			$query = $usuario->getUsuario($_POST);
			$result = $query->fetch_array();
			print_r(json_encode($result));
			break;
		
		case 'serchUser':
			$query = $usuario->getSerchUser($_POST);
			$result = $query->fetch_object();
			print_r(json_encode(array('total' => $result->total)));
			break;
		
		case 'serchGrupo':
			$query = $permiso->getSerchGrupo($_POST);
			$result = $query->fetch_object();
			print_r(json_encode(array('total' => $result->total)));
			break;

		case 'serchProducto':
			$query = $producto->getSerchProducto($_POST);
			print_r(json_encode($query));
			break;

		case 'serchCliente':
			$query = $factura->getSerchCliente($_POST);
			print_r(json_encode($query));
			break;
	}

}

?>