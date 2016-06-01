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
	<title>Ventas Dia | FloresyMasPremium.com</title>
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
	
        <!-- end upper main stats -->
		<div id="pad-wrapper">         
            <?php
			$ano_de_entrega = $_POST["ano_de_entrega"]; 
			$mes_de_entrega = $_POST["mes_de_entrega"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Reporte del Mes (<?php  echo $ano_de_entrega?> / <?php  echo $mes_de_entrega?>)</h4>
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS,$con);
								$rcount_PEDIDOS_REALIZADOS=mysql_result($query_PEDIDOS_REALIZADOS,0);
								
								$sql3 = "select * from pedidos where estado_pedido='5' and mes_de_entrega='$mes_de_entrega'";
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
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS,$con);
								$rcount_PEDIDOS_CONFIRMADOS=mysql_result($query_PEDIDOS_CONFIRMADOS,0);
								
								$sql4 = "select * from pedidos where estado_pedido='15' and mes_de_entrega='$mes_de_entrega'";
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
			$rcount_TOTAL_PEDIDOS=$rcount_PEDIDOS_REALIZADOS+$rcount_PEDIDOS_CONFIRMADOS;
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
                    <span class="date"><?php echo $ano_de_entrega;?> / <?php echo $mes_de_entrega;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->


        <!-- end upper main stats -->
        <div id="pad-wrapper">
            <?php
            $ano_de_inicio = $_POST["ano_de_entrega"]; 
            $mes_de_inicio = $_POST["mes_de_entrega"]; 
            ?>         
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Reporte del Mes (<?php  echo $ano_de_entrega?> / <?php  echo $mes_de_inicio?>)</h4>
                    </div>
                </div>
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Ventas Recurrentes </h4>
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
                                $mysql_CONSULTA_PEDIDOS_REALIZADOS_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and mes_de_inicio='$mes_de_inicio'";
                                $query_PEDIDOS_REALIZADOS_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_CONTINUIDAD,$con);
                                $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD=mysql_result($query_PEDIDOS_REALIZADOS_CONTINUIDAD,0);
                                
                                $sql5 = "select * from pedidos_plan_continuidad where estado_pedido='5' and mes_de_inicio='$mes_de_inicio'";
                                $res5 = mysql_query($sql5,$con);
                                    while($reg5 = mysql_fetch_array($res5)){
                                        if(isset($reg5["id_pedidos_plan_continuidad"])){                                 
                                            $id_pedidos_plan_continuidad=$reg5["id_pedidos_plan_continuidad"];                                            
                                            $total=$reg5["total"];                                          

                                            $realizados_continuidad[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
                                        }
                                    }
                                                                    
                                    if(isset($realizados_continuidad)){
                                        $total_realizados_continuidad=0;
                                        for($i=0;$i<count($realizados_continuidad);$i++){   
                                            $subtotal_realizados_continuidad = $realizados_continuidad[$i]['total'];
                                            $total_realizados_continuidad= $total_realizados_continuidad + $subtotal_realizados_continuidad;                                            
                                        }                                               
                                    }
                            ?>
                            <tr class="first">
                                <td>
                                    <span class="label label-success">#Pedidos Realizados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD; ?>
                                </td>
                                <td>
                                    $<?php echo number_format($total_realizados_continuidad); ?>
                                </td>
                            </tr>
                            <?php 
                                $mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and mes_de_inicio='$mes_de_inicio'";
                                $query_PEDIDOS_CONFIRMADOS_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONTINUIDAD,$con);
                                $rcount_PEDIDOS_CONFIRMADOS_CONTINUIDAD=mysql_result($query_PEDIDOS_CONFIRMADOS_CONTINUIDAD,0);
                                
                                $sql6 = "select * from pedidos_plan_continuidad where estado_pedido='15' and mes_de_inicio='$mes_de_inicio'";
                                $res6 = mysql_query($sql6,$con);
                                    while($reg6 = mysql_fetch_array($res6)){
                                        if(isset($reg6["id_pedidos_plan_continuidad"])){                                 
                                            $id_pedidos_plan_continuidad=$reg6["id_pedidos_plan_continuidad"];                                            
                                            $total=$reg6["total"];                                          

                                            $confirmados_continuidad[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
                                        }
                                    }
                                                                    
                                    if(isset($confirmados_continuidad)){
                                        $total_confirmados_continuidad=0;
                                        for($i=0;$i<count($confirmados_continuidad);$i++){  
                                            $subtotal_confirmados_continuidad = $confirmados_continuidad[$i]['total'];
                                            $total_confirmados_continuidad= $total_confirmados_continuidad + $subtotal_confirmados_continuidad;                                         
                                        }                                               
                                    }
                            ?>
                            <tr class="first">
                                <td>
                                    <span class="label label-info">#Pedidos Confirmados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_CONTINUIDAD; ?>
                                </td>
                                <td>
                                     $<?php echo number_format($total_confirmados_continuidad); ?>
                                </td>
                            </tr>
                            <tr class="first">
                                <td>
                                    Totales
                                </td>
                                <td>
                                    <?php echo $totales= $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD + $rcount_PEDIDOS_CONFIRMADOS_CONTINUIDAD; ?>
                                </td>
                                <td>
                                    $<?php echo number_format($total_realizados_continuidad + $total_confirmados_continuidad); ?>
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
            $rcount_TOTAL_PEDIDOS_CONTINUIDAD= $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD + $rcount_PEDIDOS_CONFIRMADOS_CONTINUIDAD;
        ?>
        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                </div>                
                <div class="col-md-6 col-sm-6 stat last">                    
                    <div class="data">
                        <span class="number"><?php echo $rcount_TOTAL_PEDIDOS_CONTINUIDAD;?></span>
                        Pedidos Total =
                        <span class="number">$<?php echo number_format($total_realizados_continuidad + $total_confirmados_continuidad);?></span>
                        Ventas Total
                    </div>
                    <span class="date"><?php echo $ano_de_inicio;?> / <?php echo $mes_de_inicio;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
        
        <div id="pad-wrapper"> 
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Pedidos por Ciudad</h4>
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
                                    Ciudad
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
                                $mysql_CONSULTA_PEDIDOS_REALIZADOS_BOGOTA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and ciudad_de_entrega='Bogota' and mes_de_entrega='$mes_de_entrega'";
                                $query_PEDIDOS_REALIZADOS_BOGOTA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_BOGOTA,$con);
                                $rcount_PEDIDOS_REALIZADOS_BOGOTA=mysql_result($query_PEDIDOS_REALIZADOS_BOGOTA,0);
                                
                                $mysql_CONSULTA_PEDIDOS_CONFIRMADOS_BOGOTA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and ciudad_de_entrega='Bogota' and mes_de_entrega='$mes_de_entrega'";
                                $query_PEDIDOS_CONFIRMADOS_BOGOTA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_BOGOTA,$con);
                                $rcount_PEDIDOS_CONFIRMADOS_BOGOTA=mysql_result($query_PEDIDOS_CONFIRMADOS_BOGOTA,0);
                                
                                
                                $sql7 = "select * from pedidos where estado_pedido='5' and ciudad_de_entrega='Bogota' and mes_de_entrega='$mes_de_entrega'";
                                $res7 = mysql_query($sql7,$con);
                                    while($reg7 = mysql_fetch_array($res7)){
                                        if(isset($reg7["id_pedidos"])){                                    
                                            $id_pedidos=$reg7["id_pedidos"];                                          
                                            $total=$reg7["total"];                                          

                                            $realizados2[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
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
                            <tr class="first">
                                <td>
                                    Bogota                           
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_BOGOTA; ?>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_BOGOTA; ?>
                                </td>
                                <td>
                                    <?php 
                                    $total_mes = $total_realizados + $total_confirmados;
                                    $peso_bogota = ($total_realizados2 * 100) / $total_mes;
                                    ?>
                                    $<?php echo number_format($total_realizados2); ?> <span class="label label-warning">(<?php echo number_format($peso_bogota); ?>%)</span>
                                </td>
                            </tr>
                            <?php                               
                                $mysql_CONSULTA_PEDIDOS_REALIZADOS_MEDELLIN = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and ciudad_de_entrega='Medellin' and mes_de_entrega='$mes_de_entrega'";
                                $query_PEDIDOS_REALIZADOS_MEDELLIN=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_MEDELLIN,$con);
                                $rcount_PEDIDOS_REALIZADOS_MEDELLIN=mysql_result($query_PEDIDOS_REALIZADOS_MEDELLIN,0);
                                
                                $mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MEDELLIN = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and ciudad_de_entrega='Medellin' and mes_de_entrega='$mes_de_entrega'";
                                $query_PEDIDOS_CONFIRMADOS_MEDELLIN=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MEDELLIN,$con);
                                $rcount_PEDIDOS_CONFIRMADOS_MEDELLIN=mysql_result($query_PEDIDOS_CONFIRMADOS_MEDELLIN,0);
                                
                                
                                $sql8 = "select * from pedidos where estado_pedido='5' and ciudad_de_entrega='Medellin' and mes_de_entrega='$mes_de_entrega'";
                                $res8 = mysql_query($sql8,$con);
                                    while($reg8 = mysql_fetch_array($res8)){
                                        if(isset($reg8["id_pedidos"])){                                    
                                            $id_pedidos=$reg8["id_pedidos"];                                          
                                            $total=$reg8["total"];                                          

                                            $realizados3[]=array('id_pedidos'=>$id_pedidos,'total'=>$total);
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
                            <tr class="first">
                                <td>
                                    Medellin                           
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_MEDELLIN; ?>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_MEDELLIN; ?>
                                </td>
                                <td>
                                    <?php 
                                    $total_mes = $total_realizados + $total_confirmados;
                                    $peso_medellin = ($total_realizados3 * 100) / $total_mes;
                                    ?>
                                    $<?php echo number_format($total_realizados3); ?> <span class="label label-warning">(<?php echo number_format($peso_medellin); ?>%)</span>
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

		<div id="pad-wrapper"> 
            <!-- orders table -->
            <div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Pedidos por Ciudad - Continuidad </h4>
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
                                    Ciudad
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and ciudad_de_entrega='Bogota' and mes_de_inicio='$mes_de_inicio'";
								$query_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD,$con);
								$rcount_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD=mysql_result($query_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and ciudad_de_entrega='Bogota' and mes_de_inicio='$mes_de_inicio'";
								$query_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD,$con);
								$rcount_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD=mysql_result($query_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD,0);
								
								
								$sql9 = "select * from pedidos_plan_continuidad where estado_pedido='5' and ciudad_de_entrega='Bogota' and mes_de_inicio='$mes_de_inicio'";
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
                            <tr class="first">
                                <td>
									Bogota                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_BOGOTA_CONTINUIDAD; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_BOGOTA_CONTINUIDAD; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_bogota = ($total_realizados4 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados4); ?> <span class="label label-warning">(<?php echo number_format($peso_bogota); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='5' and ciudad_de_entrega='Medellin' and mes_de_inicio='$mes_de_inicio'";
								$query_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD,$con);
								$rcount_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD=mysql_result($query_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD = "SELECT COUNT(*) FROM pedidos_plan_continuidad where estado_pedido='15' and ciudad_de_entrega='Medellin' and mes_de_inicio='$mes_de_inicio'";
								$query_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD,$con);
								$rcount_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD=mysql_result($query_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD,0);
								
								
								$sql10 = "select * from pedidos_plan_continuidad where estado_pedido='5' and ciudad_de_entrega='Medellin' and mes_de_inicio='$mes_de_inicio'";
								$res10 = mysql_query($sql10,$con);
									while($reg10 = mysql_fetch_array($res8)){
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
                            <tr class="first">
                                <td>
									Medellin                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_MEDELLIN_CONTINUIDAD; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_MEDELLIN_CONTINUIDAD; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_medellin = ($total_realizados5 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados5); ?> <span class="label label-warning">(<?php echo number_format($peso_medellin); ?>%)</span>
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

        <!-- ESTA COMENTADO DEBIDO A QUE DESDE LA BASE DE DATOS NO EXISTE LA TABLE METODO_PAGO -->
		<!--<div id="pad-wrapper"> 
            <!-- orders table -->
            <!--<div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas por Metodo de Pago Utilizado </h4>
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
                                    Metodo de Pago
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_PAYU = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and metodo_pago='PayU (Tarjeta Credito/Debido - Pagina Web)' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_PAYU=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_PAYU,$con);
								$rcount_PEDIDOS_REALIZADOS_PAYU=mysql_result($query_PEDIDOS_REALIZADOS_PAYU,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PAYU = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and metodo_pago='PayU (Tarjeta Credito/Debido - Pagina Web)' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_PAYU=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PAYU,$con);
								$rcount_PEDIDOS_CONFIRMADOS_PAYU=mysql_result($query_PEDIDOS_CONFIRMADOS_PAYU,0);
								
								
								$sql7 = "select * from pedidos where estado_pedido='5' and metodo_pago='PayU (Tarjeta Credito/Debido - Pagina Web)' and mes_de_entrega='$mes_de_entrega'";
								$res7 = mysql_query($sql7,$con);
									while($reg7 = mysql_fetch_array($res7)){
										if(isset($reg7["id_pedidos"])){									
											$id_pedidos=$reg7["id_pedidos"];											
											$total_pedido=$reg7["total_pedido"];											

											$realizados4[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados4)){
										$total_realizados4=0;
										for($i=0;$i<count($realizados4);$i++){	
											$subtotal_realizados4 = $realizados4[$i]['total_pedido'];
											$total_realizados4= $total_realizados4 + $subtotal_realizados4;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									PayU (Tarjeta Credito/Debido - Pagina Web)                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_PAYU; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_PAYU; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_payu = ($total_realizados4 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados4); ?> <span class="label label-warning">(<?php echo number_format($peso_payu); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_CONSIGNACION = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and metodo_pago='Consignacion Bancaria' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_CONSIGNACION=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_CONSIGNACION,$con);
								$rcount_PEDIDOS_REALIZADOS_CONSIGNACION=mysql_result($query_PEDIDOS_REALIZADOS_CONSIGNACION,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONSIGNACION = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and metodo_pago='Consignacion Bancaria' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_CONSIGNACION=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONSIGNACION,$con);
								$rcount_PEDIDOS_CONFIRMADOS_CONSIGNACION=mysql_result($query_PEDIDOS_CONFIRMADOS_CONSIGNACION,0);
								
								
								$sql8 = "select * from pedidos where estado_pedido='5' and metodo_pago='Consignacion Bancaria' and mes_de_entrega='$mes_de_entrega'";
								$res8 = mysql_query($sql8,$con);
									while($reg8 = mysql_fetch_array($res8)){
										if(isset($reg8["id_pedidos"])){									
											$id_pedidos=$reg8["id_pedidos"];											
											$total_pedido=$reg8["total_pedido"];											

											$realizados5[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados5)){
										$total_realizados5=0;
										for($i=0;$i<count($realizados5);$i++){	
											$subtotal_realizados5 = $realizados5[$i]['total_pedido'];
											$total_realizados5= $total_realizados5 + $subtotal_realizados5;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Consignacion Bancaria                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CONSIGNACION; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_CONSIGNACION; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_consignacion = ($total_realizados5 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados5); ?> <span class="label label-warning">(<?php echo number_format($peso_consignacion); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_CONTRAENTREGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and metodo_pago='Contraentrega' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_CONTRAENTREGA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_CONTRAENTREGA,$con);
								$rcount_PEDIDOS_REALIZADOS_CONTRAENTREGA=mysql_result($query_PEDIDOS_REALIZADOS_CONTRAENTREGA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONTRAENTREGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and metodo_pago='Contraentrega' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_CONTRAENTREGA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CONTRAENTREGA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_CONTRAENTREGA=mysql_result($query_PEDIDOS_CONFIRMADOS_CONTRAENTREGA,0);
								
								
								$sql9 = "select * from pedidos where estado_pedido='5' and metodo_pago='Contraentrega' and mes_de_entrega='$mes_de_entrega'";
								$res9 = mysql_query($sql9,$con);
									while($reg9 = mysql_fetch_array($res9)){
										if(isset($reg9["id_pedidos"])){									
											$id_pedidos=$reg9["id_pedidos"];											
											$total_pedido=$reg9["total_pedido"];											

											$realizados6[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados6)){
										$total_realizados6=0;
										for($i=0;$i<count($realizados6);$i++){	
											$subtotal_realizados6 = $realizados6[$i]['total_pedido'];
											$total_realizados6= $total_realizados6 + $subtotal_realizados6;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Contraentrega                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CONTRAENTREGA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_CONTRAENTREGA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_contraentrega = ($total_realizados6 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados6); ?> <span class="label label-warning">(<?php echo number_format($peso_contraentrega); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_GIRO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and metodo_pago='Giro Efecty' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_GIRO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_GIRO,$con);
								$rcount_PEDIDOS_REALIZADOS_GIRO=mysql_result($query_PEDIDOS_REALIZADOS_GIRO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_GIRO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and metodo_pago='Giro Efecty' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_GIRO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_GIRO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_GIRO=mysql_result($query_PEDIDOS_CONFIRMADOS_GIRO,0);
								
								
								$sql10 = "select * from pedidos where estado_pedido='5' and metodo_pago='Giro Efecty' and mes_de_entrega='$mes_de_entrega'";
								$res10 = mysql_query($sql10,$con);
									while($reg10 = mysql_fetch_array($res10)){
										if(isset($reg10["id_pedidos"])){									
											$id_pedidos=$reg10["id_pedidos"];											
											$total_pedido=$reg10["total_pedido"];											

											$realizados7[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados7)){
										$total_realizados7=0;
										for($i=0;$i<count($realizados7);$i++){	
											$subtotal_realizados7 = $realizados7[$i]['total_pedido'];
											$total_realizados7= $total_realizados7 + $subtotal_realizados7;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Giro Efecty                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_GIRO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_GIRO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_giro = ($total_realizados7 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados7); ?> <span class="label label-warning">(<?php echo number_format($peso_giro); ?>%)</span>
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

		<!--ESTA COMENTADO DEBIDO A QUE NO SON LAS MISMAS HORAS DE ENTREGA QUE FLORESYMAS NORMA-->

        <!--<div id="pad-wrapper"> 
            <!-- orders table -->
            <!--<div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas por Horas de Entrega </h4>
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
                                    Horas de Entrega
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_7_9AM = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and hora_de_entrega='7am - 9am' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_7_9AM=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_7_9AM,$con);
								$rcount_PEDIDOS_REALIZADOS_7_9AM=mysql_result($query_PEDIDOS_REALIZADOS_7_9AM,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_7_9AM = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and hora_de_entrega='7am - 9am' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_7_9AM=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_7_9AM,$con);
								$rcount_PEDIDOS_CONFIRMADOS_7_9AM=mysql_result($query_PEDIDOS_CONFIRMADOS_7_9AM,0);
								
								
								$sql13 = "select * from pedidos where estado_pedido='5' and hora_de_entrega='7am - 9am' and mes_de_entrega='$mes_de_entrega'";
								$res11 = mysql_query($sql11,$con);
									while($reg11 = mysql_fetch_array($res11)){
										if(isset($reg11["id_pedidos"])){									
											$id_pedidos=$reg11["id_pedidos"];											
											$total_pedido=$reg11["total_pedido"];											

											$realizados8[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados8)){
										$total_realizados8=0;
										for($i=0;$i<count($realizados8);$i++){	
											$subtotal_realizados8 = $realizados8[$i]['total_pedido'];
											$total_realizados8= $total_realizados8 + $subtotal_realizados8;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									7am - 9am                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_7_9AM; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_7_9AM; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_7_9am = ($total_realizados8 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados8); ?> <span class="label label-warning">(<?php echo number_format($peso_7_9am); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_8_11AM = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and hora_de_entrega='8am - 11am' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_8_11AM=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_8_11AM,$con);
								$rcount_PEDIDOS_REALIZADOS_8_11AM=mysql_result($query_PEDIDOS_REALIZADOS_8_11AM,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_8_11AM = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and hora_de_entrega='8am - 11am' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_8_11AM=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_8_11AM,$con);
								$rcount_PEDIDOS_CONFIRMADOS_8_11AM=mysql_result($query_PEDIDOS_CONFIRMADOS_8_11AM,0);
								
								
								$sql12 = "select * from pedidos where estado_pedido='5' and hora_de_entrega='8am - 11am' and mes_de_entrega='$mes_de_entrega'";
								$res12 = mysql_query($sql12,$con);
									while($reg12 = mysql_fetch_array($res12)){
										if(isset($reg12["id_pedidos"])){									
											$id_pedidos=$reg12["id_pedidos"];											
											$total_pedido=$reg12["total_pedido"];											

											$realizados9[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados9)){
										$total_realizados9=0;
										for($i=0;$i<count($realizados9);$i++){	
											$subtotal_realizados9 = $realizados9[$i]['total_pedido'];
											$total_realizados9= $total_realizados9 + $subtotal_realizados9;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									8am - 11am                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_8_11AM; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_8_11AM; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_8_11am = ($total_realizados9 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados9); ?> <span class="label label-warning">(<?php echo number_format($peso_8_11am); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_11_2PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and hora_de_entrega='11am - 2pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_11_2PM=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_11_2PM,$con);
								$rcount_PEDIDOS_REALIZADOS_11_2PM=mysql_result($query_PEDIDOS_REALIZADOS_11_2PM,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_11_2PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and hora_de_entrega='11am - 2pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_11_2PM=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_11_2PM,$con);
								$rcount_PEDIDOS_CONFIRMADOS_11_2PM=mysql_result($query_PEDIDOS_CONFIRMADOS_11_2PM,0);
								
								
								$sql13 = "select * from pedidos where estado_pedido='5' and hora_de_entrega='11am - 2pm' and mes_de_entrega='$mes_de_entrega'";
								$res13 = mysql_query($sql13,$con);
									while($reg13 = mysql_fetch_array($res13)){
										if(isset($reg13["id_pedidos"])){									
											$id_pedidos=$reg13["id_pedidos"];											
											$total_pedido=$reg13["total_pedido"];											

											$realizados10[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados10)){
										$total_realizados10=0;
										for($i=0;$i<count($realizados10);$i++){	
											$subtotal_realizados10 = $realizados10[$i]['total_pedido'];
											$total_realizados10= $total_realizados10 + $subtotal_realizados10;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									11am - 2pm                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_11_2PM; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_11_2PM; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_11_2pm = ($total_realizados10 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados10); ?> <span class="label label-warning">(<?php echo number_format($peso_11_2pm); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_2_5PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and hora_de_entrega='2pm - 5pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_2_5PM=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_2_5PM,$con);
								$rcount_PEDIDOS_REALIZADOS_2_5PM=mysql_result($query_PEDIDOS_REALIZADOS_2_5PM,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_2_5PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and hora_de_entrega='2pm - 5pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_2_5PM=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_2_5PM,$con);
								$rcount_PEDIDOS_CONFIRMADOS_2_5PM=mysql_result($query_PEDIDOS_CONFIRMADOS_2_5PM,0);
								
								
								$sql14 = "select * from pedidos where estado_pedido='5' and hora_de_entrega='2pm - 5pm' and mes_de_entrega='$mes_de_entrega'";
								$res14 = mysql_query($sql14,$con);
									while($reg14 = mysql_fetch_array($res14)){
										if(isset($reg14["id_pedidos"])){									
											$id_pedidos=$reg14["id_pedidos"];											
											$total_pedido=$reg14["total_pedido"];											

											$realizados11[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados11)){
										$total_realizados11=0;
										for($i=0;$i<count($realizados11);$i++){	
											$subtotal_realizados11 = $realizados11[$i]['total_pedido'];
											$total_realizados11= $total_realizados11 + $subtotal_realizados11;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									2pm - 5pm                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_2_5PM; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_2_5PM; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_2_5pm = ($total_realizados11 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados11); ?> <span class="label label-warning">(<?php echo number_format($peso_2_5pm); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_5_7PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and hora_de_entrega='5pm- 7pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_5_7PM=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_5_7PM,$con);
								$rcount_PEDIDOS_REALIZADOS_5_7PM=mysql_result($query_PEDIDOS_REALIZADOS_5_7PM,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_5_7PM = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and hora_de_entrega='5pm- 7pm' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_5_7PM=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_5_7PM,$con);
								$rcount_PEDIDOS_CONFIRMADOS_5_7PM=mysql_result($query_PEDIDOS_CONFIRMADOS_5_7PM,0);
								
								
								$sql15 = "select * from pedidos where estado_pedido='5' and hora_de_entrega='5pm- 7pm' and mes_de_entrega='$mes_de_entrega'";
								$res15 = mysql_query($sql15,$con);
									while($reg15 = mysql_fetch_array($res15)){
										if(isset($reg15["id_pedidos"])){									
											$id_pedidos=$reg15["id_pedidos"];											
											$total_pedido=$reg15["total_pedido"];											

											$realizados12[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados12)){
										$total_realizados12=0;
										for($i=0;$i<count($realizados12);$i++){	
											$subtotal_realizados12 = $realizados12[$i]['total_pedido'];
											$total_realizados12= $total_realizados12 + $subtotal_realizados12;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									5pm- 7pm                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_5_7PM; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_5_7PM; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_5_7pm = ($total_realizados12 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados12); ?> <span class="label label-warning">(<?php echo number_format($peso_5_7pm); ?>%)</span>
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


        <!--ESTA COMENTADO DEBIDO QUE NO ESTA EN LA BASE DE DATOS EL MOTIVO DEL REGALO-->
		<!--<div id="pad-wrapper"> 
            <!-- orders table -->
            <!--<div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas por Motivo del Regalo </h4>
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
                                    Motivo del Regalo
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_CUMPLEANOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='cumpleanos' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_CUMPLEANOS=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_CUMPLEANOS,$con);
								$rcount_PEDIDOS_REALIZADOS_CUMPLEANOS=mysql_result($query_PEDIDOS_REALIZADOS_CUMPLEANOS,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CUMPLEANOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='cumpleanos' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_CUMPLEANOS=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CUMPLEANOS,$con);
								$rcount_PEDIDOS_CONFIRMADOS_CUMPLEANOS=mysql_result($query_PEDIDOS_CONFIRMADOS_CUMPLEANOS,0);
								
								
								$sql16 = "select * from pedidos where estado_pedido='5' and motivo_regalo='cumpleanos' and mes_de_entrega='$mes_de_entrega'";
								$res16 = mysql_query($sql16,$con);
									while($reg16 = mysql_fetch_array($res16)){
										if(isset($reg16["id_pedidos"])){									
											$id_pedidos=$reg16["id_pedidos"];											
											$total_pedido=$reg16["total_pedido"];											

											$realizados13[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados13)){
										$total_realizados13=0;
										for($i=0;$i<count($realizados13);$i++){	
											$subtotal_realizados13 = $realizados13[$i]['total_pedido'];
											$total_realizados13= $total_realizados13 + $subtotal_realizados13;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Cumpleaños                           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CUMPLEANOS; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_CUMPLEANOS; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_cumpleanos = ($total_realizados13 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados13); ?> <span class="label label-warning">(<?php echo number_format($peso_cumpleanos); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ANIVERSARIO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='aniversario' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ANIVERSARIO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ANIVERSARIO,$con);
								$rcount_PEDIDOS_REALIZADOS_ANIVERSARIO=mysql_result($query_PEDIDOS_REALIZADOS_ANIVERSARIO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ANIVERSARIO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='aniversario' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ANIVERSARIO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ANIVERSARIO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ANIVERSARIO=mysql_result($query_PEDIDOS_CONFIRMADOS_ANIVERSARIO,0);
								
								
								$sql17 = "select * from pedidos where estado_pedido='5' and motivo_regalo='aniversario' and mes_de_entrega='$mes_de_entrega'";
								$res17 = mysql_query($sql17,$con);
									while($reg17 = mysql_fetch_array($res17)){
										if(isset($reg17["id_pedidos"])){									
											$id_pedidos=$reg17["id_pedidos"];											
											$total_pedido=$reg17["total_pedido"];											

											$realizados14[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados14)){
										$total_realizados14=0;
										for($i=0;$i<count($realizados14);$i++){	
											$subtotal_realizados14 = $realizados14[$i]['total_pedido'];
											$total_realizados14= $total_realizados14 + $subtotal_realizados14;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Aniversario                          
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ANIVERSARIO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ANIVERSARIO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_aniversario = ($total_realizados14 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados14); ?> <span class="label label-warning">(<?php echo number_format($peso_aniversario); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ENFERMOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='enfermos' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ENFERMOS=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ENFERMOS,$con);
								$rcount_PEDIDOS_REALIZADOS_ENFERMOS=mysql_result($query_PEDIDOS_REALIZADOS_ENFERMOS,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ENFERMOS = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='enfermos' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ENFERMOS=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ENFERMOS,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ENFERMOS=mysql_result($query_PEDIDOS_CONFIRMADOS_ENFERMOS,0);
								
								
								$sql18 = "select * from pedidos where estado_pedido='5' and motivo_regalo='enfermos' and mes_de_entrega='$mes_de_entrega'";
								$res18 = mysql_query($sql18,$con);
									while($reg18 = mysql_fetch_array($res18)){
										if(isset($reg18["id_pedidos"])){									
											$id_pedidos=$reg18["id_pedidos"];											
											$total_pedido=$reg18["total_pedido"];											

											$realizados15[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados15)){
										$total_realizados15=0;
										for($i=0;$i<count($realizados15);$i++){	
											$subtotal_realizados15 = $realizados15[$i]['total_pedido'];
											$total_realizados15= $total_realizados15 + $subtotal_realizados15;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Enfermos                          
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ENFERMOS; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ENFERMOS; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_enfermos = ($total_realizados15 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados15); ?> <span class="label label-warning">(<?php echo number_format($peso_enfermos); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_FUNEBRES = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='funebres' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_FUNEBRES=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_FUNEBRES,$con);
								$rcount_PEDIDOS_REALIZADOS_FUNEBRES=mysql_result($query_PEDIDOS_REALIZADOS_FUNEBRES,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_FUNEBRES = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='funebres' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_FUNEBRES=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_FUNEBRES,$con);
								$rcount_PEDIDOS_CONFIRMADOS_FUNEBRES=mysql_result($query_PEDIDOS_CONFIRMADOS_FUNEBRES,0);
								
								
								$sql19 = "select * from pedidos where estado_pedido='5' and motivo_regalo='funebres' and mes_de_entrega='$mes_de_entrega'";
								$res19 = mysql_query($sql19,$con);
									while($reg19 = mysql_fetch_array($res19)){
										if(isset($reg19["id_pedidos"])){									
											$id_pedidos=$reg19["id_pedidos"];											
											$total_pedido=$reg19["total_pedido"];											

											$realizados16[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados16)){
										$total_realizados16=0;
										for($i=0;$i<count($realizados16);$i++){	
											$subtotal_realizados16 = $realizados16[$i]['total_pedido'];
											$total_realizados16= $total_realizados16 + $subtotal_realizados16;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Funebres                         
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_FUNEBRES; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_FUNEBRES; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_funebres = ($total_realizados16 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados16); ?> <span class="label label-warning">(<?php echo number_format($peso_funebres); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_NACIMIENTO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='nacimiento' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_NACIMIENTO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_NACIMIENTO,$con);
								$rcount_PEDIDOS_REALIZADOS_NACIMIENTO=mysql_result($query_PEDIDOS_REALIZADOS_NACIMIENTO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NACIMIENTO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='nacimiento' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_NACIMIENTO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NACIMIENTO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_NACIMIENTO=mysql_result($query_PEDIDOS_CONFIRMADOS_NACIMIENTO,0);
								
								
								$sql20 = "select * from pedidos where estado_pedido='5' and motivo_regalo='nacimiento' and mes_de_entrega='$mes_de_entrega'";
								$res20 = mysql_query($sql20,$con);
									while($reg20 = mysql_fetch_array($res20)){
										if(isset($reg20["id_pedidos"])){									
											$id_pedidos=$reg20["id_pedidos"];											
											$total_pedido=$reg20["total_pedido"];											

											$realizados17[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados17)){
										$total_realizados17=0;
										for($i=0;$i<count($realizados17);$i++){	
											$subtotal_realizados17 = $realizados17[$i]['total_pedido'];
											$total_realizados17= $total_realizados17 + $subtotal_realizados17;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Nacimiento                         
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_NACIMIENTO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_NACIMIENTO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_nacimiento = ($total_realizados17 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados17); ?> <span class="label label-warning">(<?php echo number_format($peso_nacimiento); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ROMANCE = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='romance' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ROMANCE=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ROMANCE,$con);
								$rcount_PEDIDOS_REALIZADOS_ROMANCE=mysql_result($query_PEDIDOS_REALIZADOS_ROMANCE,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ROMANCE = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='romance' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ROMANCE=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ROMANCE,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ROMANCE=mysql_result($query_PEDIDOS_CONFIRMADOS_ROMANCE,0);
								
								
								$sql21 = "select * from pedidos where estado_pedido='5' and motivo_regalo='romance' and mes_de_entrega='$mes_de_entrega'";
								$res21 = mysql_query($sql21,$con);
									while($reg21 = mysql_fetch_array($res21)){
										if(isset($reg21["id_pedidos"])){									
											$id_pedidos=$reg21["id_pedidos"];											
											$total_pedido=$reg21["total_pedido"];											

											$realizados18[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados18)){
										$total_realizados18=0;
										for($i=0;$i<count($realizados18);$i++){	
											$subtotal_realizados18 = $realizados18[$i]['total_pedido'];
											$total_realizados18= $total_realizados18 + $subtotal_realizados18;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Romance                       
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ROMANCE; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ROMANCE; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_romance = ($total_realizados18 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados18); ?> <span class="label label-warning">(<?php echo number_format($peso_romance); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_PORQUESI = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and motivo_regalo='porque-si' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_PORQUESI=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_PORQUESI,$con);
								$rcount_PEDIDOS_REALIZADOS_PORQUESI=mysql_result($query_PEDIDOS_REALIZADOS_PORQUESI,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PORQUESI = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and motivo_regalo='porque-si' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_PORQUESI=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PORQUESI,$con);
								$rcount_PEDIDOS_CONFIRMADOS_PORQUESI=mysql_result($query_PEDIDOS_CONFIRMADOS_PORQUESI,0);
								
								
								$sql22 = "select * from pedidos where estado_pedido='5' and motivo_regalo='porque-si' and mes_de_entrega='$mes_de_entrega'";
								$res22 = mysql_query($sql22,$con);
									while($reg22 = mysql_fetch_array($res22)){
										if(isset($reg22["id_pedidos"])){									
											$id_pedidos=$reg22["id_pedidos"];											
											$total_pedido=$reg22["total_pedido"];											

											$realizados19[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados19)){
										$total_realizados19=0;
										for($i=0;$i<count($realizados19);$i++){	
											$subtotal_realizados19 = $realizados19[$i]['total_pedido'];
											$total_realizados19= $total_realizados19 + $subtotal_realizados19;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Porque Si                      
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_PORQUESI; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_PORQUESI; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_porque_si = ($total_realizados19 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados19); ?> <span class="label label-warning">(<?php echo number_format($peso_porque_si); ?>%)</span>
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

        <!-- ESTA COMENTADO DEBIDO A QUE EN LA BASE DE DATOS NO ESTA LA RELACION -->
		<!--<div id="pad-wrapper"> 
            <!-- orders table -->
            <!--<div class="table-wrapper ">
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas por Relación </h4>
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
                                    Relación
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
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ESPOSA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='esposa' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ESPOSA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ESPOSA,$con);
								$rcount_PEDIDOS_REALIZADOS_ESPOSA=mysql_result($query_PEDIDOS_REALIZADOS_ESPOSA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ESPOSA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='esposa' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ESPOSA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ESPOSA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ESPOSA=mysql_result($query_PEDIDOS_CONFIRMADOS_ESPOSA,0);
								
								
								$sql23 = "select * from pedidos where estado_pedido='5' and relacion='esposa' and mes_de_entrega='$mes_de_entrega'";
								$res23 = mysql_query($sql23,$con);
									while($reg23 = mysql_fetch_array($res23)){
										if(isset($reg23["id_pedidos"])){									
											$id_pedidos=$reg23["id_pedidos"];											
											$total_pedido=$reg23["total_pedido"];											

											$realizados20[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados20)){
										$total_realizados20=0;
										for($i=0;$i<count($realizados20);$i++){	
											$subtotal_realizados20 = $realizados20[$i]['total_pedido'];
											$total_realizados20= $total_realizados20 + $subtotal_realizados20;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Esposa                   
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ESPOSA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ESPOSA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_esposa = ($total_realizados20 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados20); ?> <span class="label label-warning">(<?php echo number_format($peso_esposa); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ESPOSO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='esposo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ESPOSO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ESPOSO,$con);
								$rcount_PEDIDOS_REALIZADOS_ESPOSO=mysql_result($query_PEDIDOS_REALIZADOS_ESPOSO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ESPOSO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='esposo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ESPOSO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ESPOSO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ESPOSO=mysql_result($query_PEDIDOS_CONFIRMADOS_ESPOSO,0);
								
								
								$sql24 = "select * from pedidos where estado_pedido='5' and relacion='esposo' and mes_de_entrega='$mes_de_entrega'";
								$res24 = mysql_query($sql24,$con);
									while($reg24 = mysql_fetch_array($res24)){
										if(isset($reg24["id_pedidos"])){									
											$id_pedidos=$reg24["id_pedidos"];											
											$total_pedido=$reg24["total_pedido"];											

											$realizados21[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados21)){
										$total_realizados21=0;
										for($i=0;$i<count($realizados21);$i++){	
											$subtotal_realizados21 = $realizados21[$i]['total_pedido'];
											$total_realizados21= $total_realizados21 + $subtotal_realizados21;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Esposo                   
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ESPOSO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ESPOSO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_esposo = ($total_realizados21 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados21); ?> <span class="label label-warning">(<?php echo number_format($peso_esposo); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_NOVIA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='novia' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_NOVIA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_NOVIA,$con);
								$rcount_PEDIDOS_REALIZADOS_NOVIA=mysql_result($query_PEDIDOS_REALIZADOS_NOVIA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NOVIA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='novia' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_NOVIA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NOVIA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_NOVIA=mysql_result($query_PEDIDOS_CONFIRMADOS_NOVIA,0);
								
								
								$sql25 = "select * from pedidos where estado_pedido='5' and relacion='novia' and mes_de_entrega='$mes_de_entrega'";
								$res25 = mysql_query($sql25,$con);
									while($reg25 = mysql_fetch_array($res25)){
										if(isset($reg25["id_pedidos"])){									
											$id_pedidos=$reg25["id_pedidos"];											
											$total_pedido=$reg25["total_pedido"];											

											$realizados22[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados22)){
										$total_realizados22=0;
										for($i=0;$i<count($realizados22);$i++){	
											$subtotal_realizados22 = $realizados22[$i]['total_pedido'];
											$total_realizados22= $total_realizados22 + $subtotal_realizados22;											
										}												
									}
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Novia                  
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_NOVIA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_NOVIA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_novia = ($total_realizados22 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados22); ?> <span class="label label-warning">(<?php echo number_format($peso_novia); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_NOVIO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='novio' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_NOVIO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_NOVIO,$con);
								$rcount_PEDIDOS_REALIZADOS_NOVIO=mysql_result($query_PEDIDOS_REALIZADOS_NOVIO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NOVIO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='novio' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_NOVIO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_NOVIO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_NOVIO=mysql_result($query_PEDIDOS_CONFIRMADOS_NOVIO,0);
								
								
								$sql26 = "select * from pedidos where estado_pedido='5' and relacion='novio' and mes_de_entrega='$mes_de_entrega'";
								$res26 = mysql_query($sql26,$con);
									while($reg26 = mysql_fetch_array($res26)){
										if(isset($reg26["id_pedidos"])){									
											$id_pedidos=$reg26["id_pedidos"];											
											$total_pedido=$reg26["total_pedido"];											

											$realizados23[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados23)){
										$total_realizados23=0;
										for($i=0;$i<count($realizados23);$i++){	
											$subtotal_realizados23 = $realizados23[$i]['total_pedido'];
											$total_realizados23= $total_realizados23 + $subtotal_realizados23;											
										}												
									}	
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Novio                 
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_NOVIO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_NOVIO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_novio = ($total_realizados23 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados23); ?> <span class="label label-warning">(<?php echo number_format($peso_novio); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_MAMA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='mama' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_MAMA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_MAMA,$con);
								$rcount_PEDIDOS_REALIZADOS_MAMA=mysql_result($query_PEDIDOS_REALIZADOS_MAMA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MAMA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='mama' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_MAMA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_MAMA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_MAMA=mysql_result($query_PEDIDOS_CONFIRMADOS_MAMA,0);
								
								
								$sql27 = "select * from pedidos where estado_pedido='5' and relacion='mama' and mes_de_entrega='$mes_de_entrega'";
								$res27 = mysql_query($sql27,$con);
									while($reg27 = mysql_fetch_array($res27)){
										if(isset($reg27["id_pedidos"])){									
											$id_pedidos=$reg27["id_pedidos"];											
											$total_pedido=$reg27["total_pedido"];											

											$realizados24[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados24)){
										$total_realizados24=0;
										for($i=0;$i<count($realizados24);$i++){	
											$subtotal_realizados24 = $realizados24[$i]['total_pedido'];
											$total_realizados24= $total_realizados24 + $subtotal_realizados24;											
										}												
									}	
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Mamá                 
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_MAMA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_MAMA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_mama = ($total_realizados24 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados24); ?> <span class="label label-warning">(<?php echo number_format($peso_mama); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_PAPA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='papa' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_PAPA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_PAPA,$con);
								$rcount_PEDIDOS_REALIZADOS_PAPA=mysql_result($query_PEDIDOS_REALIZADOS_PAPA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PAPA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='papa' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_PAPA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PAPA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_PAPA=mysql_result($query_PEDIDOS_CONFIRMADOS_PAPA,0);
								
								
								$sql28 = "select * from pedidos where estado_pedido='5' and relacion='papa' and mes_de_entrega='$mes_de_entrega'";
								$res28 = mysql_query($sql28,$con);
									while($reg28 = mysql_fetch_array($res28)){
										if(isset($reg28["id_pedidos"])){									
											$id_pedidos=$reg28["id_pedidos"];											
											$total_pedido=$reg28["total_pedido"];											

											$realizados25[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados25)){
										$total_realizados25=0;
										for($i=0;$i<count($realizados25);$i++){	
											$subtotal_realizados25 = $realizados25[$i]['total_pedido'];
											$total_realizados25= $total_realizados25 + $subtotal_realizados25;											
										}												
									}	
									
							?>
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Papá                
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_PAPA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_PAPA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_papa = ($total_realizados25 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados25); ?> <span class="label label-warning">(<?php echo number_format($peso_papa); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ABUELA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='abuela' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ABUELA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ABUELA,$con);
								$rcount_PEDIDOS_REALIZADOS_ABUELA=mysql_result($query_PEDIDOS_REALIZADOS_ABUELA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ABUELA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='abuela' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ABUELA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ABUELA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ABUELA=mysql_result($query_PEDIDOS_CONFIRMADOS_ABUELA,0);
								
								
								$sql29 = "select * from pedidos where estado_pedido='5' and relacion='abuela' and mes_de_entrega='$mes_de_entrega'";
								$res29 = mysql_query($sql29,$con);
									while($reg29 = mysql_fetch_array($res29)){
										if(isset($reg29["id_pedidos"])){									
											$id_pedidos=$reg29["id_pedidos"];											
											$total_pedido=$reg29["total_pedido"];											

											$realizados26[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados26)){
										$total_realizados26=0;
										for($i=0;$i<count($realizados26);$i++){	
											$subtotal_realizados26 = $realizados26[$i]['total_pedido'];
											$total_realizados26= $total_realizados26 + $subtotal_realizados26;											
										}												
									}	
									
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Abuela              
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ABUELA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ABUELA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_abuela = ($total_realizados26 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados26); ?> <span class="label label-warning">(<?php echo number_format($peso_abuela); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_ABUELO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='abuelo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_ABUELO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_ABUELO,$con);
								$rcount_PEDIDOS_REALIZADOS_ABUELO=mysql_result($query_PEDIDOS_REALIZADOS_ABUELO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ABUELO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='abuelo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_ABUELO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_ABUELO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_ABUELO=mysql_result($query_PEDIDOS_CONFIRMADOS_ABUELO,0);
								
								
								$sql30 = "select * from pedidos where estado_pedido='5' and relacion='abuelo' and mes_de_entrega='$mes_de_entrega'";
								$res30 = mysql_query($sql30,$con);
									while($reg30 = mysql_fetch_array($res30)){
										if(isset($reg30["id_pedidos"])){									
											$id_pedidos=$reg30["id_pedidos"];											
											$total_pedido=$reg30["total_pedido"];											

											$realizados27[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados27)){
										$total_realizados27=0;
										for($i=0;$i<count($realizados27);$i++){	
											$subtotal_realizados27 = $realizados27[$i]['total_pedido'];
											$total_realizados27= $total_realizados27 + $subtotal_realizados27;											
										}												
									}	
									
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Abuelo              
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_ABUELO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_ABUELO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_abuelo = ($total_realizados27 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados27); ?> <span class="label label-warning">(<?php echo number_format($peso_abuelo); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_HERMANA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='hermana' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_HERMANA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_HERMANA,$con);
								$rcount_PEDIDOS_REALIZADOS_HERMANA=mysql_result($query_PEDIDOS_REALIZADOS_HERMANA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HERMANA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='hermana' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_HERMANA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HERMANA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_HERMANA=mysql_result($query_PEDIDOS_CONFIRMADOS_HERMANA,0);
								
								
								$sql31 = "select * from pedidos where estado_pedido='5' and relacion='hermana' and mes_de_entrega='$mes_de_entrega'";
								$res31 = mysql_query($sql31,$con);
									while($reg31 = mysql_fetch_array($res31)){
										if(isset($reg31["id_pedidos"])){									
											$id_pedidos=$reg31["id_pedidos"];											
											$total_pedido=$reg31["total_pedido"];											

											$realizados28[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados28)){
										$total_realizados28=0;
										for($i=0;$i<count($realizados28);$i++){	
											$subtotal_realizados28 = $realizados28[$i]['total_pedido'];
											$total_realizados28= $total_realizados28 + $subtotal_realizados28;											
										}												
									}	
									
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Hermana           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_HERMANA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_HERMANA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_hermana = ($total_realizados28 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados28); ?> <span class="label label-warning">(<?php echo number_format($peso_hermana); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_HERMANO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='hermano' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_HERMANO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_HERMANO,$con);
								$rcount_PEDIDOS_REALIZADOS_HERMANO=mysql_result($query_PEDIDOS_REALIZADOS_HERMANO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HERMANO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='hermano' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_HERMANO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HERMANO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_HERMANO=mysql_result($query_PEDIDOS_CONFIRMADOS_HERMANO,0);
								
								
								$sql32 = "select * from pedidos where estado_pedido='5' and relacion='hermano' and mes_de_entrega='$mes_de_entrega'";
								$res32 = mysql_query($sql32,$con);
									while($reg32 = mysql_fetch_array($res32)){
										if(isset($reg32["id_pedidos"])){									
											$id_pedidos=$reg32["id_pedidos"];											
											$total_pedido=$reg32["total_pedido"];											

											$realizados29[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados29)){
										$total_realizados29=0;
										for($i=0;$i<count($realizados29);$i++){	
											$subtotal_realizados29 = $realizados29[$i]['total_pedido'];
											$total_realizados29= $total_realizados29 + $subtotal_realizados29;											
										}												
									}	
									
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Hermano           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_HERMANO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_HERMANO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_hermano = ($total_realizados29 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados29); ?> <span class="label label-warning">(<?php echo number_format($peso_hermano); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AMIGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='amiga' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_AMIGA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AMIGA,$con);
								$rcount_PEDIDOS_REALIZADOS_AMIGA=mysql_result($query_PEDIDOS_REALIZADOS_AMIGA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AMIGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='amiga' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_AMIGA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AMIGA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AMIGA=mysql_result($query_PEDIDOS_CONFIRMADOS_AMIGA,0);
								
								
								$sql33 = "select * from pedidos where estado_pedido='5' and relacion='amiga' and mes_de_entrega='$mes_de_entrega'";
								$res33 = mysql_query($sql33,$con);
									while($reg33 = mysql_fetch_array($res33)){
										if(isset($reg33["id_pedidos"])){									
											$id_pedidos=$reg33["id_pedidos"];											
											$total_pedido=$reg33["total_pedido"];											

											$realizados30[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados30)){
										$total_realizados30=0;
										for($i=0;$i<count($realizados30);$i++){	
											$subtotal_realizados30 = $realizados30[$i]['total_pedido'];
											$total_realizados30= $total_realizados30 + $subtotal_realizados30;											
										}												
									}	
									
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Amiga           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AMIGA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AMIGA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_amiga = ($total_realizados30 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados30); ?> <span class="label label-warning">(<?php echo number_format($peso_amiga); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_AMIGO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='amigo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_AMIGO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_AMIGO,$con);
								$rcount_PEDIDOS_REALIZADOS_AMIGO=mysql_result($query_PEDIDOS_REALIZADOS_AMIGO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AMIGO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='amigo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_AMIGO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_AMIGO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_AMIGO=mysql_result($query_PEDIDOS_CONFIRMADOS_AMIGO,0);
								
								
								$sql34 = "select * from pedidos where estado_pedido='5' and relacion='amigo' and mes_de_entrega='$mes_de_entrega'";
								$res34 = mysql_query($sql34,$con);
									while($reg34 = mysql_fetch_array($res34)){
										if(isset($reg34["id_pedidos"])){									
											$id_pedidos=$reg34["id_pedidos"];											
											$total_pedido=$reg34["total_pedido"];											

											$realizados31[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados31)){
										$total_realizados31=0;
										for($i=0;$i<count($realizados31);$i++){	
											$subtotal_realizados31 = $realizados31[$i]['total_pedido'];
											$total_realizados31= $total_realizados31 + $subtotal_realizados31;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Amigo           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_AMIGO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_AMIGO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_amigo = ($total_realizados31 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados31); ?> <span class="label label-warning">(<?php echo number_format($peso_amigo); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_COLEGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='colega' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_COLEGA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_COLEGA,$con);
								$rcount_PEDIDOS_REALIZADOS_COLEGA=mysql_result($query_PEDIDOS_REALIZADOS_COLEGA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_COLEGA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='colega' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_COLEGA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_COLEGA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_COLEGA=mysql_result($query_PEDIDOS_CONFIRMADOS_COLEGA,0);
								
								
								$sql35 = "select * from pedidos where estado_pedido='5' and relacion='colega' and mes_de_entrega='$mes_de_entrega'";
								$res35 = mysql_query($sql35,$con);
									while($reg35 = mysql_fetch_array($res35)){
										if(isset($reg35["id_pedidos"])){									
											$id_pedidos=$reg35["id_pedidos"];											
											$total_pedido=$reg35["total_pedido"];											

											$realizados32[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados32)){
										$total_realizados32=0;
										for($i=0;$i<count($realizados32);$i++){	
											$subtotal_realizados32 = $realizados32[$i]['total_pedido'];
											$total_realizados32= $total_realizados32 + $subtotal_realizados32;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Colega           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_COLEGA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_COLEGA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_colega = ($total_realizados32 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados32); ?> <span class="label label-warning">(<?php echo number_format($peso_colega); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_PARA_MI = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='para_mi' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_PARA_MI=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_PARA_MI,$con);
								$rcount_PEDIDOS_REALIZADOS_PARA_MI=mysql_result($query_PEDIDOS_REALIZADOS_PARA_MI,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PARA_MI = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='para_mi' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_PARA_MI=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_PARA_MI,$con);
								$rcount_PEDIDOS_CONFIRMADOS_PARA_MI=mysql_result($query_PEDIDOS_CONFIRMADOS_PARA_MI,0);
								
								
								$sql36 = "select * from pedidos where estado_pedido='5' and relacion='para_mi' and mes_de_entrega='$mes_de_entrega'";
								$res36 = mysql_query($sql36,$con);
									while($reg36 = mysql_fetch_array($res36)){
										if(isset($reg36["id_pedidos"])){									
											$id_pedidos=$reg36["id_pedidos"];											
											$total_pedido=$reg36["total_pedido"];											

											$realizados33[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados33)){
										$total_realizados33=0;
										for($i=0;$i<count($realizados33);$i++){	
											$subtotal_realizados33 = $realizados33[$i]['total_pedido'];
											$total_realizados33= $total_realizados33 + $subtotal_realizados33;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Para Mi           
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_PARA_MI; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_PARA_MI; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_para_mi = ($total_realizados33 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados33); ?> <span class="label label-warning">(<?php echo number_format($peso_para_mi); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_HIJA = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='hija' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_HIJA=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_HIJA,$con);
								$rcount_PEDIDOS_REALIZADOS_HIJA=mysql_result($query_PEDIDOS_REALIZADOS_HIJA,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HIJA = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='hija' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_HIJA=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HIJA,$con);
								$rcount_PEDIDOS_CONFIRMADOS_HIJA=mysql_result($query_PEDIDOS_CONFIRMADOS_HIJA,0);
								
								
								$sql37 = "select * from pedidos where estado_pedido='5' and relacion='hija' and mes_de_entrega='$mes_de_entrega'";
								$res37 = mysql_query($sql37,$con);
									while($reg37 = mysql_fetch_array($res37)){
										if(isset($reg37["id_pedidos"])){									
											$id_pedidos=$reg37["id_pedidos"];											
											$total_pedido=$reg37["total_pedido"];											

											$realizados34[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados34)){
										$total_realizados34=0;
										for($i=0;$i<count($realizados34);$i++){	
											$subtotal_realizados34 = $realizados34[$i]['total_pedido'];
											$total_realizados34= $total_realizados34 + $subtotal_realizados34;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Hija          
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_HIJA; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_HIJA; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_hija = ($total_realizados34 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados34); ?> <span class="label label-warning">(<?php echo number_format($peso_hija); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_HIJO = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='hijo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_HIJO=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_HIJO,$con);
								$rcount_PEDIDOS_REALIZADOS_HIJO=mysql_result($query_PEDIDOS_REALIZADOS_HIJO,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HIJO = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='hijo' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_HIJO=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_HIJO,$con);
								$rcount_PEDIDOS_CONFIRMADOS_HIJO=mysql_result($query_PEDIDOS_CONFIRMADOS_HIJO,0);
								
								
								$sql38 = "select * from pedidos where estado_pedido='5' and relacion='hijo' and mes_de_entrega='$mes_de_entrega'";
								$res38 = mysql_query($sql38,$con);
									while($reg38 = mysql_fetch_array($res38)){
										if(isset($reg38["id_pedidos"])){									
											$id_pedidos=$reg38["id_pedidos"];											
											$total_pedido=$reg38["total_pedido"];											

											$realizados35[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados35)){
										$total_realizados35=0;
										for($i=0;$i<count($realizados35);$i++){	
											$subtotal_realizados35 = $realizados35[$i]['total_pedido'];
											$total_realizados35= $total_realizados35 + $subtotal_realizados35;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Hijo          
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_HIJO; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_HIJO; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_hijo = ($total_realizados35 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados35); ?> <span class="label label-warning">(<?php echo number_format($peso_hijo); ?>%)</span>
                                </td>
							</tr>
							<?php 								
								$mysql_CONSULTA_PEDIDOS_REALIZADOS_CLIENTE = "SELECT COUNT(*) FROM pedidos where estado_pedido='5' and relacion='cliente' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_REALIZADOS_CLIENTE=mysql_query($mysql_CONSULTA_PEDIDOS_REALIZADOS_CLIENTE,$con);
								$rcount_PEDIDOS_REALIZADOS_CLIENTE=mysql_result($query_PEDIDOS_REALIZADOS_CLIENTE,0);
								
								$mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CLIENTE = "SELECT COUNT(*) FROM pedidos where estado_pedido='15' and relacion='cliente' and mes_de_entrega='$mes_de_entrega'";
								$query_PEDIDOS_CONFIRMADOS_CLIENTE=mysql_query($mysql_CONSULTA_PEDIDOS_CONFIRMADOS_CLIENTE,$con);
								$rcount_PEDIDOS_CONFIRMADOS_CLIENTE=mysql_result($query_PEDIDOS_CONFIRMADOS_CLIENTE,0);
								
								
								$sql39 = "select * from pedidos where estado_pedido='5' and relacion='cliente' and mes_de_entrega='$mes_de_entrega'";
								$res39 = mysql_query($sql39,$con);
									while($reg39 = mysql_fetch_array($res39)){
										if(isset($reg39["id_pedidos"])){									
											$id_pedidos=$reg39["id_pedidos"];											
											$total_pedido=$reg39["total_pedido"];											

											$realizados36[]=array('id_pedidos'=>$id_pedidos,'total_pedido'=>$total_pedido);
										}
									}
								 									
									if(isset($realizados36)){
										$total_realizados36=0;
										for($i=0;$i<count($realizados36);$i++){	
											$subtotal_realizados36 = $realizados36[$i]['total_pedido'];
											$total_realizados36= $total_realizados36 + $subtotal_realizados36;											
										}												
									}										
							?>							
                            <!-- row -->
                            <!--<tr class="first">
                                <td>
									Cliente          
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CLIENTE; ?>
                                </td>
								<td>
                                    <?php echo $rcount_PEDIDOS_CONFIRMADOS_CLIENTE; ?>
                                </td>
								<td>
									<?php 
									$total_mes = $total_realizados + $total_confirmados;
									$peso_cliente = ($total_realizados36 * 100) / $total_mes;
									?>
                                    $<?php echo number_format($total_realizados36); ?> <span class="label label-warning">(<?php echo number_format($peso_cliente); ?>%)</span>
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