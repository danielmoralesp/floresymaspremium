<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	$sql="select * from pedido_manual 
	where id_pedido_manual='".$_GET["id_pedido_manual"]."'"; 

	$res = mysql_query($sql,$con);	
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Paso 2 | Pedido Nuevo | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- validate-->
		<script language="javascript" type="text/javascript" src="js/validacion-paso2.js"></script>
	<!--end validate-->
	
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
        
		
        <?php
			if($reg = mysql_fetch_array($res)){
		?>
        <div id="pad-wrapper" class="form-page">
			<h3>Pedido Nuevo</h3><br><br>
            <div class="row form-wrapper">                							
				<img src="img/pasos/paso2.png"/ class="col-md-8 img-responsive"><br><br><br><br><br><br>			
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-paso2.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>" method="post">					
                        <div class="field-box">
							<label>Nombre del Producto</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_del_producto" class="form-control inline-input" placeholder="ingrese nombre del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Precio del Producto</label>
							<div class="col-md-7">
								<input type="text"  value="" name="precio_del_producto" class="form-control inline-input" placeholder="ingrese precio del producto"/>
							</div>
							<div id="div_precio_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Valor Envío</label>
							<div class="col-md-7">
								<input type="text"  value="" name="valor_del_envio" class="form-control inline-input" placeholder="ingrese valor de envio"/>
							</div>
						</div>
						<div class="field-box">
							<label>Total Compra</label>
							<div class="col-md-7">
								<input type="text"  value="" name="total_compra" class="form-control inline-input" placeholder="ingrese total compra"/>
							</div>
							<div id="div_total_compra"></div>
						</div>
						<div class="field-box">
							<label>Metodo de Pago:</label>
                            <div class="col-md-7">
								<select name="metodo_pago" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>                                    
									<option value="banco_consignacion_nacional">Banco (Consignacion Local)</option>
									<option value="banco_consignacion_nacional">Banco (Consignacion Nacional)</option>
									<option value="banco_transferencia_cajero">Banco (Transferencia Cajero)</option>				
									<option value="banco_transferencia_internet">Banco (Transferencia Internet)</option>
									<option value="payulatam">Pago Internet PayULatam</option>
									<option value="giro_efecty">Giro Efecty</option>
									<option value="giro_gana">Giro Gana</option>
									<option value="giro_internacional">Giro Internacional</option>
									<option value="caja">ContraEntrega</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
                            <label>Confirmación de Pago</label>
							<div class="col-md-7">
								<select name="confirmacion_pago" style="width:350px" class="select2">
									<option value="">Seleccionar</option>
									<option value="Confirmado">Confirmado</option>
									<option value="No Confirmado">No Confirmado</option>
								</select>
							</div>
                        </div>
						<br>
						<div class="wizard-actions">
							<input type="button" class="btn-glow primary btn-next" value="Continuar" onClick="validar()"/>
							<input type="hidden" name="id_pedido_manual" value="<?php echo $_GET["id_pedido_manual"];?>"/>
							<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>
							<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
							<input type="hidden" name="fecha_de_entrega" value="<?php echo $reg["fecha_de_entrega"]; ?>"/>
							<input type="hidden" name="hora_de_entrega" value="<?php echo $reg["hora_de_entrega"]; ?>"/>
							<input type="hidden" name="tipo_de_producto" value="<?php echo $reg["tipo_de_producto"]; ?>"/>
							<input type="hidden" name="atendido_por" value="<?php echo $reg["atendido_por"]; ?>"/>							
						</div>
                    </form>
                </div>               
            </div>
        </div>
		<?php
			}
		?>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/theme.js"></script>

    <!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.input-datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
        });
    </script>
</body>
</html>

<?php

	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='login';
			  </script>";
	}
	
?>