<?php 
	
require_once("class/class_ini.php");
//print_r($_POST);
if (isset($_POST)) {
	 
	switch ($_POST["accion"]) {
		
		case 'cargarMercado':
			$resultCategoria = $categoria->getCategoria();
        $array = "";$c = 0;
while($resCategoria = mysqli_fetch_object($resultCategoria)){

    $array[$c]["id"] = $resCategoria->id;
    $array[$c]["nombre"] = $resCategoria->nombre_categoria;
    $c++;
}
			
            print_r(json_encode($array));
			break;
		//
        case 'sectores':
        //print_r($_POST);
        //echo $_POST["idRelacionCategoriaSector"];
			$result = $categoria->getRelacionCateriaSubCategoria($_POST["idRelacionCategoriaSector"]); 
        //print_r($result->fetch_object());
        //echo $result->num_rows;
        $array = "";$c = 0;
        
        while($resCategoria = $result->fetch_object()){
           // echo $resCategoria->id;
    $array[$c]["id"] = $resCategoria->id_relacion;
    $array[$c]["nombre"] = $resCategoria->sub_categoria_name;
    $c++;
}
            print_r(json_encode($array));
			break;
        
    case 'productos':
		$result = $categoria->getRelacionSubCateriaSubSubCategoria($_POST["idRelacionCategoriaSector"]); 
        $array = "";$c = 0;
        
        while($resCategoria = $result->fetch_object()){
           // echo $resCategoria->id;
    $array[$c]["id"] = $resCategoria->id_relacion;
    $array[$c]["nombre"] = $resCategoria->sub_sub_categoria_name;
    $c++;
}
            print_r(json_encode($array));
			break;
        //validarUsuario
		case 'validarUsuario':
			$query = $usuario->getSerchUser($_POST);
			$result = $query->fetch_object();
			print_r(json_encode(array('total' => $result->total)));
			break;
		
		case 'productoSugerido':
        $query = $post->insertarProducto($_POST["mercado"],$_POST["sector"],$_POST["subsector"],$_POST["producto"],$_SESSION["id"]);
			if($query){
                $array = "1";
            }else{
                $array = "0";
            }
			print_r(json_encode(array('respuesta' => $array)));
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
        
        case 'primeravez':
		  $_SESSION["primeravez"] = 0 ;
        //usuario->editUsuarioPrimeraVez();
        break;
	}

}

?>