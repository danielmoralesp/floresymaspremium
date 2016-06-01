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
	<title>Proyecciones Mes | FloresyMasPremium.co</title>
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
			$dias_corridos = $_POST["dias_corridos"]; 
			$dias_faltantes = $_POST["dias_faltantes"]; 
			$ano_de_inicio = $_POST["ano_de_entrega"]; 
			$mes_de_inicio = $_POST["mes_de_entrega"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Proyeccion del Mes (<?php  echo $ano_de_entrega?> / <?php  echo $mes_de_entrega?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Ventas Actual</h4>
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
                                    Datos Actuales
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
				<div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-4">
                                    Datos Proyeccion
                                </th>
                                <th class="col-md-4">
                                    <span class="line"></span>
                                    # Pedidos * Dia
                                </th>
								<th class="col-md-4">
                                    <span class="line"></span>
                                    $ Total Ventas * Dia
                                </th>
                            </tr>
                        </thead>												
                        <tbody>	
							<tr class="first">
                                <td>
                                    <span class="label label-success"># Dias Corridos (<?php  echo $dias_corridos ?>)</span>
                                </td>
                                <td>
                                    <?php 
									$pedidos_dias_corridos = $rcount_PEDIDOS_REALIZADOS / $dias_corridos;
									echo round($pedidos_dias_corridos) ; 									
									?>
                                </td>
								<td>
                                    $<?php 
									$ventas_dias_corridos = $total_realizados / $dias_corridos;
									echo number_format($ventas_dias_corridos); ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    <span class="label label-info"># Dias Faltantes (<?php  echo $dias_faltantes ?>)</span>
                                </td>
                                <td>
                                    <?php 
									$pedidos_dias_faltantes = $pedidos_dias_corridos * $dias_faltantes;
									echo round($pedidos_dias_faltantes);?>          
                                </td>
								<td>
                                     $<?php 
									 $ventas_dias_faltantes = $ventas_dias_corridos * $dias_faltantes;
									 echo number_format($ventas_dias_faltantes); ?>
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
                        <span class="number"><?php echo round($rcount_TOTAL_PEDIDOS + $pedidos_dias_faltantes);?></span>
                        Pedidos Proyectados <br/>
						<span class="number">$<?php echo number_format($total_realizados + $total_confirmados + $ventas_dias_faltantes);?></span>
                        Ventas Proyectadas
                    </div>
                    <span class="date"><?php echo $ano_de_entrega;?> / <?php echo $mes_de_entrega;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->

        <!-- end upper main stats -->
		<div id="pad-wrapper">         

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Proyeccion del Mes (<?php  echo $ano_de_entrega?> / <?php  echo $mes_de_entrega?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Estadisticas de Ventas Actual - Recurrentes</h4>
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
                                    Datos Actuales
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
							<tr class="first">
                                <td>
                                    <span class="label label-success">#Pedidos Realizados</span>
                                </td>
                                <td>
                                    <?php echo $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD; ?>
                                </td>
								<td>
                                    $<?php echo number_format($total_realizados2); ?>
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

											$confirmados2[]=array('id_pedidos_plan_continuidad'=>$id_pedidos_plan_continuidad,'total'=>$total);
										}
									}
								 									
									if(isset($confirmados2)){
										$total_confirmados2=0;
										for($i=0;$i<count($confirmados2);$i++){	
											$subtotal_confirmados2 = $confirmados2[$i]['total'];
											$total_confirmados2= $total_confirmados2 + $subtotal_confirmados2;											
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
                                     $<?php echo number_format($total_confirmados2); ?>
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
                                    $<?php echo number_format($total_realizados2 + $total_confirmados2); ?>
                                </td>
							</tr>							
                        </tbody>												
                        <tbody>							
                            <!-- row -->                            							
                        </tbody>
                    </table>
                </div>
				<div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-4">
                                    Datos Proyeccion
                                </th>
                                <th class="col-md-4">
                                    <span class="line"></span>
                                    # Pedidos * Dia
                                </th>
								<th class="col-md-4">
                                    <span class="line"></span>
                                    $ Total Ventas * Dia
                                </th>
                            </tr>
                        </thead>												
                        <tbody>	
							<tr class="first">
                                <td>
                                    <span class="label label-success"># Dias Corridos (<?php  echo $dias_corridos ?>)</span>
                                </td>
                                <td>
                                    <?php 
									$pedidos_dias_corridos2 = $rcount_PEDIDOS_REALIZADOS_CONTINUIDAD / $dias_corridos;
									echo round($pedidos_dias_corridos2) ; 									
									?>
                                </td>
								<td>
                                    $<?php 
									$ventas_dias_corridos2 = $total_realizados2 / $dias_corridos;
									echo number_format($ventas_dias_corridos2); ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    <span class="label label-info"># Dias Faltantes (<?php  echo $dias_faltantes ?>)</span>
                                </td>
                                <td>
                                    <?php 
									$pedidos_dias_faltantes2 = $pedidos_dias_corridos2 * $dias_faltantes;
									echo round($pedidos_dias_faltantes2);?>          
                                </td>
								<td>
                                     $<?php 
									 $ventas_dias_faltantes2 = $ventas_dias_corridos2 * $dias_faltantes;
									 echo number_format($ventas_dias_faltantes2); ?>
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
			$rcount_TOTAL_PEDIDOS_2=$rcount_PEDIDOS_REALIZADOS_CONTINUIDAD+$rcount_PEDIDOS_CONFIRMADOS_CONTINUIDAD;
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                </div>                
                <div class="col-md-6 col-sm-6 stat last">                    
					<div class="data">
                        <span class="number"><?php echo round($rcount_TOTAL_PEDIDOS_2 + $pedidos_dias_faltantes2);?></span>
                        Pedidos Proyectados <br/>
						<span class="number">$<?php echo number_format($total_realizados2 + $total_confirmados2 + $ventas_dias_faltantes2);?></span>
                        Ventas Proyectadas
                    </div>
                    <span class="date"><?php echo $ano_de_inicio;?> / <?php echo $mes_de_inicio;?></span>
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