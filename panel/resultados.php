<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
	<link href="css/lib/morris.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <!-- navbar -->
    <?php require_once("header.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php require_once("menu-dashboard.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <!--<div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default skin</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/compiled/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>-->
		<?php
			$fecha_de_dato= date('m/d/Y');
			//CALCULO VENTAS * DIA
			$sql = "select * from pedido_manual where estado_pedido='realizado' and fecha_de_pago='$fecha_de_dato'";
				$res = mysql_query($sql,$con);
					while($reg = mysql_fetch_array($res)){
						if(isset($reg["id_pedido_manual"])){									
							$id_pedido_manual=$reg["id_pedido_manual"];											
							$total_compra=$reg["total_compra"];											

							$ventas_dia[]=array('id_pedido_manual'=>$id_pedido_manual,'total_compra'=>$total_compra);
						}
					}
								 									
					if(isset($ventas_dia)){
						$total_ventas_dia=0;
						for($i=0;$i<count($ventas_dia);$i++){	
							$subtotal_ventas_dia = $ventas_dia[$i]['total_compra'];
							$total_ventas_dia= $total_ventas_dia + $subtotal_ventas_dia;											
						}												
					}
			
			//CALCULO #ITEMS VENDIDOS * DIA
			$mysql_CONSULTA_TOTALES_COMPRADOS_DIA = "SELECT COUNT(*) FROM pedido_manual where estado_pedido='realizado' and fecha_de_pago='$fecha_de_dato'";
			$query_TOTALES_COMPRADOS_DIA=mysql_query($mysql_CONSULTA_TOTALES_COMPRADOS_DIA,$con);
			$rcount_TOTALES_COMPRADOS_DIA=mysql_result($query_TOTALES_COMPRADOS_DIA,0);
			
			
			//CALCULO VENTAS * MES 
			$sql2 = "select * from pedido_manual where estado_pedido='realizado'";
				$res2 = mysql_query($sql2,$con);
					while($reg2 = mysql_fetch_array($res2)){
						if(isset($reg2["id_pedido_manual"])){									
							$id_pedido_manual=$reg2["id_pedido_manual"];											
							$total_compra=$reg2["total_compra"];											

							$ventas_mes[]=array('id_pedido_manual'=>$id_pedido_manual,'total_compra'=>$total_compra);
						}
					}
								 									
					if(isset($ventas_mes)){
						$total_ventas_mes=0;
						for($i=0;$i<count($ventas_mes);$i++){	
							$subtotal_ventas_mes = $ventas_mes[$i]['total_compra'];
							$total_ventas_mes= $total_ventas_mes + $subtotal_ventas_mes;											
						}												
					}
			
			//CALCULO #ITEMS VENDIDOS * MES 
			$mysql_CONSULTA_TOTALES_COMPRADOS_MES = "SELECT COUNT(*) FROM pedido_manual where estado_pedido='realizado'";
			$query_TOTALES_COMPRADOS_MES=mysql_query($mysql_CONSULTA_TOTALES_COMPRADOS_MES,$con);
			$rcount_TOTALES_COMPRADOS_MES=mysql_result($query_TOTALES_COMPRADOS_MES,0);
		?>					
        
		<!-- ESTADISTICAS HASTA LA FECHA -->
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <!-- VENTAS CARGADAS DINAMICAMENTE 
						<span class="number">$<?php  echo $total_ventas_mes?></span> -->
						<span class="number">$39.955.453</span>
                        Ventas
                    </div>
                    <span class="date">Hasta la Fecha</span>
                </div>                
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <!-- ITEMS CARGADOS DINAMICAMENTE 
						<span class="number"><?php  echo $rcount_TOTALES_COMPRADOS_MES?></span>-->
						<span class="number">438</span>
                        Items
                    </div>
                    <span class="date">Hasta la Fecha</span>
                </div>
				<div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number">$<?php  echo $total_ventas_dia?></span>
                        Ventas
                    </div>
                    <span class="date">Hoy (<?php  echo $fecha_de_dato?>)</span>
                </div>
                <div class="col-md-3 col-sm-3 stat last">
                    <div class="data">
                        <span class="number"><?php  echo $rcount_TOTALES_COMPRADOS_DIA?></span>
                        Items
                    </div>
                    <span class="date">Hoy (<?php  echo $fecha_de_dato?>)</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
        <div id="pad-wrapper">
            <!-- morris bar & donut charts -->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        Ventas (Hasta la Fecha) <small>Crecimiento Diario</small><br>                        
                    </h4>
                </div>
                <div class="col-md-12 chart">                    
                    <div id="hero-bar" style="height: 250px;"></div>
                </div>
            </div>
			<!-- jQuery flot chart -->
            <div class="row section">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        # Items Vendidos (Hasta la Fecha) <small>Crecimiento Diario</small>                        
                    </h4>
                </div>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div> 
        </div>
		<br><br><br><br>
		
		<!--- ESTADISTICAS MENSUALES (AGOSTO 2014)-->
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
						<span class="number">$6.220.797</span>
                        Ventas
                    </div>
                    <span class="date">Agosto 2014</span>
                </div>                
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
						<span class="number">64</span>
                        Items
                    </div>
                    <span class="date">Agosto 2014</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
        <div id="pad-wrapper">
            <!-- morris bar & donut charts -->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        Ventas (Agosto 2014) <small>Crecimiento Diario</small><br>                        
                    </h4>
                </div>
                <div class="col-md-12 chart">                    
                    <div id="hero-bar-2" style="height: 250px;"></div>
                </div>
            </div>
        </div>
		<br><br><br><br>
		
		<!--- ESTADISTICAS MENSUALES (SEPTIEMBRE 2014)-->
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
						<span class="number">$33.734.656</span>
                        Ventas
                    </div>
                    <span class="date">Septiembre 2014</span>
                </div>                
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
						<span class="number">374</span>
                        Items
                    </div>
                    <span class="date">Septiembre 2014</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
        <div id="pad-wrapper">
            <!-- morris bar & donut charts -->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        Ventas (Septiembre 2014) <small>Crecimiento Diario</small><br>                        
                    </h4>
                </div>
                <div class="col-md-12 chart">                    
                    <div id="hero-bar-3" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>


	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- knob -->
    <script src="js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <!-- morrisjs -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>
	<!-- call all plugins -->
	<script src="js/theme.js"></script>	
	

	<!-- CHARTS HASTA LA FECHA -->	
    <!-- build the charts -->
    <script type="text/javascript">

        // Morris Bar Chart
        Morris.Bar({
            element: 'hero-bar',
            data: [
                {fecha: '25/08', ventas: 456371},
                {fecha: '26/08', ventas: 1735952},
                {fecha: '27/08', ventas: 1201594},
                {fecha: '28/08', ventas: 1220668},
				{fecha: '29/08', ventas: 1381412},
				{fecha: '30/08', ventas: 224800},
				{fecha: '01/09', ventas: 318500},
				{fecha: '02/09', ventas: 1053300},
				{fecha: '03/09', ventas: 571130},
				{fecha: '04/09', ventas: 1786570},
				{fecha: '05/09', ventas: 1248467},
				{fecha: '06/09', ventas: 833510},
				{fecha: '08/09', ventas: 751200},
				{fecha: '09/09', ventas: 1593128},
				{fecha: '10/09', ventas: 1319640},
				{fecha: '11/09', ventas: 2251856},
				{fecha: '12/09', ventas: 1265490},
				{fecha: '13/09', ventas: 413000},
				{fecha: '15/09', ventas: 1509580},
				{fecha: '16/09', ventas: 986440},
				{fecha: '17/09', ventas: 4062525},
				{fecha: '18/09', ventas: 2189240},
				{fecha: '19/09', ventas: 3570400},
				{fecha: '20/09', ventas: 524300},
				{fecha: '22/09', ventas: 480000},
				{fecha: '23/09', ventas: 947400},
				{fecha: '24/09', ventas: 1507700},
				{fecha: '25/09', ventas: 1191600},
				{fecha: '26/09', ventas: 1293320},
				{fecha: '27/09', ventas: 143100},
				{fecha: '29/09', ventas: 737620},
				{fecha: '30/09', ventas: 1185640},
               
      
            ],
            xkey: 'fecha',
            ykeys: ['ventas'],
            labels: ['ventas'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });




        //  jQuery Flot Chart
        var compras = [[1, 5], [2, 19], [3, 12], [4, 12], [5, 14], [6, 2], [7, 4], [8, 9], [9, 6], [10, 18], [11, 12], [12, 8], [13, 8], [14,16], [15,13], [16,24], [17,14], [18,5], [19,17], [20,13], [21,46], [22,28], [23,41], [24,5], [25,7], [26,12], [27,17], [28,13], [29,13], [30,2], [31,8], [32,15]];

        var plot = $.plot($("#statsChart"),
            [{ data: compras, label: "Compras" }], {
                series: {
                    lines: { show: true,
                            lineWidth: 1,
                            fill: true, 
                            fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.09 } ] }
                         },
                    points: { show: true, 
                             lineWidth: 2,
                             radius: 3
                         },
                    shadowSize: 0,
                    stack: true
                },
                grid: { hoverable: true, 
                       clickable: true, 
                       tickColor: "#f9f9f9",
                       borderWidth: 0
                    },
                legend: {
                        // show: false
                        labelBoxBorderColor: "#fff"
                    },  
                colors: ["#a7b5c5", "#30a0eb"],
                xaxis: {
                    ticks: [[1, "25/08"], [2, "26/08"], [3, "27/08"], [4,"28/08"], [5,"29/08"], [6,"30/08"], 
                           [7,"01/09"], [8,"02/09"], [9,"03/09"], [10,"04/09"], [11,"05/09"], [12,"06/09"], [13,"08/09"], [14,"09/09"], [15,"10/09"], [16,"11/09"], [17,"12/09"], [18,"13/09"], [19,"15/09"], [20,"16/09"], [21,"17/09"], [22,"18/09"], [23,"19/09"], [24,"20/09"], [25,"22/09"], [26,"23/09"], [27,"24/09"], [28,"25/09"], [29,"26/09"], [30,"27/09"], [31,"29/09"], [32,"30/09"]],
                    font: {
                        size: 12,
                        family: "Open Sans, Arial",
                        variant: "small-caps",
                        color: "#9da3a9"
                    }
                },
                yaxis: {
                    ticks:3, 
                    tickDecimals: 0,
                    font: {size:12, color: "#9da3a9"}
                }
             });

        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 30,
                left: x - 50,
                color: "#fff",
                padding: '2px 5px',
                'border-radius': '6px',
                'background-color': '#000',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#statsChart").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(0),
                        y = item.datapoint[1].toFixed(0);

                    var month = item.series.xaxis.ticks[item.dataIndex].label;

                    showTooltip(item.pageX, item.pageY,
                                item.series.label + " of " + month + ": " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    </script>
	
	<!-- CHARTS AGOSTO 2014 -->
	<script type="text/javascript">

        // Morris Bar Chart
        Morris.Bar({
            element: 'hero-bar-2',
            data: [
                {fecha: '25/08', ventas: 456371},
                {fecha: '26/08', ventas: 1735952},
                {fecha: '27/08', ventas: 1201594},
                {fecha: '28/08', ventas: 1220668},
				{fecha: '29/08', ventas: 1381412},
				{fecha: '30/08', ventas: 224800},
               
      
            ],
            xkey: 'fecha',
            ykeys: ['ventas'],
            labels: ['ventas'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });

    </script>
	
	<!-- CHARTS SEPTIEMBRE 2014 -->
	<script type="text/javascript">

        // Morris Bar Chart
        Morris.Bar({
            element: 'hero-bar-3',
            data: [
                {fecha: '01/09', ventas: 318500},
				{fecha: '02/09', ventas: 1053300},
				{fecha: '03/09', ventas: 571130},
				{fecha: '04/09', ventas: 1786570},
				{fecha: '05/09', ventas: 1248467},
				{fecha: '06/09', ventas: 833510},
				{fecha: '08/09', ventas: 751200},
				{fecha: '09/09', ventas: 1593128},
				{fecha: '10/09', ventas: 1319640},
				{fecha: '11/09', ventas: 2251856},
				{fecha: '12/09', ventas: 1265490},
				{fecha: '13/09', ventas: 413000},
				{fecha: '15/09', ventas: 1509580},
				{fecha: '16/09', ventas: 986440},
				{fecha: '17/09', ventas: 4062525},
				{fecha: '18/09', ventas: 2189240},
				{fecha: '19/09', ventas: 3570400},
				{fecha: '20/09', ventas: 524300},
				{fecha: '22/09', ventas: 480000},
				{fecha: '23/09', ventas: 947400},
				{fecha: '24/09', ventas: 1507700},
				{fecha: '25/09', ventas: 1191600},
				{fecha: '26/09', ventas: 1293320},
				{fecha: '27/09', ventas: 143100},
				{fecha: '29/09', ventas: 737620},
				{fecha: '30/09', ventas: 1185640},
               
      
            ],
            xkey: 'fecha',
            ykeys: ['ventas'],
            labels: ['ventas'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });

    </script>
	
							
</body>
</html>

<?php

	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado');
				window.location='login';
			  </script>";
	}
	
?>