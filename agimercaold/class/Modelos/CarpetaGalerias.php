<?php 

	/**
	* 
	*/
	class CarpetaGalerias
	{
		

		public $c;

		public $id = 'no tiene';
		public $id_creador = 'sin creador';
		public $id_editador = 'sin editor';
		public $fecha_editado = 'sin fecha editado';
		public $fecha_creado = 'sin fecha creado';
		public $nombre = 'sin nombre';
		public $estado = 'sin estado';
		//Constructor vacio.
		//Cuando se usa un constructor vacio
		//Lo comun es crear un nuevo objeto de 
		//este tipo con atributos asignados manualmente.
		function __construct()
		{
			// Constructor vacio
		}

		//se toma el usuario el id del paquete
		public static function getCarpetaGalerias($id,$datos){
			$c = new Conexion();


			//Este constructor debe ser sobre escrito.
			$sql = "SELECT * from carpeta_gallerias where user_id_creado = $user->id";

			$resultado = mysqli_query($c->getContect(),$sql)
			or die ("Error galeria: ".mysql_error($c->getContect()));

			while ($datos = mysql_fetch_array($resultado)) {
				$this->id = $datos['id'];
				$this->id_creador = $datos['user_id_creado'];
				$this->id_editador = $datos['user_id_editado'];
				$this->fecha_editado = $datos['fecha_editado'];
				$this->fecha_creado = $datos['fecha_creado'];
				$this->nombre = $datos['nombre'];
				$this->estado = $datos['estado'];
			}
		}

		//metodo estatico para crear paquetes
		// toma como parametor un array de datos que concuerden 
		// con el orden de una galleria de imagenes.
		public static function guardar($datos){
			$c = new Conexion();

			$sql =
			"INSERT into carpeta_gallerias values ".
			"(default,'$datos[usuario]',default,default,now(),'$datos[nombre]',default)";

			$resultado = mysqli_query($c->getContect(),$sql) 
			or die("Error al insertar galleria: ".mysqli_error($c->getContect()));
			
		}

		//Cambia el estado del album
		public static function desactivar($id){
			$c = new Conexion();

			$sql ="UPDATE carpeta_gallerias set estado = 'desactivado' where id=".$id;

			$resultado = mysqli_query($c->getContect(),$sql) 
			or die("Error al insertar galleria: ".mysqli_error($c->getContect()));
		}

		//
		public static function getUltimo(){
			$c = new Conexion();

			$sql = "select max(id) as ultimo from carpeta_gallerias";

			$resultado = mysqli_query($c->getContect(),$sql) 
			or die("Error al insertar galleria: ".mysqli_error($c->getContect()));

			$datos = mysqli_fetch_row($resultado);

			return $datos[0];
		}

	}


 ?>