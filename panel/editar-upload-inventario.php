<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	$sql="select * from codigo_inventario
	where id_codigo_inventario = ".$_GET["id_codigo_inventario"]."";
	$res = mysql_query($sql,$con);
	

	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Inventario | FloresyMas.co</title>
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
		<script language="javascript" type="text/javascript" src="js/validacion-paso1.js"></script>
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
			<h3>Editar inventario</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="edit-upload-inventario.php?id_codigo_inventario=<?php echo $reg["id_codigo_inventario"];?>" method="post">					
                        <h4>Editar Inventario ------------</h3><br><br>				
						<div class="field-box">
							<label>Codigo Inventario:</label>
                            <div class="col-md-7">
								<select name="codigo_inventario" style="width:350px" class="select2">
									<option value="<?php echo $reg["codigo_inventario"]; ?>"><?php echo $reg["codigo_inventario"]; ?></option>
                                    <option value="Vendela">Vendela</option>
									<option value="Jade">Jade</option>
									<option value="Hot Paris">Hot Paris</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Codigo Inventario:</label>
                            <div class="col-md-7">
								<select name="unidades_codigo_inventario" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["unidades_codigo_inventario"]; ?>"><?php echo $reg["unidades_codigo_inventario"]; ?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>								
								</select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Editar"/>
							<input type="hidden" name="id_codigo_inventario" value="<?php echo $_GET["id_codigo_inventario"];?>"/>
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