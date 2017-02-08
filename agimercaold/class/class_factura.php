<?php 
/**
* 
*/
class Facturas
{
	private $c;
	private $id="";
	private $impuesto = "0.18";
	private $total = 0;
	private $monto = 0;
	private $itbis = "";
	private $cliente_id = "";
	private $cotizacion_id = "0";
	private $nombreCliente = "";
	private $cedulaCliente = "";
	private $noFactura="";
	private $fecha="";
	private $fechaFactura="";
	public $respuestaAnulacion='0';


	function __construct($conexion)
	{
		$this->c = $conexion;
	}
	function setIdUser($id){ $this->id = $id; }
	function verQuery($sql){ echo "<pre>$sql</pre>"; }

	function setCotizacion($p){
		$this->setIdUser($_SESSION["id"]);
		if (isset($p["add"])) {
			$query = $this->crearCotizacion($p);
			if ($query) { return 2;	}
		}
		if (isset($p["anularProducto"])) {
			$query = $this->refrescarCotizacioin($p);
			if ($query) { return 2;	}
		}
		if (isset($p["anularFactura"])) {
			$query = $this->anularFactura($p);
			if ($query) { return 1;	}
		}

	}

	function addCotizacion(){
		$sqlInsert = "
					INSERT INTO `cotizaciones`
					(
					`f_c`,
					`u_id_c`,
					`monto`,
					`itbs`,
					`total`,
					`e_c`,
					`cliente_id`
					)
					VALUES
					(
					now(),
					'$this->id',
					'".$this->monto."',
					'".$this->itbis."',
					'".$this->total."',
					'pendiente',
					'".$this->cliente_id."'
					);";

		$query = $this->c->query($sqlInsert);
		if ($query) {
			$this->fecha = date('d/m/Y');
			$this->fechaFactura = date('d/m/Y');
			$this->cotizacion_id = $this->c->insert_id;
			 return $this->c->insert_id;
		}else{
			echo $this->c->error;
			die("Error en la consulta1");
		}
	}

	function addDetalleCotrizacion($p){
	
		$sqlInsert = "INSERT INTO `detalle_cotizacion`
					(`cotizacion_id`,
					`inventario_id`,
					`f_c`,
					`u_id_c`,
					`precio`,
					`sub_total`,
					`e_c`,
					`cliente_id`,
					`cantidad`)
					VALUES
					( '".$this->cotizacion_id."',
					'".$p["inventario_id"]."',
					now(),
					'$this->id',
					'".$p["precio"]."',
					'".$p["sub_total"]."',
					'pendiente',
					'".$this->cliente_id."',
					'".$p["cantidad"]."'
					); ";
		
				$query = $this->c->query($sqlInsert);
				if ($query) {
					 return $query;
				}else{
					echo $this->c->error;
					die("Error en la consulta1");
				}
	}

	function crearCotizacion($p) {
	
		$array="";
		$this->nombreCliente = $p["nombreCliente"] ;
		$this->cedulaCliente = $p["cedulaCliente"] ;
		if ($p["clienteNuevo"] == 0) {
			$this->addCliente($p);
		}else{
			$this->cliente_id = $p["clienteNuevo"];
		}

		if ($p["marcardoTotal"] > 0) {
			for ($i=0; $i < count($p["marcardo"]); $i++) { 
				if ($p["marcardo"][$i] == 1) {
					$array[] = array('inventario_id' =>$p["idInvientario".$i], 'cantidad' =>$p["input".$i], 'precio' =>$p["precio".$i],
					 'sub_total' =>$p["precio".$i] *$p["input".$i]);
					$this->monto = $this->monto + ($p["precio".$i] * $p["input".$i]);
				} 
			}
			$this->itbis = $this->monto * $this->impuesto;
			$this->total = $this->itbis + $this->monto;
			$id = $this->addCotizacion();
			if ($id) {
				for ($i=0; $i < count($array) ; $i++) { 
					$this->addDetalleCotrizacion($array[$i]);
				}
			}

		}

	}

	function getDetalleCotizacion(){
		$array="";
		$sql = "select dc.*,i.nombre
		from detalle_cotizacion  as dc
		inner join inventarios as i on i.id = dc.inventario_id
		where cotizacion_id = '".$this->cotizacion_id."' and e_c != 'anulado'";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getTotalCotizacion(){
		$array = array(
						'itbis' => $this->itbis , 
						'monto' => $this->monto,
						'total' =>$this->total,
						'nombreCliente'=>$this->nombreCliente,
						'cedulaCliente'=>$this->cedulaCliente,
						'cliente_id'=>$this->cliente_id,
						'cotizacion_id' => $this->cotizacion_id,
						'noFactura' => $this->noFactura,
						'fecha' => $this->fecha,
						'fechaFactura' => $this->fechaFactura

						);
		return $array;
	}

