<?php 

//	require_once("/../class_conexion.php");

	/**
	* 
	*/
	class Galeria
	{
		

		// conexion.
		public $c;
		//==========

		public $id = 'sin id';
		public $user_creador = 'sin usuario creador';
		public $user_editador = 'sin editador';
		public $fecha_editado = 'sin fecha editado';
		public $fecha_creado = 'sin fecha creado';
		public $url_img = 'sin imagen';
		public $perfil = 'sin perfil';
		public $carpeta_id = 'sin carpeta id';



		function __construct($id){
			//Constructor vacio
		}

		//octiene la galeria por el id.
		public static function getGalerias($id){
			$c = new Conexion();

			$sql = "SELECT * from galerias where id = $id";

			$resultado = mysqli_query($c->getContect(),$sql) or die("error: ".mysqli_error($resultado));

			while ($datos =mysqli_fetch_array($resultado)) {
				$this->id 			 =	$datos['id'];
				$this->user_creador	 =	$datos['user_id_creado'];
				$this->user_editador =	$datos['user_id_editado'];
				$this->fecha_creado	 =	$datos['fecha_creado'];
				$this->fecha_editado =  $datos['fecha_editado'];
				$this->url_img	 	 =	$datos['url_img'];
				$this->perfil		 =	$datos['perfil'];
				$this->carpeta_id	 =	$datos['carpeta_id'];
			}
		}
		
		public static function crear($datos){
			$c = new Conexion();

			//El perfil no me acuerdo que es... asi que lo deje en default.
			$sql = "INSERT into galerias values (default,$datos[usuario],default,now(),default,'$datos[url_img]',default,$datos[id_carpeta])";

			mysqli_query($c->getContect(),$sql) or die("Error al crear galeria: ".mysqli_error($c->getContect()));
		}




	}

?>