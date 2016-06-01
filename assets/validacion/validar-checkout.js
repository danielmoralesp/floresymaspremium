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
		if(form.hora_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_hora_de_entrega").innerHTML="<font color='red'>Anexe Hora de Entrega</font>";
			form.hora_de_entrega.value = "";
			form.hora_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_hora_de_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		
		if(form.dir_2_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_2_entrega").innerHTML="Anexe la Direccion";
			form.dir_2_entrega.value = "";
			form.dir_2_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_2_entrega").innerHTML="";
		}
		
		//************************************************************************		

		if(form.dir_3_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_3_entrega").innerHTML="Anexe la Direccion";
			form.dir_3_entrega.value = "";
			form.dir_3_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_3_entrega").innerHTML="";
		}
		
		//************************************************************************		


		
		if(form.dir_5_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_5_entrega").innerHTML="Anexe Numero";
			form.dir_5_entrega.value = "";
			form.dir_5_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_5_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.barrio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_barrio").innerHTML="Ingrese el Barrio";
			form.barrio.value = "";
			form.barrio.focus();
			return false;
		}else{
			document.getElementById("div_barrio").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.ayuda_envio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_ayuda_envio").innerHTML="Ingrese Informacion de Ayuda para la Entrega";
			form.ayuda_envio.value = "";
			form.ayuda_envio.focus();
			return false;
		}else{
			document.getElementById("div_ayuda_envio").innerHTML="";
		}
		
		//************************************************************************
		
		if(form.nombre_de_quien_envia.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_envia").innerHTML="Ingrese Nombre de Quien Envia";
			form.nombre_de_quien_envia.value = "";
			form.nombre_de_quien_envia.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_envia").innerHTML="";
		}
		
		//************************************************************************
		
		if(form.nombre_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="Ingrese Nombre de Quien Recibe";
			form.nombre_de_quien_recibe.value = "";
			form.nombre_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="";
		}
		
		//************************************************************************
		
		if(form.telefono_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="Ingrese Telefono de Quien Recibe";
			form.telefono_de_quien_recibe.value = "";
			form.telefono_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="";
		}
		
		//************************************************************************
		
		if(form.mensaje_para_tarjeta.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="Ingrese Mensaje para Tarjeta";
			form.mensaje_para_tarjeta.value = "";
			form.mensaje_para_tarjeta.focus();
			return false;
		}else{
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="";
		}
		
		//************************************************************************
		
		
		document.form.submit();

}

















