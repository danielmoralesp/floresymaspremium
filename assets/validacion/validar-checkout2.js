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
			document.getElementById("div_nombre_de_quien_llama").innerHTML="Ingrese sus Nombres Y Apellidos";
			form.nombre_de_quien_llama.value = "";
			form.nombre_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_llama").innerHTML="";
		}
		
		//************************************************************************	
		
		
		if(form.telefono_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefono_de_quien_llama").innerHTML="Ingrese su Numero Telefonico";
			form.telefono_de_quien_llama.value = "";
			form.telefono_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_telefono_de_quien_llama").innerHTML="";
		}

		

		
		
		document.form.submit();

}

















