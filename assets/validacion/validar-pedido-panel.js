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
		if(form.nombre_del_producto.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_del_producto").innerHTML="<font color='red'>Ingrese Nombre del Producto</font>";
			form.nombre_del_producto.value = "";
			form.nombre_del_producto.focus();
			return false;
		}else{
			document.getElementById("div_nombre_del_producto").innerHTML="";
		}
		
		//************************************************************************	
		
		
		if(form.unidades_de_rosas.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_unidades_de_rosas").innerHTML="<font color='red'>Ingrese Unidades de Rosas</font>";
			form.unidades_de_rosas.value = "";
			form.unidades_de_rosas.focus();
			return false;
		}else{
			document.getElementById("div_unidades_de_rosas").innerHTML="";
		}
		
		//************************************************************************		

		if(form.colores_de_rosas.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_colores_de_rosas").innerHTML="<font color='red'>Ingrese Colores de Rosas</font>";
			form.colores_de_rosas.value = "";
			form.colores_de_rosas.focus();
			return false;
		}else{
			document.getElementById("div_colores_de_rosas").innerHTML="";
		}
		
		//************************************************************************	

		
		if(form.cantidad.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_cantidad").innerHTML="<font color='red'>Ingrese la Cantidad</font>";
			form.cantidad.value = "";
			form.cantidad.focus();
			return false;
		}else{
			document.getElementById("div_cantidad").innerHTML="";
		}
		
		//************************************************************************	

		
		if(form.total.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_total").innerHTML="<font color='red'>Ingrese el Total</font>";
			form.total.value = "";
			form.total.focus();
			return false;
		}else{
			document.getElementById("div_total").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.hora_de_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_hora_de_entrega").innerHTML="<font color='red'>Ingrese la Hora de Entrega</font>";
			form.hora_de_entrega.value = "";
			form.hora_de_entrega.focus();
			return false;
		}else{
			document.getElementById("div_hora_de_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.dir_1_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_1_entrega").innerHTML="<font color='red'>Ingrese Direccion</font>";
			form.dir_1_entrega.value = "";
			form.dir_1_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_1_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.dir_2_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_2_entrega").innerHTML="<font color='red'>Ingrese Direccion</font>";
			form.dir_2_entrega.value = "";
			form.dir_2_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_2_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.dir_3_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_3_entrega").innerHTML="<font color='red'>Ingrese Direccion</font>";
			form.dir_3_entrega.value = "";
			form.dir_3_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_3_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.dir_4_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_4_entrega").innerHTML="<font color='red'>Ingrese Direccion</font>";
			form.dir_4_entrega.value = "";
			form.dir_4_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_4_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.dir_5_entrega.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_dir_5_entrega").innerHTML="<font color='red'>Ingrese Direccion</font>";
			form.dir_5_entrega.value = "";
			form.dir_5_entrega.focus();
			return false;
		}else{
			document.getElementById("div_dir_5_entrega").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.barrio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_barrio").innerHTML="<font color='red'>Ingrese el Barrio</font>";
			form.barrio.value = "";
			form.barrio.focus();
			return false;
		}else{
			document.getElementById("div_barrio").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.ayuda_envio.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_ayuda_envio").innerHTML="<font color='red'>Ingrese Ayuda para el Envio</font>";
			form.ayuda_envio.value = "";
			form.ayuda_envio.focus();
			return false;
		}else{
			document.getElementById("div_ayuda_envio").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.nombre_de_quien_envia.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_envia").innerHTML="<font color='red'>Ingrese Nombre de Quien Envia</font>";
			form.nombre_de_quien_envia.value = "";
			form.nombre_de_quien_envia.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_envia").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.nombre_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="<font color='red'>Ingrese Nombre de Quien Recibe</font>";
			form.nombre_de_quien_recibe.value = "";
			form.nombre_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_recibe").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.telefono_de_quien_recibe.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="<font color='red'>Ingrese Telefono de Quien Recibe</font>";
			form.telefono_de_quien_recibe.value = "";
			form.telefono_de_quien_recibe.focus();
			return false;
		}else{
			document.getElementById("div_telefono_de_quien_recibe").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.mensaje_para_tarjeta.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="<font color='red'>Ingrese Mensaje Para la Tarjeta</font>";
			form.mensaje_para_tarjeta.value = "";
			form.mensaje_para_tarjeta.focus();
			return false;
		}else{
			document.getElementById("div_mensaje_para_tarjeta").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.nombre_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_nombre_de_quien_llama").innerHTML="<font color='red'>Ingrese Nombre de Quien Llama</font>";
			form.nombre_de_quien_llama.value = "";
			form.nombre_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_nombre_de_quien_llama").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.telefono_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_telefono_de_quien_llama").innerHTML="<font color='red'>Ingrese Telefono de Quien Llama</font>";
			form.telefono_de_quien_llama.value = "";
			form.telefono_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_telefono_de_quien_llama").innerHTML="";
		}
		
		//************************************************************************	
		
		if(form.email_de_quien_llama.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_email_de_quien_llama").innerHTML="<font color='red'>Ingrese Email de Quien Llama</font>";
			form.email_de_quien_llama.value = "";
			form.email_de_quien_llama.focus();
			return false;
		}else{
			document.getElementById("div_email_de_quien_llama").innerHTML="";
		}
		
		
		
		
		document.form.submit();

}

















