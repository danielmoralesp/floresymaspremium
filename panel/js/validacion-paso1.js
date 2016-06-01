// javascript
			function saludo(){
				alert("hola de nuevo");
			}
			
			function capa(texto){
				document.getElementById("muestra").innerHTML=texto;
				//alert(document.getElementById("campo").value);
			}

			
			
// Desarrollado por www.cesarcancino.com
//*****************************************************************************
//Valida correo
function valida_correo(correo) {
		  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
			
		   return (true)
		  } else {
		   
		   return (false);
		  }
		 }
//*************************************************************************************************************************************
//valida números
function valida_numero(numero)
{
if (!/^([0-9])*$/.test(numero)){
		return false;
}else{
		return true;
	}
}
//*******************************************************************************************************
//función para validar cadenas de solo letras
function valida_cadena(texto)
	{
		var RegExPattern = "[1-9]";
		 if (texto.match(RegExPattern))
		 {
		 	return false;
		 }else
		 {
		 	return true;
		 }
	}
	
//*******************************************************************************************************

function limpiar (){
	document.form.reset();
	document.form.nom.focus();
}



function validar(){
	var form = document.form;	
		
		
		//*****************************************************************************************
		if(form.fecha_de_pedido.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_fecha_de_pedido").innerHTML="<font color='red'>Ingrese la Fecha de Pedido</font><br>";
			form.fecha_de_pedido.value = "";
			form.fecha_de_pedido.focus();
			return false;
		}else{
			document.getElementById("div_fecha_de_pedido").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.fecha_de_pago.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_fecha_de_pago").innerHTML="<font color='red'>Ingrese la Fecha de Pago</font><br>";
			form.fecha_de_pago.value = "";
			form.fecha_de_pago.focus();
			return false;
		}else{
			document.getElementById("div_fecha_de_pago").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.fecha_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_fecha_de_entrega").innerHTML="<font color='red'>Ingrese la Fecha de Entrega</font><br>";
			form.fecha_de_entrega.value = "";
			form.fecha_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_fecha_de_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.hora_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_hora_de_entrega").innerHTML="<font color='red'>Ingrese la Hora de Entrega</font><br>";
			form.hora_de_entrega.value = "";
			form.hora_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_hora_de_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.tipo_de_producto.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_tipo_de_producto").innerHTML="<font color='red'>Ingrese el Tipo de Producto</font><br>";
			form.tipo_de_producto.value = "";
			form.tipo_de_producto.focus();
			return false;
		}else{
			document.getElementById("div_tipo_de_producto").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.atendido_por.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_atendido_por").innerHTML="<font color='red'>Ingrese Quien lo Atendio</font><br>";
			form.atendido_por.value = "";
			form.atendido_por.focus();
			return false;
		}else{
			document.getElementById("div_atendido_por").innerHTML="";
		}
		
		
		
		document.form.submit();

}