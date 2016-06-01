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
	<title>Ventas Dia | FloresyMasPremium.co</title>
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
	
        <!-- main stats -->
		<div id="pad-wrapper">         
            <?php
			$fecha_de_pago=$_POST["fecha_de_pago"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Ventas del Dia (<?php  echo $fecha_de_pago?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Ventas </h4>
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS,$con);
								$rcount_PEDIDOS_REALIZADOS=mysql_result($query_PEDIDOS_REALIZADOS,0);
								
								$sql3 = "select * from pedidos where estado_pedido='5' and fecha_de_pago='$fecha_de_pago'";
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
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS,$con);
								$rcount_PEDIDOS_CONFIRMADOS=mysql_result($query_PEDIDOS_CONFIRMADOS,0);
								
								$sql4 = "select * from pedidos where estado_pedido='15' and fecha_de_pago='$fecha_de_pago'";
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
							<tr class="first">
                                <td>
                                    Totales
                                </td>
                                <td>
                                    <?php echo $totales= $rcount_PEDIDOS_REALIZADOS + $rcount_PEDIDOS_CONFIRMADOS; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados + $total_confirmados); ?>
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
			$rcount_totalS=$rcount_PEDIDOS_REALIZADOS+$rcount_PEDIDOS_CONFIRMADOS;
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                </div>                
                <div class="col-md-6 col-sm-6 stat last">                    
					<div class="data">
                        <span class="number"><?php echo $rcount_TOTAL_PEDIDOS;?></span>
                        Pedidos Total =
						<span class="number">$<?php echo number_format($total_realizados + $total_confirmados);?></span>
                        Ventas Total
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->	

        <!-- main stats -->
		<div id="pad-wrapper">         
            <?php
			$fecha_de_pago=$_POST["fecha_de_pago"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Ventas del Dia (<?php  echo $fecha_de_pago?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Ventas Recurrentes</h4>
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_RECURRENTES,$con);
								$rcount_PEDIDOS_REALIZADOS_RECURRENTES=mysql_result($query_PEDIDOS_REALIZADOS_RECURRENTES,0);
								
								$sql5 = "select * from pedidos_plan_continuidad where estado_pedido='5' and fecha_de_pago='$fecha_de_pago'";
								$res5 = mysql_query($sql5,$con);
									while($reg5 = mysql_fetch_array($res5)){
										if(isset($reg5["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg5["id_pedidos_plan_continuidad"];											
											$total=$reg5["total"];											

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
                                    <span class="label label-success">#Pedidos Realizados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_RECURRENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados_recurrentes); ?>
                                </td>
							</tr>
							<?php 
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_RECURRENTES = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS_RECURRENTES=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_RECURRENTES,$con);
								$rcount_PEDIDOS_CONFIRMADOS_RECURRENTES=mysql_result($query_PEDIDOS_CONFIRMADOS_RECURRENTES,0);
								
								$sql6 = "select * from pedidos_plan_continuidad where estado_pedido='15' and fecha_de_pago='$fecha_de_pago'";
								$res6 = mysql_query($sql6,$con);
									while($reg6 = mysql_fetch_array($res6)){
										if(isset($reg6["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg6["id_pedidos_plan_continuidad"];											
											$total=$reg6["total"];											

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
							<tr class="first">
                                <td>
                                    Totales
                                </td>
                                <td>
                                    <?php echo $totales= $rcount_PEDIDOS_REALIZADOS_RECURRENTES + $rcount_PEDIDOS_CONFIRMADOS_RECURRENTES; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados_recurrentes + $total_confirmados_recurrentes); ?>
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
			$rcount_TOTAL_PEDIDOS=$rcount_PEDIDOS_REALIZADOS_RECURRENTES+$rcount_PEDIDOS_CONFIRMADOS_RECURRENTES;
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                </div>                
                <div class="col-md-6 col-sm-6 stat last">                    
					<div class="data">
                        <span class="number"><?php echo $rcount_TOTAL_PEDIDOS;?></span>
                        Pedidos Total =
						<span class="number">$<?php echo number_format($total_realizados_recurrentes + $total_confirmados_recurrentes);?></span>
                        Ventas Total
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->

        <!-- ESTA COMENTADO DEBIDO A QE HACE FALTA EN LA BASE DE DATOS AGREGAR EL CAMPO DE ASESOR QUE LO ATENDIO-->
		<!--<div id="pad-wrapper"> 
            <!-- orders table -->
            <!--<div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Pedidos por Agente </h4>
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
                                    Agentes
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
									Pedidos Realizados
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
									Pedidos Confirmados
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
									Total Facturado
                                </th>
                            </tr>
                        </thead>												
                        <tbody>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_1 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Lina' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS_AGENTE_1=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_1,$con);
								$rcount_PEDIDOS_REALIZADOS_AGENTE_1=mysql_result($query_PEDIDOS_REALIZADOS_AGENTE_1,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_1 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and nombre_asesor_atendio='Lina' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS_AGENTE_1=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_1,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AGENTE_1=mysql_result($query_PEDIDOS_CONFIRMADOS_AGENTE_1,0);
								
								
								$sql7 = "select * from pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Lina' and fecha_de_pago='$fecha_de_pago'";
								$res7 = mysql_query($sql7,$con);
									while($reg7 = mysql_fetch_array($res7)){
										if(isset($reg7["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg7["id_pedidos_plan_continuidad"];											
											$total=$reg7["total"];											

											$realizados2[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($realizados2)){
										$total_realizados2=0;
										for($i=0;$i<count($realizados2);$i++){	
											$subtotal_realizados2 = $realizados2[$i]['total'];
											$total_realizados2= $total_realizados2 + $subtotal_realizados2;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Lina                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AGENTE_1; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AGENTE_1; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados2); ?>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_2 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Angela' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS_AGENTE_2=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_2,$con);
								$rcount_PEDIDOS_REALIZADOS_AGENTE_2=mysql_result($query_PEDIDOS_REALIZADOS_AGENTE_2,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_2 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and nombre_asesor_atendio='Angela' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS_AGENTE_2=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_2,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AGENTE_2=mysql_result($query_PEDIDOS_CONFIRMADOS_AGENTE_2,0);
								
								$sql8 = "select * from pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Angela' and fecha_de_pago='$fecha_de_pago'";
								$res8 = mysql_query($sql8,$con);
									while($reg8 = mysql_fetch_array($res8)){
										if(isset($reg8["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg8["id_pedidos_plan_continuidad"];											
											$total=$reg8["total"];											

											$realizados3[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($realizados3)){
										$total_realizados3=0;
										for($i=0;$i<count($realizados3);$i++){	
											$subtotal_realizados3 = $realizados3[$i]['total'];
											$total_realizados3= $total_realizados3 + $subtotal_realizados3;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Angela                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AGENTE_2; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AGENTE_2; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados3); ?>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_3 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Diana' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS_AGENTE_3=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_3,$con);
								$rcount_PEDIDOS_REALIZADOS_AGENTE_3=mysql_result($query_PEDIDOS_REALIZADOS_AGENTE_3,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_3 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and nombre_asesor_atendio='Diana' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS_AGENTE_3=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_3,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AGENTE_3=mysql_result($query_PEDIDOS_CONFIRMADOS_AGENTE_3,0);
								
								$sql9 = "select * from pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Diana' and fecha_de_pago='$fecha_de_pago'";
								$res9 = mysql_query($sql9,$con);
									while($reg9 = mysql_fetch_array($res9)){
										if(isset($reg9["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg9["id_pedidos_plan_continuidad"];											
											$total=$reg9["total"];											

											$realizados4[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($realizados4)){
										$total_realizados4=0;
										for($i=0;$i<count($realizados4);$i++){	
											$subtotal_realizados4 = $realizados4[$i]['total'];
											$total_realizados4= $total_realizados4 + $subtotal_realizados4;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Diana                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AGENTE_3; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AGENTE_3; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados4); ?>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_4 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Paola' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_REALIZADOS_AGENTE_4=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AGENTE_4,$con);
								$rcount_PEDIDOS_REALIZADOS_AGENTE_4=mysql_result($query_PEDIDOS_REALIZADOS_AGENTE_4,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_4 = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and nombre_asesor_atendio='Paola' and fecha_de_pago='$fecha_de_pago'";
								$query_PEDIDOS_CONFIRMADOS_AGENTE_4=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AGENTE_4,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AGENTE_4=mysql_result($query_PEDIDOS_CONFIRMADOS_AGENTE_4,0);
								
								$sql10 = "select * from pedidos_plan_continuidad where estado_pedido='5' and nombre_asesor_atendio='Paola' and fecha_de_pago='$fecha_de_pago'";
								$res10 = mysql_query($sql10,$con);
									while($reg10 = mysql_fetch_array($res10)){
										if(isset($reg10["id_pedidos_plan_continuidad"])){									
											$id_pedidos_plan_continuidad=$reg10["id_pedidos_plan_continuidad"];											
											$total=$reg10["total"];											

											$realizados5[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($realizados5)){
										$total_realizados5=0;
										for($i=0;$i<count($realizados5);$i++){	
											$subtotal_realizados5 = $realizados5[$i]['total'];
											$total_realizados5= $total_realizados5 + $subtotal_realizados5;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Paola                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AGENTE_4; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AGENTE_4; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados5); ?>
                                </td>
							</tr>
                        </tbody>
												
                        <tbody>							
                            <!-- row -->
                            							
                        <!--</tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        <!--</div>-->	
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