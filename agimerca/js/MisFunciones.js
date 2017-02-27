function ActivarEnlaceMenu (id,atclas,titulo) {

	$("#idMenuFactura").removeAttr("class");
	$("#idMenuProducto").removeAttr("class");
	$("#idMenuAdministrador").removeAttr("class");
	$("#idMenuAdministrador").attr({"class":"dropdown"});
	$("#idMenuAjuste").removeAttr("class");
	$("#idMenuAjuste").attr({"class":"dropdown"});

	$("#"+id).attr({"class":""+atclas});
	$("#titulosPH").html(titulo+"-Product Handler");

	//alert("ddd");
}

function validarIngresoUsuario(editar){

	var SEdit = "";
	var noUsar = true;
	if (editar) {
		SEdit = "Editar";
		noUsar = false;

	}
	
	usuario = $("#idUsuario"+SEdit);
	clave = $("#idClave"+SEdit);
	grupo = $("#idGrupo"+SEdit);
	validarU= $("#userValido");

	if (grupo.val() == 0) {
		$("#idDivGrupo"+SEdit).attr({"class":"form-group has-error has-feedback"});
		$("#idSpanGrupo"+SEdit).attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjGrupo"+SEdit).show(2000);
		return false;
	}else{
		$("#idDivGrupo"+SEdit).attr({"class":"form-group has-success has-feedback"});
		$("#idSpanGrupo"+SEdit).attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjGrupo"+SEdit).hide(0);
	}
	if (validarU.val() == 1) {
		if (usuario.val() == 0 && noUsar) {
			$("#idDivUsuario"+SEdit).attr({"class":"form-group has-error has-feedback"});
			$("#idSpanUsuario"+SEdit).attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
			$("#idMsjUsuario"+SEdit).show(2000);
			return false;
		
		}else{
			$("#idDivUsuario"+SEdit).attr({"class":"form-group has-success has-feedback"});
			$("#idSpanUsuario"+SEdit).attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
			$("#idMsjUsuario"+SEdit).hide(0);
		}
	
	}else{ alert();return false; }
	if (clave.val() == 0 && noUsar) {
		$("#idDivClave"+SEdit).attr({"class":"form-group has-error has-feedback"});
		$("#idSpanClave"+SEdit).attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjClave"+SEdit).show(2000);
		return false;
	
	}else{
		$("#idDivClave"+SEdit).attr({"class":"form-group has-success has-feedback"});
		$("#idSpanClave"+SEdit).attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjClave"+SEdit).hide(0);
	}
	$("#formIdUser"+SEdit).submit();

}

$("html").ready(function(){

	$("#guardarProducto").click(function(){
		validarIngresoProducto();
	});

	$("#guardarProductoEditar").click(function(){
		validarIngresoProductoEditar();
	});
	

	$("#idFin").click(function(){
		enviarFormulario("formPermisoPaso2");
	});

	$("#idFinFactura").click(function(){
		imprimirFactura();
	});
	

	$("#cambiarClaveBtn").click(function(){
		cambiarClave();
	});
	

	$("#guardarUsuario").click(function(){
		validarIngresoUsuario(false);
	});
	$("#guardarGrupoadd").click(function(){
		validarIngresoGrupo();
	});
	$("#guardarUsuarioEditar").click(function(){
		validarIngresoUsuario(true);
	});

	$("#idUsuario").blur(function(){
		getUserDisponible();
	});

	$("#idCodigo").blur(function(){
		 getNombreProducto();
	});

	$("#cedulaCliente").blur(function(){
		 getNombreCliente();
	});
	

	$( "#idGrupo" ).change(function() {
		paso1De2PermisoGrupo();
	});

	manejarBotonesSiguienteAtrasFin('previos','previous','next');
	manejarBotonesSiguienteAtrasFinFacturaMostarFin('previosFactura','previous','nextFactura');
	$(".ocultar").css({"display":"none"});

	$('#paso2').click(function (e) {
	  e.preventDefault();
	  if($("#idGrupo").val() == 0){
	  	manejarBotonesSiguienteAtrasFin('previos','previous','next');
	  	return false;
	  }
	});

	$('#paso1').click(function (e) {
	  e.preventDefault();
	  $("#idGrupoPermiso").val(0);
	  $("#previous").attr({"class":"previous disabled"});
	  $("#next").attr({"class":"next show"});
	  $("#fin").attr({"class":"next hide"});
	});

	$('.sinPrivilegios').click(function (e) {
	  e.preventDefault();
	  $(".bs-example-modal-sm-no-tiene-permisos").modal("show");
	  return false;
	});
	
	activarRestriccionPermiso();
	
	$('.bs-example-modal-sm-no-tiene-permisos').on('hidden.bs.modal', function(){
		if ($("#redireccionar").val() == 1) {
			window.location="index.php";		
		}
	});


/*	//$("#exampleModalCambiarClave").modal("show");*/

});
function activarRestriccionPermiso(){
	if ($("#redireccionar").val() == 1) {
	  $(".bs-example-modal-sm-no-tiene-permisos").modal("show");
	}
}

