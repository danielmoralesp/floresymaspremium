<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==2 or $_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>		
<!DOCTYPE html>
<html>
<head>
	<title>Detalle del Pedido | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <!-- bootstrap -->
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="../css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/icons.css" />
    <!-- libraries -->
    <link href="../css/lib/font-awesome.css" type="text/css" rel="stylesheet" />    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="../css/compiled/tables.css" type="text/css" media="screen" />
    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script language="javascript" type="text/javascript">
		function eliminar(id){
			if(confirm("Realmente desea eliminar el producto?")){
				window.location="eliminar-pedido.php?id_pedidos="+id;
			}
		}
	</script>
</head>
<body>
     <!-- navbar -->
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard-clientes.php"); ?>
    <!-- end sidebar -->
	<?php 
		$id_usuario = $_GET["id_usuario"];
		$sql2="select * from usuarios where id_usuario='".$_GET["id_usuario"]."'	"; 
		$res2 = mysql_query($sql2,$con);
		if($reg2 = mysql_fetch_array($res2)){			
	?>
	<!-- main container -->
    <div class="content">       
        <div id="pad-wrapper">            
            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Detalle del Cliente</h4>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                                <td class="description">
                                    ID Cliente
                                </td>
                                <td class="description">
                                   <?php echo $reg2["id_usuario"];?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Email del Cliente
                                </td>
                                <td class="description">
                                    <?php echo $reg2["user"];?>
                                </td>
                            </tr>
							<?php 
								$id_usuario= $reg2["id_usuario"];
								$mysql_CONSULTA_PEDIDOS = "SELECT COUNT(*) FROM pedidos where id_usuario='$id_usuario'";
								$query=mysql_query($mysql_CONSULTA_PEDIDOS,$con);
								$rcount_pedidos=mysql_result($query,0);	
							?>
							<tr class="first">
                                <td class="description">
                                   Numero de Pedidos Normales
                                </td>
                                <td class="description">
                                    <?php echo $rcount_pedidos;?>
                                </td>
                            </tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_PLAN_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where id_usuario='$id_usuario'";
								$query=mysql_query($mysql_CONSULTA_PEDIDOS_PLAN_CONTINUIDAD,$con);
								$rcount_pedidos_plan_continuidad=mysql_result($query,0);	
							?>
							<tr class="first">
                                <td class="description">
                                    Numero de Pedidos Recurrentes
                                </td>
                                <td class="description">
                                    <?php echo $rcount_pedidos_plan_continuidad;?>
                                </td>
                            </tr>							
						</tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->
			<div class="wizard-actions">
				<a href="index"><input type="button" class="btn-glow success btn-finish" value="Listado de Clientes" /></a>							
			</div>
        </div>
    </div>	
	<?php
			}
		}
	?>
    <!-- end main container -->
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>
<?php
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Por favor ingrese al Sistema');
				window.location='../usuarios/login';
			  </script>";
	}	
?>