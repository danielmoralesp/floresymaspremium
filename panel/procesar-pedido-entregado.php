<?php


	session_start();
	if($_SESSION["usuario"]){

	require_once("../conexion.php");
	
	
		$res = mysql_query($sql,$con);
		
		// enviar el correo
	$remitente="FloresyMas.co <ventas@floresymas.co>";
	$asunto="Su Producto con FloresyMas.co ha Sido Entregado";
	$cuerpo="
	<html>
		<head>		
		
		</head>
		
		<body>
			<h3>Su Producto ha Sido Entregado
			</h3>	
	<hr class='soft'/>

	
	<h4>Detalles</h4>
	<table id='compairTbl' class='table table-bordered'>
              <thead>
                <tr>
                  <th>Items</th>
                  <th>Detalles de la Entrega  </th>
                  
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>Fecha del Pedido</td>
                  <td>".$_POST["fecha_de_pedido"]."</td>
				 </tr>
				 
				  <tr>
                  <td>Fecha de Entrega</td>
                  <td>".$_POST["fecha_de_entrega"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Nombre del Producto</td>
                  <td>".$_POST["nombre_del_producto"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Nombre de Quien Llama</td>
                  <td>".$_POST["nombre_de_quien_llama"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Telefonos de Quien Llama</td>
                  <td>".$_POST["telefonos_de_quien_llama"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Email de Quien Llama</td>
                  <td>".$_POST["email_de_quien_llama"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Nombre del Remitente (¿Quien Envia?)</td>
                  <td>".$_POST["nombre_de_quien_envia"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Nombre de Quien Recibe</td>
                  <td>".$_POST["nombre_de_quien_recibe"]."</td>
				 </tr>
				 
				 <br><br>
				 -------------------------------------------
				 
				 <tr>
                  <td>Hora de Entrega</td>
                  <td>".$_POST["hora_real_entrega"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Nombre de Quien Recibio</td>
                  <td>".$_POST["nombre_de_quien_recibio"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Link de Fotografia</td>
                  <td>".$_POST["link_fotografia"]."</td>
				 </tr>
				 
				 <tr>
                  <td>Observaciones de la Entrega</td>
                  <td>".$_POST["observaciones_de_entrega"]."</td>
				 </tr>
				
				
			</tbody>
	</table>
	
		
		
		</body>
	
	</html>
	";
	
	$sheader="From:".$remitente."\nReplay-To:".$remitente."\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mine-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html";
	
	mail("ventas@floresymas.co,".$_POST["email_de_quien_llama"]."",$asunto,$cuerpo,$sheader);
		//header("Location: ver_imagen.php?
		$id= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='index';
		</script>";
		
		//******************************	
	
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='login';
			  </script>";
	}
	
	
	
	


?>