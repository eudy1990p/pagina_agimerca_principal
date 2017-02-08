<?php
/**
* 
*/
class Post
{
	
	private $c;
	private $id="";


	function __construct($conexion)
	{
		$this->c = $conexion;
	}
	function setIdUser($id){ $this->id = $id; }
	
	function getPost($where="",$limit="limit 50"){
		$sql = "SELECT p.id,u.id as id_user,u.user, p.post, p.img_url,u.img_perfil FROM posts as p left join usuarios as u on p.user_id_creado = u.id ".$where." ".$limit."";
		//echo $sql;
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	
	function getPais($where="",$limit="limit 50"){
		$sql = "SELECT * from pais";
		//echo $sql;
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	
	function getPostBusquedaAvanzada($p){
		//print_r($p);
		$where = "";
		if( isset($p["categoria_id"]) && (!empty($p["categoria_id"])) ){
			if(empty($where)){
					$where .= "c.id = '".$p["categoria_id"]."'";
			}else{
					$where .= " and (c.id = '".$p["categoria_id"]."') ";
			}	
		}
		
		if( isset($p["relacion_sector_roll_id"]) && (!empty($p["relacion_sector_roll_id"])) ){
			if(empty($where)){
					$where .= "rcs.id = '".$p["relacion_sector_roll_id"]."'";
			}else{
					$where .= " and (rcs.id = '".$p["relacion_sector_roll_id"]."') ";
			}	
		}
		
		
		if( isset($p["relacion_producto_sector_id"]) && (!empty($p["relacion_producto_sector_id"])) ){
			if(empty($where)){
					$where .= "rssp.id = '".$p["relacion_producto_sector_id"]."'";
			}else{
					$where .= " and (rssp.id = '".$p["relacion_producto_sector_id"]."') ";
			}	
		}
		
		if( isset($p["buscador_avanzado"]) && (!empty($p["buscador_avanzado"])) ){
			if(empty($where)){
					$where .= "p.post  like '%".$p["buscador_avanzado"]."%'";
			}else{
					$where .= " and (p.post like '%".$p["buscador_avanzado"]."%') ";
			}	
		}
		
		if( isset($p["caracteristica"]) && (!empty($p["caracteristica"])) ){
			if(empty($where)){
					$where .= "p.caracteristica  like '%".$p["caracteristica"]."%'";
			}else{
					$where .= " and (p.caracteristica like '%".$p["caracteristica"]."%') ";
			}	
		}
		if( isset($p["pais"]) && (!empty($p["pais"])) ){
			if(empty($where)){
					$where .= "p.pais_id  = '".$p["pais"]."'";
			}else{
					$where .= " and (p.pais_id = '".$p["pais"]."') ";
			}	
		}
		if( isset($p["provincia"]) && (!empty($p["provincia"])) ){
			if(empty($where)){
					$where .= "p.esto_provincia  like '%".$p["provincia"]."%'";
			}else{
					$where .= " and (p.esto_provincia like '%".$p["provincia"]."%') ";
			}	
		}
		if( isset($p["localidad"]) && (!empty($p["localidad"])) ){
			if(empty($where)){
					$where .= "p.localidad  like '%".$p["localidad"]."%'";
			}else{
					$where .= " and (p.localidad like '%".$p["localidad"]."%') ";
			}	
		}
		
		if( isset($p["numero"]) && (!empty($p["numero"])) ){
			if(empty($where)){
					$where .= "p.numero  = '".$p["numero"]."'";
			}else{
					$where .= " and (p.numero = '".$p["numero"]."') ";
			}	
		}
		if( isset($p["medida"]) && (!empty($p["medida"])) ){
			if(empty($where)){
					$where .= "p.detalle_numero  = '".$p["medida"]."'";
			}else{
					$where .= " and (p.detalle_numero = '".$p["medida"]."') ";
			}	
		}
		if( isset($p["fecha_entrega"]) && (!empty($p["fecha_entrega"])) ){
			if(empty($where)){
					$where .= "p.fecha_entrega  = '".$p["fecha_entrega"]."'";
			}else{
					$where .= " and (p.fecha_entrega = '".$p["fecha_entrega"]."') ";
			}	
		}
		//
		if( isset($p["observacion"]) && (!empty($p["observacion"])) ){
			if(empty($where)){
					$where .= "p.observaciones  like '%".$p["observacion"]."%'";
			}else{
					$where .= " and (p.observaciones like '%".$p["observacion"]."%') ";
			}	
		}
		//p.post LIKE '%a%'
		$sql = "SELECT 
			p.id,u.user,u.id as id_user, p.post, p.img_url,u.img_perfil
			FROM
			relacion_categoria_subcategoria AS rcs

			INNER JOIN relacion_subcategorias_subsubcategoria AS rcss
			ON rcs.id = rcss.relacion_categoria_subcategoria_id

			INNER JOIN relacion_sub_of_sub_categoria_posts AS rssp
			ON rcss.id = rssp.relacion_subcategorias_subsubcategoria_id

			INNER JOIN categorias AS c
			ON rcs.categoria_id = c.id

			INNER JOIN sub_categorias AS sc
			ON sc.id = rcs.sub_categoria_id

			INNER JOIN sub_of_sub_categorias AS ssc
			ON ssc.id = rcss.sub_of_sub_categoria_id

			INNER JOIN posts AS p
			ON rssp.posts_id = p.id

			INNER JOIN usuarios AS u 
			ON p.user_id_creado = u.id

			WHERE 
			
			$where
			";
		//	$this->verQuery($sql);
		//die();	
		$query = $this->c->query($sql);
			if ($query) {
				return $query;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}
		
	}
	function getComentarioPost($idPost){
		
		//$sql = "SELECT * FROM `comentarios` WHERE post_id = '"+$idPost+"' limit 5";
		$sql = "SELECT u.img_perfil,u.user,u.id as id_user,c.comentario,c.fecha_creado FROM comentarios as c left join usuarios as u on c.user_id_creado = u.id WHERE post_id = '".$idPost."' limit 5";
		
		//echo $sql;
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
function setComentarioPost($coment,$postID,$usuarioID){
		
$sqlInsert ="INSERT INTO 
		 comentarios(comentario , post_id, user_id_creado, fecha_creado) 
		VALUES 
		('".$coment."','".$postID."','".$usuarioID."',now())";
		
		
				//$this->verQuery($sqlInsert);
				$query = $this->c->query($sqlInsert);
				if ($query) {
					echo "Todo bien";
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}	
}
	function getInventario(){
		$sql = "select id,nombre,cantidad_vigente as cantidad,codigo,precio_venta as precio,url from inventarios where e_p != 'eliminado';";
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

	function setPost($p,$f=""){
		$this->setIdUser($_SESSION["id"]);
		
		if (isset($p["add"])) {

			$query = $this->addProducto($p,$f);
			
			$p["post_id"] = $this->c->insert_id;
			$this->setInsertRelacion($p);
			//if ($query == 3) { return 3; }
			//if ($query == 1) { return 1; }
			//die("1234567");
		}/*elseif (isset($p["eliminar"])) {
			$this->eliminarProducto($p);
		}elseif (isset($p["edit"])) {
			$query = $this->editProducto($p,$f);
			if ($query) { return 1;	}
		}elseif (isset($p["anular"])) {
			$query = $this->anularProducto($p);
			if ($query) { return 1;	}
		}*/
	}

	function setInsertRelacion($p){
		$sqlInsert="insert into relacion_sub_of_sub_categoria_posts 
							(id,relacion_subcategorias_subsubcategoria_id,posts_id,fecha_creado,user_id_creado)
							values
							(null,'".$p["relacion_producto_sector_id"]."','".$p["post_id"]."', now(), '".$_SESSION["id"]."' ); ";

				//$this->verQuery($sqlInsert);
				$query = $this->c->query($sqlInsert);
				if ($query) {
					return $query ;
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}
	}


	function editProducto($p,$f=""){
		$this->setIdUser($_SESSION["id"]);
		$url="";
		$respImg = $this->uploadImgProducto($f); // do you ever heard about Unrestricted File Upload  Vulnerabilities ?
		if ($respImg == 3) {	return 3; }
		if (isset($f["imgProducto"]) && !empty($f["imgProducto"]) && ($f["imgProducto"]["error"] != 4) ) { $url = "img_url = '".$respImg."',"; }

		
		$update = "update posts set fecha_editado=now(), user_id_editado = '$this->id', ".$url." post='".$p["post"]."' where id='".$p["idpost"]."';";
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
			if($f["imgProducto"]["error"] != 4){
			
			$array = explode(".",$f["imgProducto"]["name"] );
			$total = count($array) - 1;
			$extencion = $array[$total];
			$nuevoNombre = date("dmYHis");
			$nombreArchivo = $nuevoNombre.".".$extencion;
			
			if ($f["imgProducto"]["size"] <= 6291456) {
				
				$ruta = "img_product/".$nombreArchivo;
				if(copy($f["imgProducto"]["tmp_name"], $ruta)){ return $ruta; }else{ return "img/Imagen_no_disponible.jpg"; }
			
			}else{ return 3; }
		}else{
				return "";
			}
		}else{ return "img/Imagen_no_disponible.jpg"; }	
	}
	function addProducto($p,$f=""){
		//print_r($p);
		$url="";
		$respImg = $this->uploadImgProducto($f);
		
		if ($respImg == 3) {	return 3; }
		
		if (isset($f["imgProducto"]) && !empty($f["imgProducto"])) { 
			$url = "url = '".$respImg."',";										
		}
		$campos = ""; $valores = "";$resumen = "";
		if( isset($p["caracteristica"]) && (!empty($p["caracteristica"])) ){
			$campos .= ", caracteristica";	$valores .= ",'".$p["caracteristica"]."'";
			$resumen .= "<p> <strong>Caracterisca del producto</strong> ".$p["caracteristica"]." </p>";
		}
		if( isset($p["pais"]) && (!empty($p["pais"])) ){
			$campos .= ", pais_id";	$valores .= ",'".$p["pais"]."'";
			//$resumen .= "<p> <strong>Pais del producto</strong>".$p["pais"]." </p>";
		}
		if( isset($p["provincia"]) && (!empty($p["provincia"])) ){
			$campos .= ", esto_provincia";	$valores .= ",'".$p["provincia"]."'";
			$resumen .= "<p> <strong>Provincia del producto</strong> ".$p["provincia"]." </p>";
		}
		//localidad
		if( isset($p["localidad"]) && (!empty($p["localidad"])) ){
			$campos .= ", localidad";	$valores .= ",'".$p["localidad"]."'";
			$resumen .= "<p> <strong>Localidad del producto</strong> ".$p["localidad"]." </p>";
		}
		if( isset($p["numero"]) && (!empty($p["numero"])) ){
			$campos .= ", numero";	$valores .= ",'".$p["numero"]."'";
			$resumen .= "<p> <strong>Numero del producto</strong> ".$p["numero"]." </p>";
		}
		if( isset($p["medida"]) && (!empty($p["medida"])) ){
			$campos .= ", detalle_numero";	$valores .= ",'".$p["medida"]."'";
			$resumen .= "<p> <strong>Tipo de medida del producto</strong> ".$p["medida"]." </p>";
		}
		if( isset($p["fecha_entrega"]) && (!empty($p["fecha_entrega"])) ){
			//$aux = explode("/",$p["fecha_entrega"]);
			//$p["fecha_entrega"] = $aux[2]."-".$aux[1]."-".$aux[0];
			$campos .= ", fecha_entrega";	$valores .= ",'".$p["fecha_entrega"]."'";
			$resumen .= "<p> <strong>Fecha entrega del producto</strong> ".$p["fecha_entrega"]." </p>";
		}
		if( isset($p["observacion"]) && (!empty($p["observacion"])) ){
			$campos .= ", observaciones";	$valores .= ",'".$p["observacion"]."'";
			$resumen .= "<p> <strong>Observacion del producto</strong> ".$p["observacion"]." </p>";
		}
		$p["post"] .= $resumen;
		$sqlInsert ="INSERT INTO 
		 posts(user_id_creado ,  `fecha_creado`, `post`, `categoria_post`, `img_url` $campos) 
		VALUES 
		('".$this->id."',now(),'".$p["post"]."','1','".$respImg."' $valores)";
		
		
			//	$this->verQuery($sqlInsert);
				$query = $this->c->query($sqlInsert);
				if ($query) {
					echo "Todo bien";
					return $query;
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}
		
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