function opcionUser(id,idRegistro,accion){

	$('.'+id).modal('show');
	$("#IdOpcionInpu").val(idRegistro);
	$("#opcionInpu").attr({"name":""+accion});

}

function enviarFormulario(id){
	$("#"+id).submit();
}


function getInfoUserEdit(id){
	var datos = ExecAjax("ajax.php",id,"infoEditUsuario");
	datos.done(function(dato){
		usuario = $("#idUsuarioEditar");
		idR = $("#idEdit");
		grupo = $("#idGrupoEditar");

		usuario.html(dato["user"]);
		grupo.val(dato["idGrupo"]);
		idR.val(dato["id"]);

		$("#exampleModalEditar").modal('show');
	});
}

function getInfoProductoEdit(idValue,nombreValue,precioValue){
	//var datos = ExecAjax("ajax.php",id,"infoEditUsuario");
	//datos.done(function(dato){
		id = $("#idEdit");
		nombre = $("#idNombreEdit");
		precio = $("#idPrecioEdit");

		id.val(idValue);
		nombre.val(nombreValue);
		precio.val(precioValue);

		$("#exampleModalEditar").modal('show');
	//});
}

function ExecAjax(url,idRegistro,accion){

		datos = $.ajax({
			method:"POST",
			url:url,
			dataType:"json",
			data:{idRegistro:idRegistro,accion:accion}
		});	

		return datos;
}

function getUserDisponible(){

	var usuario = $("#idUsuario");

	if (usuario.val() == 0) {
		$("#idDivUsuario").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanUsuario").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjUsuario").show(2000);$("#idMsjUsuarioExiste").hide(0);
		return false;
	
	}else{

		var datos = ExecAjax("ajax.php",usuario.val(),"serchUser");
		
		datos.done(function(dato){
			//.log(dato);
			if (dato["total"] > 0) {
				$("#idDivUsuario").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanUsuario").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjUsuarioExiste").show(2000);
				$("#idMsjUsuario").hide(2000);
				$("#userValido").val(0);
				return false;
			
			}else{
				$("#idDivUsuario").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanUsuario").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjUsuarioExiste").hide(0);
				$("#idMsjUsuario").hide(0);
				$("#userValido").val(1);
			}
		});
	}
}

function paso1De2PermisoGrupo(){
	
	if($("#idGrupo").val() != 0){
		enviarFormulario("formGrupoPermisos");
	}else{
		$("#idDivGrupo").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanGrupo").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjGrupo").show(2000);
		return false;
	}
	
}

function marcarDesmarcarCheckBox(clickeado,class1){

	if ($("#"+clickeado).is(':checked')) {
		$('.'+class1).prop("checked", true);
	}else{
		$('.'+class1).prop("checked", false);
	}	
}
function manejarBotonesSiguienteAtrasFin(id,class1,id2){


	if ($("#idGrupoPermiso").val() != 0) {
		$("#"+id).attr({ "class":""+class1});
		$("#"+id2).hide();
		$("#fin").attr({ "class":"next show"});
	}else{
		paso1De2PermisoGrupo();
	}
	
}

function manejarBotonesSiguienteAtrasFinFactura(id,class1,id2,total){

	if ($("#cotizacion_id").val() != 0) {
		$("#"+id).attr({ "class":""+class1});
		$("#"+id2).hide();
		$("#finFactura").attr({ "class":"next show"});
	//0010836146

	}else{
		if ($("#cedulaCliente").val() == 0) {
				$("#idDivCedulaCliente").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanCedulaCliente").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjCedulaCliente").show(2000);
				$("#cedulaCliente").focus();
				return false;
		}else{
				$("#idDivCedulaCliente").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanCedulaCliente").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjCedulaCliente").hide(0);
		}

		if ($("#nombreCliente").val() == 0) {
				$("#idDivNombreCliente").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanNombreCliente").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjNombreCliente").show(2000);
				$("#nombreCliente").focus();
				return false;
		}else{
				$("#idDivNombreCliente").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanNombreCliente").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjNombreCliente").hide(0);
		}

		var t = 0;
		for (var i = 0; i <= parseInt(total) ; i++) {
			if ( $("#input"+i).val() > 0) {
				t+=1;
			}
		}
		if (t == 0) {
			$(".bs-example-modal-sm-producto-no-seleccionado").modal("show");
		}else{
			$("#marcardoTotal").val(t);
			enviarFormulario("formProductoSelect");
		}
	
	}
	
}

