<?php

/**
* 
*/
class Productos
{
	
	private $c;
	private $id="";


	function __construct($conexion)
	{
		$this->c = $conexion;
	}
	function setIdUser($id){ $this->id = $id; }
	function getPost(){
		$sql = "SELECT p.id,u.user, p.post, p.img_url,u.img_perfil FROM posts as p left join usuarios as u on p.user_id_creado = u.id";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}


	function getSerchProducto($p){
		$array="";
		$sql = "select nombre
		from inventarios 
		where codigo = '".$p["idRegistro"]."' ";
		$query = $this->c->query($sql);
		if ($query) {
			$res = $query->fetch_object();
			$array = array('total' => $query->num_rows,'nombre'=>$res->nombre );
			return $array;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	function getDetalleProducto($p){
		$array="";
		$sql = "select *
		from productos 
		where inventario_id = '".$p["idRegistro"]."' and e_p = 'activo'";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function setProducto($p,$f=""){
		$this->setIdUser($_SESSION["id"]);

		if (isset($p["add"])) {

			$query = $this->addProducto($p,$f);
			if ($query == 3) { return 3; }
			if ($query == 1) { return 1; }
			die("1234567");
		}elseif (isset($p["eliminar"])) {
			$this->eliminarProducto($p);
		}elseif (isset($p["edit"])) {
			$query = $this->editProducto($p,$f);
			if ($query) { return 1;	}
		}elseif (isset($p["anular"])) {
			$query = $this->anularProducto($p);
			if ($query) { return 1;	}
		}
	}



	function editProducto($p,$f=""){

		$url="";
		$respImg = $this->uploadImgProducto($f); // do you ever heard about Unrestricted File Upload  Vulnerabilities ?
		if ($respImg == 3) {	return 3; }
		if (isset($f["imgProducto"]) && !empty($f["imgProducto"])) { $url = "url = '".$respImg."',"; }

		
		$update = "update inventarios set f_e=now(), u_id_e = '$this->id', $url nombre='".$p["nombre"]."', precio_venta='".$p["precio"]."' where id='".$p["idRegistro"]."';";
		$query = $this->c->query($update);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	
	function eliminarProducto($p){
		$update = "update inventarios set e_p='eliminado', f_e=now(), u_id_e = '$this->id'  where id='".$p["idRegistro"]."';";
		$query = $this->c->query($update);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function anularProducto($p){
		$sqlProducto="select inventario_id,cantidad from productos where id='".$p["idRegistro"]."'; ";
		$queryProducto = $this->c->query($sqlProducto);
		if ($queryProducto) {
			
			$resProducto = $queryProducto->fetch_object();
			if ($resProducto) {
				
				$updateInventario = "update inventarios set cantidad_vigente = cantidad_vigente - ".$resProducto->cantidad." , f_e=now(), u_id_e = '$this->id'  where id='".$resProducto->inventario_id."';";
				$queryUpdateInventario = $this->c->query($updateInventario);
				if ($queryUpdateInventario) {

					$update = "update productos set e_p='anulado', f_e=now(), u_id_e = '$this->id'  where id='".$p["idRegistro"]."';";
					$query = $this->c->query($update);
					if ($query) {
						return $query ;
					}else{
						echo $this->c->error;
						die("Error en la consulta");
					}

				}else{
					echo $this->c->error;
					die("Error en la consulta");
				}
			}

		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
		
	}
	function uploadImgProducto($f){
		if (isset($f["imgProducto"]) && !empty($f["imgProducto"])) {
			
			$array = explode(".",$f["imgProducto"]["name"] );
			$total = count($array) - 1;
			$extencion = $array[$total];
			$nuevoNombre = date("dmYHis");
			$nombreArchivo = $nuevoNombre.".".$extencion;
			
			if ($f["imgProducto"]["size"] <= 6291456) {
				
				$ruta = "img_product/".$nombreArchivo;
				if(copy($f["imgProducto"]["tmp_name"], $ruta)){ return $ruta; }else{ return "img/Imagen_no_disponible.jpg"; }
			
			}else{ return 3; }
		}else{ return "img/Imagen_no_disponible.jpg"; }	
	}
	function addProducto($p,$f=""){
		$url="";
		$respImg = $this->uploadImgProducto($f);
		if ($respImg == 3) {	return 3; }
		if (isset($f["imgProducto"]) && !empty($f["imgProducto"])) { $url = "url = '".$respImg."',"; }

		$sql = "select id from inventarios where codigo = '".$p["codigo"]."' ";

		$query = $this->c->query($sql);
		if ($query) {
			
			if ($query->num_rows > 0) {
				$res = $query->fetch_object();
				$precio="";
				if (isset($p["precio"]) && !empty($p["precio"])) {
					$precio = ", `precio_venta` = '".$p["precio"]."' ";
				}
				$sqlUpdate="UPDATE `inventarios`
							SET
							$url
							`f_e` = now(),
							`cantidad_vigente` = cantidad_vigente+".$p["cantidad"].",
							`u_id_e` = '$this->id'
							$precio
							,
							`e_p` = 'activo'
							WHERE id = '$res->id' ;";
				//$this->verQuery($sqlUpdate);
				$queryUpdate = $this->c->query($sqlUpdate);
				if ($queryUpdate) {
					$this->addCompra($p,$res->id);
				}
				
			}else{

				$sqlInsert="INSERT INTO `inventarios`
					(`id`,
					`nombre`,
					`f_c`,
					url,
					`cantidad_vigente`,
					`codigo`,
					`u_id_c`,
					`precio_venta`,
					`e_p`)
					VALUES
					(
					null,
					'".$p["nombre"]."',
					now(),
					'".$respImg."',
					'".$p["cantidad"]."',
					'".$p["codigo"]."',
					'$this->id',
					
					'".$p["precio"]."',
					'activo'
					);";

				//$this->verQuery($sqlInsert);
				$query = $this->c->query($sqlInsert);
				if ($query) {
					$this->addCompra($p,$this->c->insert_id);
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}

			}
		}

		return 1;
		
	}

	function verQuery($sql){
		echo "<pre>$sql</pre>";
	}

	function addCompra($p,$inventario_id){
		$sqlInsert = "INSERT INTO  `productos`
						(`id`,
						`inventario_id`,
						`f_c`,
						`u_id_c`,
						`cantidad`,
						`precio_compra`,
						`e_p`)
						VALUES
						(
						null,
						'$inventario_id',
						now(),

						$this->id,
						'".$p["cantidad"]."',
						'".$p["precioCompra"]."',
						'activo'
						); ";
		$query = $this->c->query($sqlInsert);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta1");
		}
	}

}

?>