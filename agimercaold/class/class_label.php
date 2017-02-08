<?php

/**
* never heard about php arrays or gettext? and at the second: do you never heard about oop standards? Encapsulation? 
*/
class Labeles 
{

	//LOGIN
	public $LoginEmail="";
	public $LoginClave="";
	public $LoginRecordarClave="";
	public $LoginBtnEntrar="";
	public $LoginTitle="";

	//FOOTER
    public $FooterDerechos="";

    //MENU
	public $MenuFactura="";
	public $MenuProducto="";
	public $MenuAdministrador="";
	public $MenuAdministradorAnularFactura="";
	public $MenuAdministradorAnularProducto="";
	public $MenuAjuste="";
	public $MenuAjusteUsuario="";
	public $MenuAjustePermiso="";

	//GLOBALES

	public $ElUsuarioNoTienePermiso="";
	public $ProcesadaSolicitud="";
	public $LaCantidadDisponible="";
	public $SeHaExcedidoLaCantidadMaximaDisponibleDeEsteProducto="";
	public $Nuevo="";
	public $IconoNumero="";
	public $IconoMoneda="";
	public $Grupo="";
	public $Monto="";
	public $Opcion="";
	public $FechaCreado="";
	public $CreadoPor="";
	public $Bloquear = "";
	public $Desbloquear = "";
	public $Eliminar = "";
	public $Editar = "";
	public $SeleccioneUn = "";
	public $Usuario = "";
	public $IntroduzcaUnNombre = "";
	public $IntroduzcaUna = "";
	public $IntroduzcaUn = "";
	public $El = ""; 
	public $YaExiste = ""; 
	public $Clave = ""; 
	public $Segura = ""; 
	public $Cancelar = "";
	public $Guardar = "";
	public $Este = "";
	public $EstaSeguroQueDesea = "";
	public $Total = "";
	public $Registros = "";
	public $Siguiente = "";
	public $Atras = "";
	public $SeleccionDel = "";
	public $Paso = "";
	public $De = "";
	public $Permiso = "";
	public $Finalizar = "";
	public $Nombre = "";
	public $SeleccionarTodo="";
	public $Seleccionar="";
	public $Todo="";
	public $O="";
	public $NoCoinsiden="";
	public $UstedNoTiene="";
	public $CambiarClave="";
	public $Repetir="";
	public $Cantidad="";
	public $Codigo="";
	public $Precio="";
	public $Unidad="";
	public $Producto="";
	public $Compra="";
	public $Venta="";
	public $Fecha="";
	public $Anular="";
	public $Debe="";
	public $Cotizacion="";
	public $Sub="";
	public $Itbis="";
	public $Cedula="";
	public $Cliente="";
	public $Completo="";
	public $No="";
	public $Detalle="";
	public $Fax="";
	public $Email="";
	public $Telefono="";
	public $Facturacion = "";
	public $RNC="";
	public $Web="";
	public $Para="";
	public $Maxima="";
	public $imagen="";
	public $Id = "";
	public $ElTamanoDeLaImagenEsMayor="";
	public $Factura = "";


	//GLOBALES MAYUSCULA
	public $MayusculaCreadoPor = "";
	public $MayusculaMonto = "";
	public $MayusculaUsuario = "";
	public $MayusculaGrupo = "";
	public $MayusculaFechaCreado = "";
	public $MayusculaPermiso = "";
	public $MayusculaEditar = "";
	public $MayusculaEliminar = "";
	public $MayusculaBloquear = "";
	public $MayusculaEscribir = "";
	public $MayusculaLeer = "";
	public $MayusculaSeleccionar="";
	public $MayusculaTodo = "";
	public $MayusculaCantidad = "";
	public $MayusculaPrecio= "";
	public $MayusculaCodigo = "";
	public $MayusculaCompra = "";
	public $MayusculaProducto = "";
	public $MayusculaFecha = "";
	public $MayusculaImagen = "";
	public $MayusculaId = "";
	public $MayusculaCedula = "";
	public $MayusculaFactura = "";