function manejarBotonesSiguienteAtrasFinFacturaMostarFin(id,class1,id2){

	if ($("#cotizacion_id").val() != 0) {
		$("#"+id).attr({ "class":""+class1});
		$("#"+id2).hide();
		$("#finFactura").attr({ "class":"next show"});
	//0010836146

	}
	
}

function validarIngresoGrupo(){

	var datos = ExecAjax("ajax.php",$("#idGrupoadd").val(),"serchGrupo");
	datos.done(function(dato){

			SEdit = "add";
			grupo = $("#idGrupo"+SEdit);

			if (grupo.val() == 0) {
				$("#idDivGrupo"+SEdit).attr({"class":"form-group has-error has-feedback"});
				$("#idSpanGrupo"+SEdit).attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjGrupo"+SEdit).show(2000);
				return false;
			}else{
				$("#idDivGrupo"+SEdit).attr({"class":"form-group has-success has-feedback"});
				$("#idSpanGrupo"+SEdit).attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjGrupo"+SEdit).hide(0);
			}
			
			if (dato["total"] > 0) {
				
				$("#idDivGrupoadd").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanGrupoadd").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjGrupoExisteadd").show(2000);
				$("#idMsjGrupoadd").hide(2000);
				$("#grupoValido").val(0);
				return false;
			
			}else{
				
				$("#idDivGrupoadd").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanGrupoadd").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjGrupoExisteadd").hide(0);
				$("#idMsjGrupoadd").hide(0);
				$("#grupoValido").val(1);
						
			}

			$("#formIdGrupoadd").submit();
		});
}

function cambiarClave(){

			if ($("#idCambioClave").val() == 0) {
				$("#idDivCambioClave").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanClave").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjClave").show(2000);
				return false;
			}else{
				$("#idDivCambioClave").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanClave").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjClave").hide(0);
			}

			if ($("#idCambioClave").val() != $("#idCambioClaveRepetir").val()) {
				$("#idDivCambioClaveRepetir").attr({"class":"form-group has-error has-feedback"});
				$("#idSpanClaveR").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
				$("#idMsjClaveR").show(2000);
				return false;
			}else{
				$("#idDivCambioClaveRepetir").attr({"class":"form-group has-success has-feedback"});
				$("#idSpanClaveR").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
				$("#idMsjClaveR").hide(0);
			}			
	enviarFormulario('formIdCambiarClave');
}


function validarIngresoProducto(){

	
	
	codigo = $("#idCodigo");
	nombre = $("#idNombre");
	cantidad = $("#idCantidad");
	precioCompra= $("#idPrecioCompra");

	if (codigo.val() == 0) {
		$("#idDivCodigo").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanCodigo").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjCodigo").show(2000);
		return false;
	}else{
		$("#idDivCodigo").attr({"class":"form-group has-success has-feedback"});
		$("#idSpanCodigo").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjCodigo").hide(0);
	}

	if (cantidad.val() == 0) {
		$("#idDivCantidad").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanCantidad").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjCantidad").show(2000);
		return false;
	
	}else{
		$("#idDivCantidad").attr({"class":"form-group has-success has-feedback"});
		$("#idSpanCantidad").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjCantidad").hide(0);
	}

	if (precioCompra.val() == 0) {
		$("#idDivCompra").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanPrecioCompra").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjCompra").show(2000);
		return false;
	
	}else{
		$("#idDivCompra").attr({"class":"form-group has-success has-feedback"});
		$("#idSpanPrecioCompra").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjCompra").hide(0);
	}
	enviarFormulario('formIdProducto');

}

function getNombreProducto(){

	var codigo = $("#idCodigo");

	if (codigo.val() != 0) {
		
		var datos = ExecAjax("ajax.php",codigo.val(),"serchProducto");
		
		datos.done(function(dato){
			//console.log(dato);
			if (dato["total"] > 0) {
				$("#idNombre").val(dato["nombre"]);
			}
		});
	}
}

