<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==2){
		require_once("../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
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
    <?php require_once("instancias/header.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("instancias/menu-dashboard.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">
		<?php
			$fecha_de_dato= date('m/d/Y');
			//CALCULO VENTAS * DIA
			$sql2 = "select * from pedido_manual where estado_pedido='realizado' and fecha_de_pago='$fecha_de_dato'";
				$res2 = mysql_query($sql2,$con);
					while($reg2 = mysql_fetch_array($res2)){
						if(isset($reg2["id_pedido_manual"])){									
							$id_pedido_manual=$reg2["id_pedido_manual"];											
							$total_compra=$reg2["total_compra"];											

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
			$sql3 = "select * from pedido_manual where estado_pedido='realizado'";
				$res3 = mysql_query($sql2,$con);
					while($reg3 = mysql_fetch_array($res3)){
						if(isset($reg2["id_pedido_manual"])){									
							$id_pedido_manual=$reg3["id_pedido_manual"];											
							$total_compra=$reg3["total_compra"];											

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
        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <!--<div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number">$<?php  echo $total_ventas_mes?></span>
                        Ventas
                    </div>
                    <span class="date">Agosto 2014</span>
                </div> -->               
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number"><?php  echo $rcount_TOTALES_COMPRADOS_MES?></span>
                        Items
                    </div>
                    <span class="date">Agosto 2014</span>
                </div>
				<!--<div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number">$<?php  echo $total_ventas_dia?></span>
                        Ventas
                    </div>
                    <span class="date">Hoy (<?php  echo $fecha_de_dato?>)</span>
                </div>-->
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
        <!--<div id="pad-wrapper">
            <!-- morris bar & donut charts -->
            <!--<div class="row">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        Ventas <small>Crecimiento Diario</small><br>                        
                    </h4>
                </div>
                <div class="col-md-12 chart">                    
                    <div id="hero-bar" style="height: 250px;"></div>
                </div>
            </div>
			<!-- jQuery flot chart -->
            <!--<div class="row section">
                <div class="col-md-12">
                    <h4 class="title pull-left">
                        # Items Vendidos <small>Crecimiento Diario</small>                        
                    </h4>
                </div>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div> 
        </div>-->
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
							
    <!-- build the charts -->
    <script type="text/javascript">

        // Morris Bar Chart
        Morris.Bar({
            element: 'hero-bar',
            data: [
                {fecha: '01/09', ventas: 507596},
                {fecha: '04/09', ventas: 1135360},
                {fecha: '05/09', ventas: 1228160},
                {fecha: '06/09', ventas: 1433684},
				{fecha: '08/09', ventas: 1066888},
				{fecha: '11/09', ventas: 1287960},
				{fecha: '12/09', ventas: 1121524},
				{fecha: '13/09', ventas: 1027896},
				{fecha: '14/09', ventas: 1547816},
				{fecha: '15/09', ventas: 506700},
				{fecha: '19/09', ventas: 594668},
				{fecha: '20/09', ventas: 1261124},
				{fecha: '21/09', ventas: 513320},
				{fecha: '22/09', ventas: 1225500},              
      
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
        var compras = [[1, 6], [2, 12], [3, 14], [4, 17], [5, 11], [6, 14], [7, 12], [8, 9], [9, 17], [10, 6], [11, 5], [12, 14], [13, 6], [14, 14]];

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
                    ticks: [[1, "01/08"], [2, "04/08"], [3, "05/08"], [4,"06/08"], [5,"08/08"], [6,"11/08"], 
                           [7,"12/08"], [8,"13/08"], [9,"14/08"], [10,"15/08"], [11,"19/08"], [12,"20/08"], [13,"21/08"], [14,"22/08"]],
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
	<?php
		}
	?>							
</body>
</html>

<?php

}else{
		echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["user"]." no tiene permisos de ingreso');
				window.location='login';
			  </script>";
		?>
		<htm>
			<meta http-equiv="refresh" content="0; url=login">
		</html>
		<?php
	}

?>


