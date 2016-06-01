<?php
	ini_set("session.cookie_lifetime","7200");
	ini_set("session.gc_maxlifetime","7200");
	session_start();	
	if($_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ventas Dia | FloresyMas.co</title>
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
    <?php require_once("../instancias/menu-dashboard-catalogo.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->


	<!-- main container -->
    <div class="content">   
        <div id="pad-wrapper">         
            <?php
			$fecha_de_pedido=$_POST["fecha_de_pedido"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Pedidos del Dia (<?php  echo $fecha_de_pedido?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Pedidos </h4>
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
                                <th class="col-md-4">
                                    Datos
                                </th>
                                <th class="col-md-4">
                                    <span class="line"></span>
                                    # Pedidos
                                </th>
								<th class="col-md-4">
                                    <span class="line"></span>
                                    $ Total
                                </th>
                            </tr>
                        </thead>												
                        <tbody>
							<?php 
								$mysql_CONSULTA_PEDIDOS_PENDIENTES = "SELECT COUNT(*) FROM pedidos where estado_pedido='1' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_PENDIENTES=mysql_query($mysql_CONSULTA_PEDIDOS_PENDIENTES,$con);
								$rcount_PEDIDOS_PENDIENTES=mysql_result($query_PEDIDOS_PENDIENTES,0);
								
								$sql2 = "select * from pedidos where estado_pedido='1' and fecha_de_pedido='$fecha_de_pedido'";
								$res2 = mysql_query($sql2,$con);
									while($reg2 = mysql_fetch_array($res2)){
										if(isset($reg2["id_pedidos"])){									
											$id_pedidos=$reg2["id_pedidos"];											
											$total=$reg2["total"];											

											$pendientes[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
										}
									}
								 									
									if(isset($pendientes)){
										$total_pendientes=0;
										for($i=0;$i<count($pendientes);$i++){	
											$subtotal_pendientes = $pendientes[$i]['total'];
											$total_pendientes= $total_pendientes + $subtotal_pendientes;											
										}												
									}
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
									<span class="label label-warning">#Pedidos Pendientes</span>                                    
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_PENDIENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_pendientes); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_REALIZADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_REALIZADOS=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS,$con);
								$rcount_PEDIDOS_REALIZADOS=mysql_result($query_PEDIDOS_REALIZADOS,0);
								
								$sql3 = "select * from pedidos where estado_pedido='5' and fecha_de_pedido='$fecha_de_pedido'";
								$res3 = mysql_query($sql3,$con);
									while($reg3 = mysql_fetch_array($res3)){
										if(isset($reg3["id_pedidos"])){									
											$id_pedidos=$reg3["id_pedidos"];											
											$total=$reg3["total"];											

											$realizados[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
										}
									}
								 									
									if(isset($realizados)){
										$total_realizados=0;
										for($i=0;$i<count($realizados);$i++){	
											$subtotal_realizados = $realizados[$i]['total'];
											$total_realizados= $total_realizados + $subtotal_realizados;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-success">#Pedidos Realizados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_CONFIRMADOS=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS,$con);
								$rcount_PEDIDOS_CONFIRMADOS=mysql_result($query_PEDIDOS_CONFIRMADOS,0);
								
								$sql4 = "select * from pedidos where estado_pedido='15' and fecha_de_pedido='$fecha_de_pedido'";
								$res4 = mysql_query($sql4,$con);
									while($reg4 = mysql_fetch_array($res4)){
										if(isset($reg4["id_pedidos"])){									
											$id_pedidos=$reg4["id_pedidos"];											
											$total=$reg4["total"];											

											$confirmados[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
										}
									}
								 									
									if(isset($confirmados)){
										$total_confirmados=0;
										for($i=0;$i<count($confirmados);$i++){	
											$subtotal_confirmados = $confirmados[$i]['total'];
											$total_confirmados= $total_confirmados + $subtotal_confirmados;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-info">#Pedidos Confirmados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS; ?>
                                </td>
								<td>
                                     $<?php echo number_format($total_confirmados); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_ABORTADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='7' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_ABORTADOS=mysql_query($mysql_CONSULTA_PEDIDOS_ABORTADOS,$con);
								$rcount_PEDIDOS_ABORTADOS=mysql_result($query_PEDIDOS_ABORTADOS,0);
								
								$sql5 = "select * from pedidos where estado_pedido='7' and fecha_de_pedido='$fecha_de_pedido'";
								$res5 = mysql_query($sql5,$con);
									while($reg5 = mysql_fetch_array($res5)){
										if(isset($reg5["id_pedidos"])){									
											$id_pedidos=$reg5["id_pedidos"];											
											$total=$reg5["total"];											

											$abortados[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
										}
									}
								 									
									if(isset($abortados)){
										$total_abortados=0;
										for($i=0;$i<count($abortados);$i++){	
											$subtotal_abortados = $abortados[$i]['total'];
											$total_abortados= $total_abortados + $subtotal_abortados;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-danger">#Pedidos Abortados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_ABORTADOS; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_abortados); ?>
                                </td>
							</tr>
                        </tbody>
												
                        <tbody>							
                            <!-- row -->
                            							
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>	
		<?php 
			$mysql_CONSULTA_TOTAL_PEDIDOS = "SELECT COUNT(*) FROM pedidos where fecha_de_pedido='$fecha_de_pedido'";
			$query_TOTAL_PEDIDOS=mysql_query($mysql_CONSULTA_TOTAL_PEDIDOS,$con);
			$rcount_TOTAL_PEDIDOS=mysql_result($query_TOTAL_PEDIDOS,0);
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-8 col-sm-8 stat">
                </div>                
                <div class="col-md-4 col-sm-4 stat last">                    
					<div class="data">
                        <span class="number"><?php echo $rcount_TOTAL_PEDIDOS;?></span>
                        Pedidos Total
                    </div>
                    <span class="date"><?php echo $fecha_de_pedido;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->		
		
		
		<div id="pad-wrapper">         

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Pedidos del Dia (<?php  echo $fecha_de_pedido?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Pedidos Recurrentes </h4>
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
                                <th class="col-md-4">
                                    Datos
                                </th>
                                <th class="col-md-4">
                                    <span class="line"></span>
                                    # Pedidos
                                </th>
								<th class="col-md-4">
                                    <span class="line"></span>
                                    $ Total
                                </th>
                            </tr>
                        </thead>												
                        <tbody>
							<?php 
								$mysql_CONSULTA_PEDIDOS_PENDIENTES_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='1' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_PENDIENTES_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_PENDIENTES_RECURRENTES,$con);
								$rcount_PEDIDOS_PENDIENTES_RECURRENTES=mysql_result($query_PEDIDOS_PENDIENTES_RECURRENTES,0);
								
								$sql6 = "select * from pedidos_plan_continuidad where estado_pedido='1' and fecha_de_pedido='$fecha_de_pedido'";
								$res6 = mysql_query($sql6,$con);
									while($reg6 = mysql_fetch_array($res6)){
										if(isset($reg6["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg6["id_pedidos_plan_continuidad"];											
											$total=$reg6["total"];											

											$pendientes_recurrentes[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($pendientes_recurrentes)){
										$total_pendientes_recurrentes=0;
										for($i=0;$i<count($pendientes_recurrentes);$i++){	
											$subtotal_pendientes_recurrentes = $pendientes_recurrentes[$i]['total'];
											$total_pendientes_recurrentes= $total_pendientes_recurrentes + $subtotal_pendientes_recurrentes;											
										}												
									}
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
									<span class="label label-warning">#Pedidos Pendientes</span>                                    
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_PENDIENTES_RECURRENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_pendientes_recurrentes); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_REALIZADOS_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_RECURRENTES,$con);
								$rcount_PEDIDOS_REALIZADOS_RECURRENTES=mysql_result($query_PEDIDOS_REALIZADOS_RECURRENTES,0);
								
								$sql7 = "select * from pedidos_plan_continuidad where estado_pedido='5' and fecha_de_pedido='$fecha_de_pedido'";
								$res7 = mysql_query($sql7,$con);
									while($reg7 = mysql_fetch_array($res7)){
										if(isset($reg7["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg7["id_pedidos_plan_continuidad"];											
											$total=$reg7["total"];											

											$realizados_recurrentes[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($realizados_recurrentes)){
										$total_realizados_recurrentes=0;
										for($i=0;$i<count($realizados_recurrentes);$i++){	
											$subtotal_realizados_recurrentes = $realizados_recurrentes[$i]['total'];
											$total_realizados_recurrentes= $total_realizados_recurrentes + $subtotal_realizados_recurrentes;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-success">#pedidos_plan_continuidad Realizados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_RECURRENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados_recurrentes); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_CONFIRMADOS_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_RECURRENTES,$con);
								$rcount_PEDIDOS_CONFIRMADOS_RECURRENTES=mysql_result($query_PEDIDOS_CONFIRMADOS_RECURRENTES,0);
								
								$sql9 = "select * from pedidos_plan_continuidad where estado_pedido='15' and fecha_de_pedido='$fecha_de_pedido'";
								$res9 = mysql_query($sql9,$con);
									while($reg9 = mysql_fetch_array($res9)){
										if(isset($reg9["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg9["id_pedidos_plan_continuidad"];											
											$total=$reg9["total"];											

											$confirmados_recurrentes[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($confirmados_recurrentes)){
										$total_confirmados_recurrentes=0;
										for($i=0;$i<count($confirmados_recurrentes);$i++){	
											$subtotal_confirmados_recurrentes = $confirmados_recurrentes[$i]['total'];
											$total_confirmados_recurrentes= $total_confirmados_recurrentes + $subtotal_confirmados_recurrentes;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-info">#Pedidos Confirmados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_RECURRENTES; ?>
                                </td>
								<td>
                                     $<?php echo number_format($total_confirmados_recurrentes); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_ABORTADOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='7' and fecha_de_pedido='$fecha_de_pedido'";
								$query_PEDIDOS_ABORTADOS_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_ABORTADOS_RECURRENTES,$con);
								$rcount_PEDIDOS_ABORTADOS_RECURRENTES=mysql_result($query_PEDIDOS_ABORTADOS_RECURRENTES,0);
								
								$sql10 = "select * from pedidos_plan_continuidad where estado_pedido='7' and fecha_de_pedido='$fecha_de_pedido'";
								$res10 = mysql_query($sql10,$con);
									while($reg10 = mysql_fetch_array($res10)){
										if(isset($reg10["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg10["id_pedidos_plan_continuidad"];											
											$total=$reg10["total"];											

											$abortados_recurrentes[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($abortados_recurrentes)){
										$total_abortados_recurrentes=0;
										for($i=0;$i<count($abortados_recurrentes);$i++){	
											$subtotal_abortados_recurrentes = $abortados_recurrentes[$i]['total'];
											$total_abortados_recurrentes= $total_abortados_recurrentes + $subtotal_abortados_recurrentes;											
										}												
									}
							?>
							<tr class="first">
                                <td>
                                    <span class="label label-danger">#Pedidos Abortados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_ABORTADOS_RECURRENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_abortados_recurrentes); ?>
                                </td>
							</tr>
                        </tbody>
												
                        <tbody>							
                            <!-- row -->
                            							
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>	
		<?php 
			$mysql_CONSULTA_TOTAL_PEDIDOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where fecha_de_pedido='$fecha_de_pedido'";
			$query_TOTAL_PEDIDOS_RECURRENTES=mysql_query($mysql_CONSULTA_TOTAL_PEDIDOS_RECURRENTES,$con);
			$rcount_TOTAL_PEDIDOS_RECURRENTES=mysql_result($query_TOTAL_PEDIDOS_RECURRENTES,0);
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-8 col-sm-8 stat">
                </div>                
                <div class="col-md-4 col-sm-4 stat last">                    
					<div class="data">
                        <span class="number"><?php echo $rcount_TOTAL_PEDIDOS_RECURRENTES;?></span>
                        Pedidos Total
                    </div>
                    <span class="date"><?php echo $fecha_de_pedido;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->		
			
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
	
	<?php
		}
	?>
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