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
		if(form.primera_vez.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_primera_vez").innerHTML="<font color='red'>Ingrese la Respuesta</font><br>";
			form.primera_vez.value = "";
			form.primera_vez.focus();
			return false;
		}else{
			document.getElementById("div_primera_vez").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.referido.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_referido").innerHTML="<font color='red'>Ingrese la Respuesta</font><br>";
			form.referido.value = "";
			form.referido.focus();
			return false;
		}else{
			document.getElementById("div_referido").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.fuente_trafico.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_fuente_trafico").innerHTML="<font color='red'>Ingrese la  Respuesta</font><br>";
			form.fuente_trafico.value = "";
			form.fuente_trafico.focus();
			return false;
		}else{
			document.getElementById("div_fuente_trafico").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.estado_pedido.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_estado_pedido").innerHTML="<font color='red'>Ingrese Estado de Pedido</font><br>";
			form.estado_pedido.value = "";
			form.estado_pedido.focus();
			return false;
		}else{
			document.getElementById("div_estado_pedido").innerHTML="";
		}
		

		
		
		
		document.form.submit();

}