	function getSerchCliente($p){
		$array="";
		$sql = "select nombre_completo as nombre, id
		from clientes 
		where identificacion = '".$p["idRegistro"]."' ";
		$query = $this->c->query($sql);
		if ($query) {
			$res = $query->fetch_object();
			$array = array('total' => $query->num_rows,'nombre'=>$res->nombre,'id'=>$res->id );
			return $array;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function addCliente($p){
		$sqlInsert = "
					INSERT INTO `clientes`
					(
					`f_c`,
					`u_id_c`,
					`nombre_completo`,
					`identificacion`
					)
					VALUES
					(
					now(),
					'$this->id',
					'".$p["nombreCliente"]."',
					'".$p["cedulaCliente"]."'
					);";

		$query = $this->c->query($sqlInsert);
		if ($query) {
			$this->cliente_id = $this->c->insert_id;
			 return $this->c->insert_id;
		}else{
			echo $this->c->error;
			die("Error en la consulta1");
		}
	}
function detalleFactura($p){
		$this->setIdUser($_SESSION["id"]);
		$this->cotizacion_id = $p['ctID'];
		//$this->cotizacionProcesada();
		$query = $this->getCotizacion();
		$res = $query->fetch_object();
		$this->monto = $res->monto;
		$this->itbis = $res->itbs;
		$this->total = $res->total;
		$this->nombreCliente = $res->nombre;
		$this->cedulaCliente = $res->cedula;
		$this->cliente_id = $res->id;
		//$this->addFactura();
		$queryF = $this->getFactur();
		$resF = $queryF->fetch_object();
		$this->fecha = $resF->fecha_c_f;
		$this->fechaFactura =  $resF->fecha_factura;
		$this->noFactura = $resF->factura_id;


	}
	function imprimirFactura($p){
		$this->setIdUser($_SESSION["id"]);
		$this->cotizacion_id = $p['ctID'];
		$this->cotizacionProcesada();
		$query = $this->getCotizacion();
		$res = $query->fetch_object();
		$this->monto = $res->monto;
		$this->itbis = $res->itbs;
		$this->total = $res->total;
		$this->nombreCliente = $res->nombre;
		$this->cedulaCliente = $res->cedula;
		$this->cliente_id = $res->id;
		$this->addFactura();
		$this->fecha = date('d/m/Y');
		$this->fechaFactura = date('d/m/Y');


	}
	function exportarCotizacioin($p){
		
		if ($p["add"] == "exportWORD") {

			header("Content-Type:   application/vnd.ms-word");
			header("Content-Disposition: attachment; filename=ExportadoWord.doc"); 
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);

		}elseif ($p["add"] == "exportEXCEL") {

			header("Content-Type:    application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=ExportadoEXCEL.xls"); 
			header("Expires: 0");

		}

		if (isset( $p['ctID'])) {
			$this->cotizacion_id = $p['ctID'];
		}else{
			$this->cotizacion_id = $p['cotizacion_id'];
		}
		//$this->editDetalleCotizacion($p);
		$query = $this->getCotizacion();
		$res = $query->fetch_object();
		$this->monto = $res->monto;
		$this->itbis = $res->itbs;
		$this->total = $res->total;
		$this->nombreCliente = $res->nombre;
		$this->cedulaCliente = $res->cedula;
		$this->cliente_id = $res->id;
		$this->fecha = $res->fecha;
		$this->fechaFactura = $res->fecha;
		//$_POST["add"]="add";
	}
	function refrescarCotizacioin($p){
		$this->cotizacion_id = $p['cotizacion_id'];
		$this->editDetalleCotizacion($p);
		$query = $this->getCotizacion();
		$res = $query->fetch_object();
		$this->monto = $res->monto;
		$this->itbis = $res->itbs;
		$this->total = $res->total;
		$this->nombreCliente = $res->nombre;
		$this->cedulaCliente = $res->cedula;
		$this->cliente_id = $res->id;
		$this->fecha = $res->fecha;
		$this->fechaFactura = $res->fecha;
		$_POST["add"]="add";
	}
	function getCotizacion(){
		$array="";
		$sql = "SELECT co.monto,co.itbs,co.total,c.nombre_completo as nombre, 
				c.identificacion as cedula, c.id, DATE_FORMAT(co.f_c,'%d/%m/%Y') as fecha
				FROM cotizaciones as co
				inner join clientes as c on c.id = co.cliente_id
				where co.id = '".$this->cotizacion_id."' and co.e_c != 'anulado' ";
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}

	function getFactura(){
		$array="";
		$sql = "SELECT f.monto,f.itbs,
				f.total,c.nombre_completo as nombre, 
				c.identificacion as cedula,
				c.id, DATE_FORMAT(co.f_c,'%d/%m/%Y') as fecha,
				f.cotizacion_id,
				f.id as factura_id,
				DATE_FORMAT(f.f_c,'%d/%m/%Y') as fecha_c_f,
				DATE_FORMAT(f.f_f,'%d/%m/%Y') as fecha_factura
						
		FROM cotizaciones as co
		inner join clientes as c on c.id = co.cliente_id
		inner join facturas as f on co.id = f.cotizacion_id
		where  co.e_c != 'anulado' and
				f.e_f != 'anulada' and
				cuadrado is null;";
		
		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	function getFactur(){
		$array="";
		$sql = "SELECT f.monto,f.itbs,
				f.total,c.nombre_completo as nombre, 
				c.identificacion as cedula,
				c.id, DATE_FORMAT(co.f_c,'%d/%m/%Y') as fecha,
				f.id as factura_id,
				DATE_FORMAT(f.f_c,'%d/%m/%Y') as fecha_c_f,
				DATE_FORMAT(f.f_f,'%d/%m/%Y') as fecha_factura
						
		FROM cotizaciones as co
		inner join clientes as c on c.id = co.cliente_id
		inner join facturas as f on co.id = f.cotizacion_id
		where  co.e_c != 'anulado' and
				f.e_f != 'anulada' and
				cuadrado is null and
				co.id = '".$this->cotizacion_id."';";

		$query = $this->c->query($sql);
		if ($query) {
			return $query;
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	}
	function addFactura(){
		$sqlInsert =	"INSERT INTO `facturas`
						(`f_c`,
						`u_id_c`,
						`monto`,
						`itbs`,
						`total`,
						`e_f`,
						`cliente_id`,
						`f_f`,
						`cotizacion_id`)
						VALUES
						( now(),
						'$this->id',
						'$this->monto',
						'$this->itbis',
						'$this->total',
						'activa',
						'$this->cliente_id',
						now(),
						'$this->cotizacion_id' );
						";

		$query = $this->c->query($sqlInsert);
		if ($query) {
			$this->noFactura = $this->c->insert_id;
			 return $this->c->insert_id;
		}else{
			echo $this->c->error;
			die("Error en la consulta1");
		}
	}

	function editDetalleCotizacion($p){
		$anular=true;
		if (isset($p["validPermiso"])) {
			$anular =  $this->validarPermisoAnular($p);
		}else{ $this->respuestaAnulacion = 2; }

		if ($anular) {
			$update = "update detalle_cotizacion set f_e=now(), u_id_e = '$this->id', e_c='anulado' where id='".$p["idRegistro"]."';";
			$query = $this->c->query($update);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}	
		}
		
	}

	function validarPermisoAnular($p){
		$sql="SELECT u.id
				FROM usuarios as u
				inner join permisos_sub_seccion as pss on u.grupo_id = pss.grupo_id
				where 
				u.user = '".$p["user"]."' 
				and u.clave = '".md5($p["clave"])."' 
				and u.estado='activo' 
				and pss.sub_seccion_id = '5' 
				and pss.bloquear = '1';";

		$query = $this->c->query($sql);
		if ($query) {
			if ($query->num_rows > 0) {
				$this->respuestaAnulacion = 2;
				return true;
			}else{
				$this->respuestaAnulacion = 1;
				return false;
			}
		}else{
			echo $this->c->error;
			die("Error en la consulta");
		}
	
	}

	function descontarProductoInventario($id,$cantidad){
		
		$sqlUpdate="UPDATE `inventarios` as i
					inner join detalle_cotizacion as dc on i.id = dc.inventario_id
					SET
					i.f_e = now(),
					i.cantidad_vigente = i.cantidad_vigente - ".$cantidad.",
					i.u_id_e = '".$this->id."',
					dc.e_c='procesado',
					dc.f_e=now(),
					dc.u_id_e = '".$this->id."'
					WHERE dc.id = '".$id."';
				";

			$query = $this->c->query($sqlUpdate);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}			
	}

	function cotizacionProcesada(){
	
		$sqlUpdate="UPDATE `cotizaciones` 
					SET
					f_e = now(),
					u_id_e = '".$this->id."',
					e_c='procesado'
					WHERE id = '".$this->cotizacion_id."';
				";

			$query = $this->c->query($sqlUpdate);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}			
	}

