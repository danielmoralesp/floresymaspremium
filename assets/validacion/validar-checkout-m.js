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
		if(form.dia_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dia_de_entrega").innerHTML="Ingrese Dia de Entrega";
			form.dia_de_entrega.value = "";
			form.dia_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dia_de_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.hora_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_hora_de_entrega").innerHTML="Ingrese Hora de Entrega";
			form.hora_de_entrega.value = "";
			form.hora_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_hora_de_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.ciudad_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_ciudad_de_entrega").innerHTML="Ingrese Ciudad de Entrega";
			form.ciudad_de_entrega.value = "";
			form.ciudad_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_ciudad_de_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.dir_1_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_1_entrega").innerHTML="Ingrese Direccion de Entrega";
			form.dir_1_entrega.value = "";
			form.dir_1_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_1_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.dir_4_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_4_entrega").innerHTML="Ingrese Numero de Apto / Oficina";
			form.dir_4_entrega.value = "";
			form.dir_4_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_4_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.barrio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_barrio").innerHTML="Ingrese Barrio de Entrega";
			form.barrio.value = "";
			form.barrio.focus();
			return false;
		}else{
			document.getElementById("div_barrio").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.ayuda_envio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_ayuda_envio").innerHTML="Ingrese Ayuda para el Envio";
			form.ayuda_envio.value = "";
			form.ayuda_envio.focus();
			return false;
		}else{
			document.getElementById("div_ayuda_envio").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.nombre_de_quien_envia.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_envia").innerHTML="Ingrese Nombre de Quien Envia";
			form.nombre_de_quien_envia.value = "";
			form.nombre_de_quien_envia.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_envia").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.nombre_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="Ingrese Nombre de Quien Recibe";
			form.nombre_de_quien_recibe.value = "";
			form.nombre_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.telefono_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="Ingrese Telefono de Quien Recibe";
			form.telefono_de_quien_recibe.value = "";
			form.telefono_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.mensaje_para_tarjeta.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="Ingrese Mensaje de la Tarjeta";
			form.mensaje_para_tarjeta.value = "";
			form.mensaje_para_tarjeta.focus();
			return false;
		}else{
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="";
		}



		
		
		document.form.submit();

}

















