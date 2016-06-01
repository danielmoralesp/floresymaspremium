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
		if(form.user.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_user").innerHTML="Ingrese su Correo Electronico";
			form.user.value = "";
			form.user.focus();
			return false;
		}else{
			document.getElementById("div_user").innerHTML="";
		}
		
		//************************************************************************	
		
		
		if(valida_correo(form.user.value) == false){
			//alert("Ingrese un correo valido");
			document.getElementById("div_user").innerHTML="Ingrese un correo valido";
			form.user.value = "";
			form.user.focus();
			return false;
		}else{
			document.getElementById("div_user").innerHTML="";
		}

		
		
		document.form.submit();

}