function getNombreCliente(){

	var cedula = $("#cedulaCliente");

	if (cedula.val() != 0) {
		
		var datos = ExecAjax("ajax.php",cedula.val(),"serchCliente");
		
		datos.done(function(dato){
			//console.log(dato);
			if (dato["total"] > 0) {
				$("#nombreCliente").val(dato["nombre"]);
				$("#clienteNuevo").val(dato["id"]);
			}else{ $("#clienteNuevo").val(0); }
		});
	}
}

function validarIngresoProductoEditar(){

	nombre = $("#idNombreEdit");
	precioCompra= $("#idPrecioEdit");

	if (nombre.val() == 0) {
		$("#idDivNombreEdit").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanNombreEdit").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjNombreEdit").show(2000);
		return false;
	}else{
		$("#idDivNombreEdit").attr({"class":"form-group has-success has-feedback"});
		$("#idSpanNombreEdit").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjNombreEdit").hide(0);
	}

	if (precioCompra.val() == 0) {
		$("#idDivPrecioEdit").attr({"class":"form-group has-error has-feedback"});
		$("#idSpanPrecioEdit").attr({"class":"glyphicon glyphicon-remove form-control-feedback"});
		$("#idMsjPrecioEdit").show(2000);
		return false;
	
	}else{
		$("#idDivPrecioEdit").attr({"class":"form-group has-success has-feedback"});
		$("#idSpanPrecioEdit").attr({"class":"glyphicon glyphicon-ok form-control-feedback"});
		$("#idMsjPrecioEdit").hide(0);
	}
	enviarFormulario('formIdProductoEditar');

}

function getInfoDetalleProducto(idValue,nombreValue){

	$.ajax({
			method:"POST",
			url:"vistaDetalleProducto.php",
			dataType:"html",
			data:{idRegistro:idValue}
		}).done(function (dato) {
			$("#detalleIdProducto").html(dato);
			$("#exampleModalDetalleProducto").modal('show');
		});	

}

function getInfoDetalleFactura(idValue){

	$.ajax({
			method:"POST",
			url:"vistaDetalleFactura.php",
			dataType:"html",
			data:{ctID:idValue,add:""}
		}).done(function (dato) {
			$("#detalleIdFactura").html(dato);
			$("#exampleModalDetalleFactura").modal('show');
		});	

}

function marcarProductoElegido(id){
	$("#marcardoTotal").val();
	
	if ($("#input"+id).val() <= 0) {
			$("#panel"+id).attr({"class":"panel panel-primary"});
			$("#marcado"+id).val(0);
	}else{
		if ( parseInt($("#input"+id).val()) <= parseInt($("#totalV"+id).val()) ) {
			$("#panel"+id).attr({"class":"panel panel-default"});
			$("#marcado"+id).val(1);
		}else{
			$("#panel"+id).attr({"class":"panel panel-primary"});
			$("#marcado"+id).val(0);
			$("#diferenciaM").html(parseInt($("#input"+id).val()) - parseInt($("#totalV"+id).val()));
			$("#maximaM").html( $("#totalV"+id).val() );
			$("#input"+id).val($("#totalV"+id).val());
			$(".bs-example-modal-sm-producto-total-existente").modal("show");

		}
		
		
	}
}

function imprimirFactura(){

	$.ajax({
			method:"POST",
			url:"vistaFactura.php",
			dataType:"html",
			data:{ctID:$("#cotizacion_id").val(),add:"factura"},
			complete: function(){
				window.location="factura.php";
			}
		}).done(function (dato) {
			//console.log(dato);
			var pg = window.open("");
			pg.document.write(dato);
			pg.print();
		});	

}

function introducirCantidad(id){
	$("#"+id).focus();
}

function htmltopdf() {
	$.ajax({
			method:"POST",
			url:"vistaFactura.php",
			dataType:"html",
			data:{ctID:$("#cotizacion_id").val(),add:"ExportarPDF"},
			complete: function(){
				//window.location="factura.php";
			}
		}).done(function (dato) {
			
			 var pdf = new jsPDF('p', 'pt', 'letter');
			    source = dato;
			    specialElementHandlers = {
			        '#bypassme': function (element, renderer) {
			            return true
			        }
			    };
			    margins = {
			        top: 80,
			        bottom: 60,
			        left: 40,
			        width: 522
			    };
			    pdf.fromHTML(
			    source, 
			    margins.left,
			    margins.top, { 
			        'width': margins.width, 
			        'elementHandlers': specialElementHandlers
			    },

			    function (dispose) {
			        pdf.save('Exportar.pdf');
			    }, margins);

		});	


   
}

function htmlWordExcel(tipo){

			url="vistaFactura.php?cotizacion_id="+$("#cotizacion_id").val()+"&add="+tipo;
			var pg = window.open(url);
}
