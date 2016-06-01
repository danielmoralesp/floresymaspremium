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
	<title>Reporte Mensual | FloresyMas.co</title>
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
	<link rel="stylesheet" href="../css/compiled/index.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!-- navbar -->
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard3.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
	<!-- main container -->


	<!-- main container -->
    <div class="content">   
        <div id="pad-wrapper">         
            <?php
			$mes_de_entrega=$_POST["mes_de_entrega"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Reporte del Mes (<?php  echo $mes_de_entrega?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Productos Mas Vendidos </h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                     
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    Productos Mas Vendidos
                                </th>
                                <th class="col-md-9">
                                    <span class="line"></span>
                                    # Pedidos
                                </th>								
                            </tr>
                        </thead>					
                        <tbody>							
                            <!-- row -->
                            <tr class="first">
								<?php 
									$sql2 = "select * from pedidos where estado_pedido='Pendiente' and mes_de_entrega='$mes_de_entrega'";
										$res2 = mysql_query($sql2,$con);
											while($reg2 = mysql_fetch_array($res2)){
											$nombre_del_producto = $reg2["nombre_del_producto"];	
											
								?>
                                <td>
									<?php echo $reg2["nombre_del_producto"];?> 
                                </td>
								<?php
										}
								?>
                                <td>
									<?php
									$mysql_CONSULTA_PRODUCTOS_MAS_VENDIDOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='Pendiente' and nombre_del_producto='$nombre_del_producto' and mes_de_entrega='$mes_de_entrega' order by id_pedidos";
									$query_PRODUCTOS_MAS_VENDIDOS=mysql_query($mysql_CONSULTA_PRODUCTOS_MAS_VENDIDOS,$con);
									$rcount_PRODUCTOS_MAS_VENDIDOS=mysql_result($query_PRODUCTOS_MAS_VENDIDOS,0);
                                     echo $rcount_PRODUCTOS_MAS_VENDIDOS; 
									 ?>
                                </td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>

    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>
<?php
		}
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Por favor ingrese al Sistema');
				window.location='../usuarios/login';
			  </script>";
	}		
?>