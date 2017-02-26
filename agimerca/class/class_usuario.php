<?php

/**
* fix your sql injections ;) and your bad, ugly, not oop conform 
* trash-code
*/
class Usuarios
{

	private $c;
	private $TblGrupo="";
	private $usuario="";
	private $id="";
	private $grupo_id= "";
	private $permisos="";
	private $cambio="";
	private $tipo_usuario="";
	private $img_perfil="";
    private $primeravez = "";



	function __construct($conexion)
	{
		$this->c = $conexion;
	}

	function getGrupos(){
		$sql = "select id,nombre from grupos;";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
    function getDatoUserId($id){
		$sql = "select * from usuarios where id = '".$id."';";
		$query = $this->c->query($sql);
		if ($query) {
            if($array = mysqli_fetch_array($query) ){
                return $array;
            }
			
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	
	function uploadImgProducto($f){
		if (isset($f["ImgPerfil"]) && !empty($f["ImgPerfil"])) {
			
			$array = explode(".",$f["ImgPerfil"]["name"] );
			$total = count($array) - 1;
			$extencion = $array[$total];
			$nuevoNombre = date("dmYHis");
			$nombreArchivo = $nuevoNombre.".".$extencion;
			
			if ($f["ImgPerfil"]["size"] <= 6291456) {
				
				$ruta = "img_perfil/".$nombreArchivo;
				if(copy($f["ImgPerfil"]["tmp_name"], $ruta)){ return $ruta; }else{ return "img/Imagen_no_disponible.jpg"; }
			
		}else{ return 3; }
		}else{ return "img/Imagen_no_disponible.jpg"; }	
	}
	function addUsuarioConImagen($p,$f=""){
		
		$url="";
		
		
		if (isset($f["ImgPerfil"]) && !empty($f["ImgPerfil"]) && ($f["ImgPerfil"]["name"] != "" )) { 
			$respImg = $this->uploadImgProducto($f);
		
		if ($respImg == 3) {// die("33");	
												return 3; }

			//die("44");
			$url = "img_perfil = '".$respImg."',";										
		}else{
			
			$respImg = "img/foto_perfil.jpg";
		}
		$sqlInsert ="INSERT INTO 
		 usuarios(user ,  clave, fecha_creado, estado, img_perfil,tipo_user) 
		VALUES 
		('".$p["user"]."','".md5($p["clave"])."',now(),'activo','".$respImg."','normal')";
		
		
				//$this->verQuery($sqlInsert);
				$query = $this->c->query($sqlInsert);
				if ($query) {
					$this->validarDatosUser($p);
					//echo "Todo bien";
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}
		
	}

	function getUsuarios(){

		$sql = "select u.id,u.user,u.f_c, u1.user as creador, g.nombre,u.estado from usuarios as u 
		left join usuarios as u1  on u.u_id_c = u1.id
		left join grupos as g on u.grupo_id = g.id
		where u.estado != 'eliminado' ";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getUsuario($p){

		$sql = "select u.id,u.user,u.f_c, u1.user as creador, g.nombre,u.estado,g.id as idGrupo from usuarios as u 
		left join usuarios as u1  on u.u_id_c = u1.id
		left join grupos as g on u.grupo_id = g.id
		where u.estado != 'eliminado' and u.id = '".$p["idRegistro"]."' ";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getSerchUser($p){

		$sql = "select count(u.id) as total 
		from usuarios as u
		where u.user = '".$p["idRegistro"]."' ";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function setUsario($p){
	
		if (isset($p["add"])) {
			$query = $this->addUsuario($p);
			if ($query) { return 1;	}
		}elseif (isset($p["bloquear"])) {
			$this->bloquearUsuario($p);
		}elseif (isset($p["desbloquear"])) {
			$this->desbloqueadoUsuario($p);
		}elseif (isset($p["eliminar"])) {
			$this->eliminarUsuario($p);
		}elseif (isset($p["edit"])) {
			$query = $this->editUsuario($p);
			if ($query) { return 1;	}
		}

	}

	function bloquearUsuario($p){
		$update = "update usuarios set estado='bloqueado', f_e=now(), u_id_e = '1'  where id='".$p["idRegistro"]."';";
		$query = $this->c->query($update);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function editUsuario($p){

		$update = "update usuarios set clave = '".md5($p["clave"])."'  where id='".$_SESSION["id"]."';";
		$query = $this->c->query($update);
		if ($query) {
			echo "Todo bien";
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
    
    	function editUsuarioPrimeraVez(){

		$update = "update usuarios set primeravez = '0'  where id='".$_SESSION["id"]."';";
		$query = $this->c->query($update);
		if ($query) {
			echo "Todo bien";
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
    function editUsuarioExtra($p,$f){
        $where = "";
        
        if( isset($p["telefono"]) &&  !empty($p["telefono"]) ){
            $where .= " telefono = '".$p["telefono"]."'";
        }else{
            $where .= " telefono = ''";
        }
        if( isset($p["email"]) &&  !empty($p["email"]) ){
            $where .= ", correo = '".$p["email"]."'";
        }
        if( isset($p["url_video"]) &&  !empty($p["url_video"]) ){
            $where .= ", embed_video = '".$p["url_video"]."'";
        }
        if( isset($p["sobre_mi"]) &&  !empty($p["sobre_mi"]) ){
            $where .= ", descripcion = '".$p["sobre_mi"]."'";
        }
        
        $url="";
		
		
		if (isset($f["ImgPerfil"]) && !empty($f["ImgPerfil"]) && ($f["ImgPerfil"]["name"] != "" )) { 
			$respImg = $this->uploadImgProducto($f);
		
		if ($respImg == 3) {// die("33");	
												return 3; }

			//die("44");
			$url = "img_perfil = '".$respImg."',";										
		}else{
			
            
		      if( isset($p["img_p"]) &&  !empty($p["img_p"]) ){
               //die($p["img_p"]);
                  $respImg = $p["img_p"];
            
            }else{
                  die("parado1");
			    $respImg = "img/foto_perfil.jpg";
                

            }
        //die("parado");
        }
            $_SESSION["img_perfil"]=$respImg;
        
		$update = "update usuarios set $where 
        ,img_perfil = '".$respImg."'   where id='".$_SESSION["id"]."';";
		$query = $this->c->query($update);
		if ($query) {
			echo "Todo bien";
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function desbloqueadoUsuario($p){
		$update = "update usuarios set estado='activo', f_e=now(), u_id_e = '1'  where id='".$p["idRegistro"]."';";
		$query = $this->c->query($update);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	function eliminarUsuario($p){
		$update = "update usuarios set estado='eliminado', f_e=now(), u_id_e = '1'  where id='".$p["idRegistro"]."';";
		$query = $this->c->query($update);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function addUsuario($p){
		
		$sqlInsert="insert into usuarios 
					(id,user,f_c,u_id_c,estado,cambio,clave,grupo_id)
					values
					(null,'".$p["usuario"]."', now(), '1', 'activo', '1', '".md5($p["clave"])."', '".$p["grupo"]."' ); ";

		//$this->verQuery($sqlInsert);
		$query = $this->c->query($sqlInsert);
		if ($query) {
			return $query ;
		}else{
			echo $this->c->error;
			die("Error en la consulta1");
		}
		
	}

	function verQuery($sql){
		echo "<pre>$sql</pre>";
	}

	function validarDatosUser($p){

		$validarUser = $this->comprobarUserPass($p);
		if ($validarUser) {
			header("location:inicio.php");
		}else{
			return 1;
		}
	}

	function comprobarUserPass($p){
		// La funcion md5 me a dado problemas al momento de guardar y desencriptar para los usuarios.
		//Me he dado el gusto de eliminarlo a hasta nuevo aviso para labores de debug con las seccion del usuario.
		$sql = "select * 
		from usuarios as u
		where u.user = '".$p["user"]."' and u.clave = '".md5($p["clave"])."' and estado='activo' ";
	//	echo "Consulta: ".$sql;
		$query = $this->c->query($sql);
		if ($query) {
			if ($query->num_rows > 0) {
				
				if($res = $query->fetch_object()){
					$this->usuario = $res->user;
					$this->id = $res->id;
					$this->tipo_usuario = $res->tipo_user;
					$this->img_perfil =$res->img_perfil;
                    $this->primeravez =$res->primeravez;
					$this->asignarValoresSession();
				}
				return true;
			}else{
				return false;
			}
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	/*function optenerPermisos($grupoId){
		
		$sql = "SELECT ss.nombre,pss.leer,pss.escribir,
						pss.editar,pss.borrar,pss.bloquear
				FROM permisos_sub_seccion as pss
				inner join sub_seccion as ss on pss.sub_seccion_id = ss.id
				where grupo_id = '$grupoId';";

		$query = $this->c->query($sql);
		if ($query) {
			$this->verQuery($sql);
			if ($query->num_rows > 0) {
			
				while($res = $query->fetch_object()){
					$this->permisos["permisos"][$res->nombre] = array("leer" => $res->leer,
					"escribir" => $res->escribir,"editar" => $res->editar,"borrar" => $res->borrar,
					"bloquear" => $res->bloquear );
				}
				
			}

		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}*/
	function asignarValoresSession(){
		$_SESSION["usuario"]=$this->usuario;
		$_SESSION["id"]=$this->id;
		$_SESSION["tipo_usuario"]=$this->tipo_usuario;
		$_SESSION["img_perfil"]=$this->img_perfil;
        $_SESSION["primeravez"]=$this->primeravez;
		//$_SESSION["cambio"]=$this->cambio;
		//$_SESSION["permisos"]=$this->permisos["permisos"];
		
	}

	function eliminarSesiones(){
		session_destroy();
	}

	function cambiarClave($p){

		if (isset($p["clave"])) {
			if (empty($p["clave"])) {
				$string = "";
			}else{
				$string = ",clave = '".md5($p["clave"])."'";
			}
		}
		$update = "update usuarios 
				   set f_e=now(), u_id_e = '1' ".$string." , cambio='0'
					where id='".$p["cambiarClave"]."';";
		$query = $this->c->query($update);
		if ($query) {
			$_SESSION["cambio"]=0;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function validarEntradaIlegal($s,$p){
		if (!isset($_SESSION["id"])) {
			return true;
		}
		if (isset($s)) {
			if (isset($s[$p])) {
				if (isset($s[$p]["leer"])) {
					if ($s[$p]["leer"] == 0) {
						return true;
					}
				}else{
					return true;
				}
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
}

?>