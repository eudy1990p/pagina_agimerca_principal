<?php
/**
* dude, please !!! please !! learn oop programming, your sourcecode is more than only bad.
*/
class Empresa
{
	
	private $c;
	private $telefono1="";
	private $telefono2="";
	private $telefonoMostrar="";
	private $fax2="";
	private $fax1="";
	private $faxMostrar="";
	private $direccion="";
	private $direccionMostrar="";
	private $web="";
	private $webMostrar="";
	private $email="";
	private $emailMostrar="";
	private $rnc="";
	private $icono="";
	private $iconoMostrar="";
	private $nombre="";


	function __construct($conexion)
	{
		$this->c = $conexion;
		$this->asignarDatosEmpresa();
	}
	function setIdUser($id){ $this->id = $id; }
	function verQuery($sql){ echo "<pre>$sql</pre>"; }
	function asignarDatosEmpresa(){
		
		$this->telefono1 ="809-555-5555"; $this->telefono2 ="849-789-3698";
		$this->fax1 ="809-555-5557"; $this->fax2 ="849-789-3697";
		$this->direccion ="kilometro 15 autopista Duarte constanza calle # 12 etc.";
		$this->web =" www.paginaweb.com";
		$this->email ="servicio@empresa.com.do";
		$this->rnc ="1022011523520";
		$this->icono ="img/glyphicons-44-group.png";
		$this->nombre ="Nombre empresa";

	}

	function getDatosEmpresa(){
		$array = array('telefono2' =>$this->telefono2 ,
						'telefono1' =>$this->telefono1 ,
						'fax1' =>$this->fax1 ,
						'fax2' =>$this->fax2 ,
						'direccion' =>$this->direccion ,
						'web' =>$this->web ,
						'icono' =>$this->icono ,
						'nombre' =>$this->nombre ,
						'rnc' =>$this->rnc ,
						'email' =>$this->email 
						 );
		return $array;
	}
}
?>