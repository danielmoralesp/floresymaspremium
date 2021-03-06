<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Form Wizard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
	<link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-wizard.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

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
        
       
        <div id="pad-wrapper">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div id="fuelux-wizard" class="wizard row">
                        <ul class="wizard-steps">
                            <li data-target="#step1" class="active">
                                <span class="step">1</span>
                                <span class="title">General <br> information</span>
                            </li>
                            <li data-target="#step2">
                                <span class="step">2</span>
                                <span class="title">Address <br> information</span>
                            </li>
                            <li data-target="#step3">
                                <span class="step">3</span>
                                <span class="title">User <br> settings</span>
                            </li>
                            <li data-target="#step4">
                                <span class="step">4</span>
                                <span class="title">Payment <br> info</span>
                            </li>
                        </ul>                            
                    </div>
                    <div class="step-content">
                        <div class="step-pane active" id="step1">
                            <div class="row form-wrapper">
                                <div class="col-md-8">
                                    <form name="form" method="post" action="procesar-pedido.php">
										<div class="field-box">
											<label>Fecha de Pago:</label>
											<input type="text"  value="" name="fecha_de_pago" class="form-control input-datepicker" />
										</div>
										<div class="field-box">
											<label>Fecha de Entrega:</label>
											<input type="text"  value="" name="fecha_de_entrega" class="form-control input-datepicker" />
										</div>
										<div class="field-box">
                                            <label>Hora de Entrega:</label>
                                            <select name="hora_de_entrega" >
                                                <option value="">Seleccionar</option>
                                                <option value="7am - 9am (Desayuno)">7am - 9am (Desayuno)</option>
												<option value="8am - 10am">8am - 10am</option>
												<option value="10am - 12md">10am - 12md</option>
												<option value="12md - 2pm">12md - 2pm</option>
												<option value="2pm - 4pm">2pm - 4pm</option>
												<option value="4pm - 6pm">4pm - 6pm</option>
                                            </select>
                                        </div>
										<div class="field-box">
                                            <label>Tipo de Producto</label>
                                            <select name="tipo_de_producto" >
                                                <option value="">Seleccionar</option>
                                                <option value="Arreglo Floral">Arreglo Floral</option>
												<option value="Desayuno Sorpresa">Desayuno Sorpresa</option>
                                            </select>
                                        </div>
										<div class="field-box">
                                            <label>Atendido Por:</label>
                                            <select name="atendido_por" >
                                                <option value="">Seleccionar</option>
                                                <option value="Angelica_Escobar">Angelica Escobar</option>
												<option value="Daniel_Morales">Daniel Morales</option>
                                            </select>
                                        </div>
                                        <!--<div class="field-box error">
                                            <label>Company:</label>
                                            <input class="form-control" type="text" />
                                            <span class="alert-msg"><i class="icon-remove-sign"></i> Please enter your company</span>
                                        </div>
                                        <div class="field-box">
                                            <label>Email:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box success">
                                            <label>Username:</label>
                                            <input class="form-control" type="text" />
                                            <span class="alert-msg"><i class="icon-ok-sign"></i> Username available</span>
                                        </div>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="step-pane" id="step2">
                            <div class="row form-wrapper">
                                <div class="col-md-8">
                                    <form>
                                        <div class="field-box">
                                            <label>Address:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>City:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Postal/ZIP code:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Country:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="step-pane" id="step3">
                            <div class="row form-wrapper">
                                <div class="col-md-8">
                                    <form>
                                        <div class="field-box">
                                            <label>Username:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Photo:</label>
                                            <input type="file" />
                                        </div>
                                        <div class="field-box">
                                            <label>App name:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Time zone:</label>
                                            <select>
                                                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                                <option value="Alaska">(GMT-09:00) Alaska</option>
                                                <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                <option value="Arizona">(GMT-07:00) Arizona</option>
                                                <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option><option value="" disabled="disabled">-------------</option>
                                                <option value="American Samoa">(GMT-11:00) American Samoa</option>
                                                <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                <option value="Midway Island">(GMT-11:00) Midway Island</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="step-pane" id="step4">
                            <div class="row form-wrapper payment-info">
                                <div class="col-md-8">
                                    <form>
                                        <div class="field-box">
                                            <label>Subscription Plan:</label>
                                            <select id="plan">
                                                <option value="66">Basic - $2.99/month (USD)</option>
                                                <option value="67">Pro - $9.99/month (USD)</option>
                                                <option value="68">Premium - $49.99/month (USD)</option>
                                            </select>
                                        </div>
                                        <div class="field-box">
                                            <label>Credit Card Number:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Expiration:</label>
                                            <input class="form-control" style="width:60px;display:inline" placeholder="MM" type="text" /> 
                                            &nbsp; / &nbsp;
                                            <input class="form-control" style="width:85px;display:inline" placeholder="YYYY" type="text" />
                                        </div>
                                        <div class="field-box">
                                            <label>Card CVC Number:</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-actions">
                        <button type="button" disabled class="btn-glow primary btn-prev"> 
                            <i class="icon-chevron-left"></i> Prev
                        </button>
                        <button type="button" class="btn-glow primary btn-next" data-last="Finish">
                            Next <i class="icon-chevron-right"></i>
                        </button>
                        <button type="button" class="btn-glow success btn-finish">
                            Setup your account!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.datepicker.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/fuelux.wizard.js"></script>

    <script type="text/javascript">
        $(function () {
            var $wizard = $('#fuelux-wizard'),
                $btnPrev = $('.wizard-actions .btn-prev'),
                $btnNext = $('.wizard-actions .btn-next'),
                $btnFinish = $(".wizard-actions .btn-finish");

            $wizard.wizard().on('finished', function(e) {
                // wizard complete code
            }).on("changed", function(e) {
                var step = $wizard.wizard("selectedItem");
                // reset states
                $btnNext.removeAttr("disabled");
                $btnPrev.removeAttr("disabled");
                $btnNext.show();
                $btnFinish.hide();

                if (step.step === 1) {
                    $btnPrev.attr("disabled", "disabled");
                } else if (step.step === 4) {
                    $btnNext.hide();
                    $btnFinish.show();
                }
            });

            $btnPrev.on('click', function() {
                $wizard.wizard('previous');
            });
            $btnNext.on('click', function() {
                $wizard.wizard('next');
            });
        });
    </script>
	<!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {

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