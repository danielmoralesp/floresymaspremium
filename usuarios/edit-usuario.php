<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==1){
		require_once("../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){
		
		
		$sql2 = "UPDATE usuarios
		set 
		user = '".$_POST["user"]."',
		pass = '".$_POST["pass"]."',
		permisos = '".$_POST["permisos"]."',
		id_pedidos = '".$_POST["id_pedidos"]."'
		
		
		where
		id_usuario = ".$_POST["id_usuario"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);		

		
		$id_usuario= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'detalles-perfil.php?id_usuario=".$_POST["id_usuario"]."';
			</script>";
			
	}else{
		echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["user"]." no tiene permisos de ingreso');
				window.location='perfil';
			  </script>";
		?>
		<html>
			<meta http-equiv="refresh" content="0; url=perfil">
		</html>
		<?php
	}

		
?>	