	function anularFactura($p){
		$this->cotizacion_id = $p["idRegistro"];
		$query = $this->getDetalleCotizacion();
		while ($result = $query->fetch_object()) { 
			$this->aumentarProductoInventario($result->id,$result->cantidad);
		}
		$this->anularCotizacionFactura();
		return $query;
	}

	function aumentarProductoInventario($id,$cantidad){
		
		$sqlUpdate="UPDATE `inventarios` as i
					inner join detalle_cotizacion as dc on i.id = dc.inventario_id
					SET
					i.f_e = now(),
					i.cantidad_vigente = i.cantidad_vigente + ".$cantidad.",
					i.u_id_e = '".$this->id."',
					i.e_p = 'activo',
					dc.f_e=now(),
					dc.u_id_e = '".$this->id."',
					dc.e_c = 'anulado'
					WHERE dc.id = '".$id."';
				";

			$query = $this->c->query($sqlUpdate);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}			
	}

	function anularCotizacionFactura(){

		$sqlUpdate="update facturas as f
					inner join cotizaciones as c on f.cotizacion_id = c.id
					set 
						c.e_c = 'anulado',
						c.u_id_a = '".$this->id."',
						c.f_a=now(),
						f.u_id_a = '".$this->id."',
						f.f_a=now(),
						f.e_f='anulada'
					where 
						f.cotizacion_id='".$this->cotizacion_id."';";

			$query = $this->c->query($sqlUpdate);
			if ($query) {
				return $query ;
			}else{
				echo $this->c->error;
				die("Error en la consulta");
			}	
	}
}
?>