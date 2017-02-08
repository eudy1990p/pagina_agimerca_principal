<?php

/**
* 
*/
class Conexion
{
	
	private $use="root";
	private $clave="";
	private $hots="localhost";
	private $db="agimerca_db_tmp";
	private $cone;

	function __construct()
	{
		$con = mysqli_connect($this->hots,$this->use,$this->clave,$this->db);
		if (!$con) {
			echo $con->error;
			die();
		}
		$this->cone=$con;
	}

	public function getContect(){
		return $this->cone;
	}
}

?>