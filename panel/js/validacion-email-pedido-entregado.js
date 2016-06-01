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
		if(form.hora_real_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_hora_real_entrega").innerHTML="<font color='red'>Ingrese la Hora de Entrega</font><br>";
			form.hora_real_entrega.value = "";
			form.hora_real_entrega.focus();
			return false;
		}else{
			document.getElementById("div_hora_real_entrega").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.nombre_de_quien_recibio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_recibio").innerHTML="<font color='red'>Ingrese el Nombre de Quien Recibio</font><br>";
			form.nombre_de_quien_recibio.value = "";
			form.nombre_de_quien_recibio.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_recibio").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.link_fotografia.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_link_fotografia").innerHTML="<font color='red'>Ingrese el Link de la Fotografia</font><br>";
			form.link_fotografia.value = "";
			form.link_fotografia.focus();
			return false;
		}else{
			document.getElementById("div_link_fotografia").innerHTML="";
		}
			
		
		
		document.form.submit();

}