	//GLOBALES MINUSCULA
	public $MinusculaUsuario = ""; 
	public $MinusculaGrupo = "";
	public $MinusculaClave = "";
	public $MinusculaEliminar = "";
	public $MinusculaDesBloquear = "";
	public $MinusculaBloquear = "";
	public $MinusculaPermiso = "";
	public $MinusculaUnidad = "";
	public $MinusculaProducto = "";
	public $MinusculaVenta = "";
	public $MinusculaCantidad = "";
	public $MinusculaCodigo = "";
	public $MinusculaPrecio = "";
	public $MinusculaAnular = "";
	public $MinusculaSeleccionar = "";
	public $MinusculaTotal = "";
	public $MinusculaCedula = "";
	public $MinusculaCompleto = "";
	public $MinusculaFacturacion = "";



	//AJUSTES - USUARIO
	public $AjusteUsuarioTituloVenta="";
	public $AjusteUsuarioTitulo="";


	function __construct($argument)
	{

		switch ($argument) {
			case 'spanish':
				$this->Spanish();
				break;
			
			default:
				# code...
				break;

		}

	}

	private function Spanish(){
		$this->LoginEmail="Usuario";
		$this->LoginClave="Clave";
		$this->LoginRecordarClave="Recordar Clave";
		$this->LoginBtnEntrar="Entrar";
		$this->LoginTitle="Login";

		$this->FooterDerechos="Todos los derechos reservados para Programador: Eudy Arias.";

		$this->MenuFactura="Inicio";
	    $this->MenuProducto="Productos";
	    $this->MenuAdministrador="Administrador";
	    $this->MenuAdministradorAnularFactura="Anular factura";
	    $this->MenuAdministradorAnularProducto="Anular producto comprado";
	    $this->MenuAjuste="Ajustes";
	    $this->MenuAjusteUsuario="Usuario";
	    $this->MenuAjustePermiso="Permisos";

	    $this->ProcesadaSolicitud = "Se procesó correctamente su solicitud.";
	    $this->ElUsuarioNoTienePermiso = "El usuario no tiene permiso para anular.";
	    $this->IntroduzcaUnNombre = "Introduzca un nombre de";
	    $this->LaCantidadDisponible = ", la cantidad disponible es";
	    $this->ElTamanoDeLaImagenEsMayor = "El tamaño de la imagen es mayor a 6 MB";

	    $this->SeHaExcedidoLaCantidadMaximaDisponibleDeEsteProducto = " Se ha excedido la cantidad máxima disponible de este producto con ";
	    $this->IntroduzcaUna = "Introduzca una";
	    $this->IntroduzcaUn = "Introduzca un";
	    $this->Nuevo = "Nuevo";
	    $this->Monto = "Monto";
	    $this->Imagen = "Imagen";
	    $this->IconoNumero = "#";
	    $this->IconoMoneda = "$";
	    $this->Opcion = "OPCION";
	    $this->Grupo = "Grupo";
	    $this->FechaCreado = "Fecha creado";
	    $this->CreadoPor = "Creado por";
	    $this->Bloquear = "Bloquear";
	    $this->Desbloquear = "Desbloquear";
	    $this->Eliminar = "Eliminar";
	    $this->Editar = "Editar";
	    $this->SeleccioneUn = "Seleccione un";
	    $this->El = "El";
	    $this->YaExiste = "ya existe";
	    $this->Segura = "Segura";
	    $this->Cancelar = "Cancelar";
	    $this->Guardar = "Guardar";
	    $this->Este = "este";
	    $this->Total = "Total";
	    $this->Registros = "Registros";
	    $this->EstaSeguroQueDesea = "¿Está seguro que desea";
	    $this->Permiso = "Permiso";
	    $this->Todo = "Todo";
		$this->UstedNoTiene="Usted no tiene";
		$this->CambiarClave="Cambiar clave";
		$this->Repetir="Repetir";
		$this->Cantidad="Cantidad";
		$this->Precio="Precio";
		$this->Codigo="Codigo";
		$this->Unidad="Unidad";
		$this->Producto="Producto";
		$this->Compra="Compra";
		$this->Venta="Venta";
		$this->Fecha="Fecha";
		$this->Anular="Anular";
		$this->Sub="Sub";
		$this->Itbis="Itbis";
		$this->Cedula="Cedula";
		$this->Cliente="Cliente";
		$this->Cotizacion="Cotizaci&oacute;n";
		$this->Completo="Completo";
		$this->Detalle="Detalle";
		$this->No="No.";
		$this->Email="Email";
		$this->Fax="Fax";
		$this->Web="Web";
		$this->RNC="RNC";
		$this->facturacion="Facturación";
		$this->Telefono="Tel&eacute;fono";
		$this->Para="para";
		$this->Maxima="maxima";
		$this->Id="Id";
		$this->Factura="Factura";



	    $this->Leer = "Leer";
	    $this->Escribir = "Escribir";

		$this->Siguiente = "Siguiente";
		$this->Atras = "Atras";
		$this->Paso = "Paso";
		$this->De = "de";
		$this->SeleccionDel = "Selección del";
		$this->Finalizar = "Finalizar";
		$this->Nombre = "Nombre";
		$this->O = "o";
		$this->NoCoinsiden = "no coinsiden";
		
		$this->Seleccionar="Seleccionar";
		$this->SeleccionarTodo="Seleccionar todos";


	    $this->Clave =$this->LoginClave;
	    $this->Usuario = $this->MenuAjusteUsuario;


	    $this->MayusculaCreadoPor = strtoupper($this->CreadoPor);
	    $this->MayusculaMonto = strtoupper($this->Monto);
	    $this->MayusculaFechaCreado = strtoupper($this->FechaCreado);
	    $this->MayusculaUsuario = strtoupper($this->MenuAjusteUsuario);
	    $this->MayusculaGrupo = strtoupper($this->Grupo);
	    $this->MayusculaPermiso = strtoupper($this->Permiso);
	    $this->MayusculaLeer = strtoupper($this->Leer);
	    $this->MayusculaEscribir = strtoupper($this->Escribir);
	    $this->MayusculaBloquear = strtoupper($this->Bloquear);
	    $this->MayusculaEliminar = strtoupper($this->Eliminar);
	    $this->MayusculaEditar = strtoupper($this->Editar);
	    $this->MayusculaTodo = strtoupper($this->Todo);
	    $this->MayusculaSeleccionar = strtoupper($this->Seleccionar);
	    $this->MayusculaCodigo = strtoupper($this->Codigo);
	    $this->MayusculaCantidad = strtoupper($this->Cantidad);
	    $this->MayusculaPrecio = strtoupper($this->Precio);
	    $this->MayusculaNombre = strtoupper($this->Nombre);
	    $this->MayusculaCompra = strtoupper($this->Compra);
	    $this->MayusculaFecha = strtoupper($this->Fecha);
	    $this->MayusculaTotal = strtoupper($this->Total);
	    $this->MayusculaProducto = strtoupper($this->Producto);
	    $this->MayusculaImagen = strtoupper($this->Imagen);
	    $this->MayusculaId = strtoupper($this->Id);
	    $this->MayusculaCedula = strtoupper($this->Cedula);
	    $this->MayusculaItbis = strtoupper($this->Itbis);


	    $this->MinusculaGrupo = strtolower($this->Grupo);
	    $this->MinusculaFactura = strtolower($this->Factura);
	    $this->MinusculaClave = strtolower($this->Clave);
	    $this->MinusculaSegura = strtolower($this->Segura);
	    $this->MinusculaEliminar = strtolower($this->Eliminar);
	    $this->MinusculaUsuario = strtolower($this->MenuAjusteUsuario);
	    $this->MinusculaDesBloquear = strtolower($this->Desbloquear);
	    $this->MinusculaBloquear = strtolower($this->Bloquear);
	    $this->MinusculaPermiso = strtolower($this->Permiso);
	    $this->MinusculaProducto = strtolower($this->Producto);
	    $this->MinusculaUnidad = strtolower($this->Unidad);
	    $this->MinusculaCompra = strtolower($this->Compra);
	    $this->MinusculaVenta = strtolower($this->Venta);
	    $this->MinusculaCantidad = strtolower($this->Cantidad);
	    $this->MinusculaCodigo= strtolower($this->Codigo);
	    $this->MinusculaPrecio= strtolower($this->Precio);
	    $this->MinusculaAnular= strtolower($this->Anular);
	    $this->MinusculaSeleccionar = strtolower($this->Seleccionar);
	    $this->MinusculaTotal = strtolower($this->Total);
	    $this->MinusculaCedula = strtolower($this->Cedula);
	    $this->MinusculaCompleto = strtolower($this->Completo);
	    $this->MinusculaFacturacion = strtolower($this->Facturacion);


	    

	    $this->AjusteUsuarioTituloVenta = $this->MenuAjusteUsuario;
		$this->AjusteUsuarioTitulo = "Usuarios";

		$this->Debe="Debe ".$this->MinusculaSeleccionar." por lo menos un ".$this->MinusculaProducto;


	}
}


?>