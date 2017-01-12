<?php 

	/**
	* Clase para la conexion para la base de datos mysql
	*/
	$conexion = mysqli_connect("localhost","root","","agimerca_db")
	or die ("fallo al conectar con la base de datos: ".mysqli_error($conexion));

	class ConexionNelson
	{

		// metodo estatico para conectar.
		public static function conectar(){
			global $conexion;

			return $conexion;
		}

		public static function imprimirError($objeto){
			echo "<div class='alert alert-danger'>".mysqli_errno($objeto)." ".mysqli_error($objeto)."<div/>";
		}
	}

	
?>