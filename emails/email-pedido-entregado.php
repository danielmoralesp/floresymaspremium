<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==2 or $_SESSION['miSession']['permisos']==3){
		require_once("../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Email Pedido Entregado | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="../panel/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../panel/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="../panel/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="../panel/css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="../panel/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="../panel/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="../panel/css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../panel/css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../panel/css/compiled/icons.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="../panel/css/compiled/form-showcase.css" type="text/css" media="screen" />

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
    <?php require_once("../panel/instancias/header.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php require_once("../panel/instancias/menu-dashboard.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
		
		<?php	
			$sql2="select * from pedidos
			where id_pedidos = ".$_GET["id_pedidos"]."";
			$res2 = mysql_query($sql2,$con);
			if($reg2 = mysql_fetch_array($res2)){	
		?>
        <div id="pad-wrapper" class="form-page">
			<h3>Email de Pedido Entregado</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-pedido-entregado.php?id_pedidos=<?php echo $reg2["id_pedidos"];?>" method="post">					
                        <h4>Pedido Entregado</h3><br><br>				
						<div class="field-box">
							<label>Fecha de Pedido:</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["fecha_de_pedido"]; ?>" name="fecha_de_pedido" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_pedido"></div>
						</div>	
						<div class="field-box">
							<label>Año, Mes y Dia de Entrega:</label>
                            <div class="col-md-2">
								<select name="ano_de_entrega" style="width:115px" class="select2">
                                    <option value="<?php echo $reg2["ano_de_entrega"]; ?>"><?php echo $reg2["ano_de_entrega"]; ?></option>                                    
									<option value="2015">2015</option>

                                </select>
							</div>
							<div class="col-md-2">
								<select name="mes_de_entrega" style="width:115px" class="select2">
                                    <option value="<?php echo $reg2["mes_de_entrega"]; ?>"><?php echo $reg2["mes_de_entrega"]; ?></option>                                    
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
                                </select>
							</div>
							<div class="col-md-2">
								<select name="dia_de_entrega" style="width:115px" class="select2">
                                    <option value="<?php echo $reg2["dia_de_entrega"]; ?>"><?php echo $reg2["dia_de_entrega"]; ?></option>                                    
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
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
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>						
						<div class="field-box">
							<label>Hora de Entrega Pactada</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["hora_de_entrega"]; ?>" name="hora_de_entrega" class="form-control inline-input" placeholder="ingrese nombre del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Nombre del Producto</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["nombre_del_producto"]; ?>" name="nombre_del_producto" class="form-control inline-input" placeholder="ingrese nombre del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Nombre de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["nombre_de_quien_llama"]; ?>" name="nombre_de_quien_llama" class="form-control inline-input" placeholder="ingrese nombre de quien llama" />
							</div>
							<div id="div_nombre_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["telefono_de_quien_llama"]; ?>" name="telefono_de_quien_llama" class="form-control inline-input" placeholder="ingrese telefonos de quien llama"/>
							</div>
							<div id="div_telefonos_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Email de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["email_de_quien_llama"]; ?>" name="email_de_quien_llama" class="form-control inline-input" placeholder="ingrese email de quien llama"/>
							</div>
							<div id="div_email_de_quien_llama"></div>
						</div>					
						<div class="field-box">
							<label>Nombre del Remitente (¿Quien Envia?)</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["nombre_de_quien_envia"]; ?>" name="nombre_de_quien_envia" class="form-control inline-input" placeholder="ingrese nombre de quien envia"/>
							</div>
						</div>
						<div class="field-box">
							<label>Nombre de quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["nombre_de_quien_recibe"]; ?>" name="nombre_de_quien_recibe" class="form-control inline-input" placeholder="ingrese nombre de quien recibe" />
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
                            <label>Observaciones de la Entrega:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="observaciones_de_entrega"></textarea>
                            </div>
                        </div>	
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Enviar" />
						</div>
                    </form>
                </div>
            </div>
        </div>
		<?php
			}
		}
		?>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="../panel/js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../panel/js/bootstrap.min.js"></script>
    <script src="../panel/js/bootstrap.datepicker.js"></script>
    <script src="../panel/js/jquery.uniform.min.js"></script>
    <script src="../panel/js/select2.min.js"></script>
    <script src="../panel/js/theme.js"></script>

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
				window.location='../usuarios/login';
			  </script>";
	}
	
?>