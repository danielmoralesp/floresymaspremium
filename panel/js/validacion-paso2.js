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
			document.getElementById("div_nombre_del_producto").innerHTML="<font color='red'>Ingrese Nombre del Producto</font><br>";
			form.nombre_del_producto.value = "";
			form.nombre_del_producto.focus();
			return false;
		}else{
			document.getElementById("div_nombre_del_producto").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.precio_del_producto.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_precio_del_producto").innerHTML="<font color='red'>Ingrese el Precio del Producto</font><br>";
			form.precio_del_producto.value = "";
			form.precio_del_producto.focus();
			return false;
		}else{
			document.getElementById("div_precio_del_producto").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.total_compra.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_total_compra").innerHTML="<font color='red'>Ingrese el Total de la Compra</font><br>";
			form.total_compra.value = "";
			form.total_compra.focus();
			return false;
		}else{
			document.getElementById("div_total_compra").innerHTML="";
		}
		
		//*****************************************************************************************
		if(form.metodo_pago.value == 0){
			//alert("Ingrese el nombre");
			document.getElementById("div_metodo_pago").innerHTML="<font color='red'>Ingrese el Método de Pago</font><br>";
			form.metodo_pago.value = "";
			form.metodo_pago.focus();
			return false;
		}else{
			document.getElementById("div_metodo_pago").innerHTML="";
		}
		
		
		
		document.form.submit();

}