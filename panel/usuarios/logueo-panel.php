<?php
	
	session_start();
	require_once('../../conexion.php');
	
	$usuarioIng=$_POST['user'];
	$passIng=$_POST['pass'];
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
							<meta http-equiv="refresh" content="0; url=../pedidos/pedidos.php?id_usuario=<?php echo $id_usuario?>">
						</head>		
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
				window.location='login';
			  </script>";			
		}
	
?>