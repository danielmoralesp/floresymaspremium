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
		if(form.nombre_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_llama").innerHTML="<font color='red'>Ingrese Nombre de Quien Llama</font><br>";
			form.nombre_de_quien_llama.value = "";
			form.nombre_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_llama").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.cedula.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_cedula").innerHTML="<font color='red'>Ingrese Cedula de Quien Llama</font><br>";
			form.cedula.value = "";
			form.cedula.focus();
			return false;
		}else{
			document.getElementById("div_cedula").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.telefonos_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefonos_de_quien_llama").innerHTML="<font color='red'>Ingrese el Telefono de Quien Llama</font><br>";
			form.telefonos_de_quien_llama.value = "";
			form.telefonos_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_telefonos_de_quien_llama").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.email_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_email_de_quien_llama").innerHTML="<font color='red'>Ingrese el Email de Quien Llama</font><br>";
			form.email_de_quien_llama.value = "";
			form.email_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_email_de_quien_llama").innerHTML="";
		}
		
		//*****************************************************************************************
		if(valida_correo(form.email_de_quien_llama.value) == false){
			//alert("Ingrese un correo valido");
			document.getElementById("div_email_de_quien_llama").innerHTML="<font color='red'>Ingrese un correo válido</font>";
			form.email_de_quien_llama.value = "";
			form.email_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_email_de_quien_llama").innerHTML="";
		}

		//*****************************************************************************************
		if(form.direccion_facturacion.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_direccion_facturacion").innerHTML="<font color='red'>Ingrese la Direccion de Facturacion</font><br>";
			form.direccion_facturacion.value = "";
			form.direccion_facturacion.focus();
			return false;
		}else{
			document.getElementById("div_direccion_facturacion").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.metodo_de_contacto.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_metodo_de_contacto").innerHTML="<font color='red'>Ingrese el Metodo de Contacto</font><br>";
			form.metodo_de_contacto.value = "";
			form.metodo_de_contacto.focus();
			return false;
		}else{
			document.getElementById("div_metodo_de_contacto").innerHTML="";
		}

		//*****************************************************************************************
		if(form.con_sin_factura.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_con_sin_factura").innerHTML="<font color='red'>Ingrese si Factura o no Factura</font><br>";
			form.con_sin_factura.value = "";
			form.con_sin_factura.focus();
			return false;
		}else{
			document.getElementById("div_con_sin_factura").innerHTML="";
		}
		
		
		
		
		document.form.submit();

}