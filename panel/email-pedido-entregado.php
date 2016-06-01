<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	$sql="select * from pedido_manual
	where id_pedido_manual = ".$_GET["id_pedido_manual"]."";
	$res = mysql_query($sql,$con);
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Pedido | FloresyMas.co</title>
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
		<script language="javascript" type="text/javascript" src="js/validacion-email-pedido-entregado.js"></script>
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
			<h3>Email de Pedido Entregado</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-pedido-entregado.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>" method="post">					
                        <h4>Pedido Entregado</h3><br><br>				
						<div class="field-box">
							<label>Fecha de Pedido:</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["fecha_de_pedido"]; ?>" name="fecha_de_pedido" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_pedido"></div>
						</div>	
						<div class="field-box">
							<label>Fecha de Entrega:</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["fecha_de_entrega"]; ?>" name="fecha_de_entrega" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_entrega"></div>
						</div>						
						<div class="field-box">
							<label>Nombre del Producto</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["nombre_del_producto"]; ?>" name="nombre_del_producto" class="form-control inline-input" placeholder="ingrese nombre del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Nombre de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["nombre_de_quien_llama"]; ?>" name="nombre_de_quien_llama" class="form-control inline-input" placeholder="ingrese nombre de quien llama" />
							</div>
							<div id="div_nombre_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["telefonos_de_quien_llama"]; ?>" name="telefonos_de_quien_llama" class="form-control inline-input" placeholder="ingrese telefonos de quien llama"/>
							</div>
							<div id="div_telefonos_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Email de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["email_de_quien_llama"]; ?>" name="email_de_quien_llama" class="form-control inline-input" placeholder="ingrese email de quien llama"/>
							</div>
							<div id="div_email_de_quien_llama"></div>
						</div>					
						<div class="field-box">
							<label>Nombre del Remitente (¿Quien Envia?)</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["nombre_de_quien_envia"]; ?>" name="nombre_de_quien_envia" class="form-control inline-input" placeholder="ingrese nombre de quien envia"/>
							</div>
						</div>
						<div class="field-box">
							<label>Nombre de quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["nombre_de_quien_recibe"]; ?>" name="nombre_de_quien_recibe" class="form-control inline-input" placeholder="ingrese nombre de quien recibe" />
							</div>
						</div>
						
						--------------------------------------------------------------------------
						
						<br><br>
						<h4>Datos de Entrega</h3><br><br>	
						<div class="field-box">
							<label>Hora de Entrega Realizada</label>
							<div class="col-md-7">
								<input type="text"  value="" name="hora_real_entrega" class="form-control inline-input" placeholder="ingrese hora real de entrega" />
							</div>
							<div id="div_hora_real_entrega"></div>
						</div>
						<div class="field-box">
							<label>Nombre de Quien Recibio</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_recibio" class="form-control inline-input" placeholder="ingrese nombre de quien recibio" />
							</div>
							<div id="div_nombre_de_quien_recibio"></div>
						</div>
						<div class="field-box">
							<label>Link de la Fotografia</label>
							<div class="col-md-7">
								<input type="text"  value="" name="link_fotografia" class="form-control inline-input" placeholder="ingrese el link de la fotografia" />
							</div>
							<div id="div_link_fotografia"></div>
						</div>
						<div class="field-box">
                            <label>Observaciones de la Entrega:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="observaciones_de_entrega"></textarea>
                            </div>
                        </div>
						

						<br>
						<div>
							<input type="button" class="btn-glow primary btn-next" value="Enviar" onClick="validar()"/>
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