	<?php 
	session_start();
	include('../conexion.php');
	
	$usuarioIng=$_POST['user'];
	$passIng=$_POST['pass'];
	$id_pedidos_plan_continuidad=$_GET['id_pedidos_plan_continuidad'];	
	$sql="select * from usuarios";
	
	
	$consulta=mysql_query($sql,$con);
		$puerta='continuar';
		while($filas=mysql_fetch_array($consulta) and $puerta='continuar'){
			$id_usuario=$filas['id_usuario'];
			$user=$filas['user'];
			$pass=$filas['pass'];
			$permisos=$filas['permisos'];
			
			if(isset($usuarioIng) and isset($passIng)){
				if($user==$usuarioIng and $pass==$passIng){
					//echo 'bienvenido'.$user;
					$miSession=array(
						'id_usuario'=>$id_usuario,'user'=>$user,'pass'=>$pass,'permisos'=>$permisos
					);
					//ir a la pagina restringida
					$_SESSION['miSession']=$miSession;
					?>					
					<html>
						<head>
							<!--<meta http-equiv="refresh" content="0; url=../checkout/checkout.php?id_pedidos=<?php $id_pedidos?>">-->
							<script type="text/javascript">
								window.location.href="../planes/envios-recurrentes/paso4.php?id_pedidos_plan_continuidad=<?php echo $id_pedidos_plan_continuidad ?>&id_usuario=<?php echo $id_usuario?>";								
							</script>
						</head>
						<body>
						</body>
					</html>
					<?php
					$puerta='salir';
					exit;					
				}else{
					$resultado='no';
				}			
			}
		}
		if($resultado=='no'){	

			echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["user"]." no existe en la base de datos');
				window.location='login-recurrente.php?id_pedidos_plan_continuidad=$id_pedidos_plan_continuidad&id_usuario=$id_usuario';
			  </script>";			
		}
	
?>