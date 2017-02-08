<?php 

/**
* 
*/
class Permisos
{
	
	private $c;

	function __construct($conexion)
	{
		$this->c = $conexion;
	}

	function getSeccion(){
		$sql = "select id,nombre from seccion;";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getSubSeccion($id,$idGrupo){
		//$sql = "select id,nombre,titulo from sub_seccion where seccion_id='".$id."';";
		/*$sql="select ss.id,ss.nombre,ss.titulo,pss.leer,pss.escribir,pss.editar,
				pss.borrar,pss.bloquear 
				from db_product_handler.sub_seccion as ss 
				left join permisos_sub_seccion as pss on ss.id = pss.sub_seccion_id 
				where ss.seccion_id='".$id."' and pss.grupo_id = '".$idGrupo."' ;";*/
		$sql="select id,nombre,titulo,
				(select leer from permisos_sub_seccion where sub_seccion_id= sub_seccion.id and grupo_id = '".$idGrupo."' ) as leer,
				(select escribir from permisos_sub_seccion where sub_seccion_id= sub_seccion.id and grupo_id = '".$idGrupo."') as escribir,
				(select editar from permisos_sub_seccion where sub_seccion_id= sub_seccion.id and grupo_id = '".$idGrupo."' ) as editar,
				(select borrar from permisos_sub_seccion where sub_seccion_id= sub_seccion.id and grupo_id = '".$idGrupo."' ) as borrar,
				(select bloquear from permisos_sub_seccion where sub_seccion_id= sub_seccion.id and grupo_id = '".$idGrupo."' ) as bloquear 
				from sub_seccion where seccion_id='".$id."';";
		//$this->verQuery($sql);
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getSerchGrupo($p){

		$sql = "select count(g.id) as total 
		from grupos as g
		where g.nombre = '".$p["idRegistro"]."' ";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	function setGrupo($p){	
		if (isset($p["add"])) {
			$query = $this->addGrupo($p);
			if ($query) { return 1;	}
		}elseif(isset($p["idAddPermiso"])){
			 
			 if ($this->addPermisosGrupo($p)) {
			  return true;
			 }
		}
	}
	function addGrupo($p){
		$p["idRegistro"] = $p["grupo"];
		$query = $this->getSerchGrupo($p);
		$result = $query->fetch_object();

		if ($result->total == 0) {
			$sqlInsert="insert into grupos 
					(id,nombre,f_c,u_id_c,estado)
					values
					(null,'".$p["grupo"]."', now(), '1', 'activo' ); ";

			//$this->verQuery($sqlInsert);
			$query = $this->c->query($sqlInsert);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta1");
			}	
		}
		
		
	}

	function verQuery($sql){
		echo "<pre>$sql</pre>";
	}

	function addPermisosGrupo($p){

		//COMPROBAR SI EXISTE EL GRUPO
		$sql = "select count(id) as total 
		from permisos_sub_seccion
		where grupo_id = '".$p["grupo_id"]."' ";
		
		$query = $this->c->query($sql);
		if ($query) {
			
			$result = $query->fetch_object();
			if ($result->total > 0) {
				
				$SqlDelete="DELETE from permisos_sub_seccion
				where grupo_id = '".$p["grupo_id"]."' ";
				
				$query = $this->c->query($SqlDelete);
			}

			if ($this->leerArray($p)) {
				return true;
			}

		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function leerArray($p){
	
		$grupo_id = $p["grupo_id"];

		if (isset($p["leer"])) {
			if (count($p["leer"]) > 0) {
				$total = count($p["leer"]);
				$valores=$p["leer"];
				for ($i=0; $i < $total ; $i++) { 
					$this->comprobarPermiso(1,1,$valores[$i],$grupo_id);				
				}
			}
		}

		if (isset($p["Escribir"])) {
			if (count($p["Escribir"]) > 0) {
				$total = count($p["Escribir"]);
				$valores=$p["Escribir"];
				for ($i=0; $i < $total ; $i++) { 
					$this->comprobarPermiso(2,1,$valores[$i],$grupo_id);				
				}
			}
		}

		if (isset($p["Editar"])) {
			if (count($p["Editar"]) > 0) {
				$total = count($p["Editar"]);
				$valores=$p["Editar"];
				for ($i=0; $i < $total ; $i++) { 
					$this->comprobarPermiso(3,1,$valores[$i],$grupo_id);				
				}
			}
		}

		if (isset($p["Eliminar"])) {
			if (count($p["Eliminar"]) > 0) {
				$total = count($p["Eliminar"]);
				$valores=$p["Eliminar"];
				for ($i=0; $i < $total ; $i++) { 
					$this->comprobarPermiso(4,1,$valores[$i],$grupo_id);				
				}
			}
		}

		if (isset($p["Bloquear"])) {
			if (count($p["Bloquear"]) > 0) {
				$total = count($p["Bloquear"]);
				$valores=$p["Bloquear"];
				for ($i=0; $i < $total ; $i++) { 
					$this->comprobarPermiso(5,1,$valores[$i],$grupo_id);				
				}
			}
		}
		return true;
	}

	function comprobarPermiso($campo,$valor,$idSubSeccion,$grupo_id){
		
		$campoUsar="";
		switch ($campo) {
			
			case '1':
				$campoUsar ="leer";
				
				break;
			case '2':
				$campoUsar ="escribir";
				
				break;
			case '3':
				$campoUsar ="editar";
				
				break;
			case '4':
				$campoUsar ="borrar";

				break;
			case '5':
				$campoUsar ="bloquear";

				break;
		}

		$sql = "select count(id) as total 
		from permisos_sub_seccion
		where sub_seccion_id = '".$idSubSeccion."' and grupo_id = '".$grupo_id."' ";
		$query = $this->c->query($sql);
		if ($query) {
			$result = $query->fetch_object();
			if ($result->total > 0) {
				$sqlUpdate="update permisos_sub_seccion
							set $campoUsar = '$valor'
							where sub_seccion_id = '$idSubSeccion';";
				$queryUpdate = $this->c->query($sqlUpdate);

			}else{
				$sqlInsert="INSERT INTO permisos_sub_seccion
							(
							$campoUsar,
							`sub_seccion_id`,
							`f_c`,
							`u_id_c`,
							`grupo_id`)
							VALUES
							(
							'$valor',
							'$idSubSeccion',
							now(),
							'1',
							'$grupo_id'
							);";
				$queryInsert = $this->c->query($sqlInsert);
				
			}

		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}

	}

}

?>