<?php
	require_once("../../conexion.php");
	$sql="select * from pedidos_plan_continuidad
	where id_pedidos_plan_continuidad='".$_GET["id_pedidos_plan_continuidad"]."'	"; 
	//$sql="select * from noticias where id_noticia=$id_noticia	"; (forma de hacer numero 2)
	//echo $sql;
	$res = mysql_query($sql,$con);
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title></title>
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	
	<?php 
	$id_usuario = $_GET["id_usuario"];
	$id_pedidos_plan_continuidad = $_GET["id_pedidos_plan_continuidad"];	
	?>
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "paso4-m.php?id_pedidos_plan_continuidad=<?php echo $id_pedidos_plan_continuidad?>&id_usuario=<?php echo $id_usuario?>";
		}
	  //-->
	</script>

    <script src="../../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/auto-refill-build/base-52c03334d5621da5001fbbee9080cedf.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="../../assets/desktop/checkout/base-ec3b26d4c38ea303cded78672d365221.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../../assets/validacion/validar-paso4.js"></script>

	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="//v2.zopim.com/?3QHttEutJ1CyxQJLP3MYVfd7D2E3Id0T";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zopim Live Chat Script-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69094727-1', 'auto');
	  ga('send', 'pageview');

	</script>

</head>
<body>
    <div class='global-wrapper'>
        <div id="flashes">
        </div>
        <?php require_once("../../instancias/header4.php"); ?>             
		<main id="shave_plans_build">
			<h1>Su Plan de Recurrencia</h1>    
				<?php
				if($reg = mysql_fetch_array($res)){
			?>
			<section class="bundle-section complete closed" data-section="Input" data-name="bundle" data-default-value="blades-gel">
				<a href="paso1.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad'];?>">
				<div class="header">
					<h2>
						<span class="num">1.</span>
							<?php							
								if($reg['color_de_rosas']=="Rosas Rojas"){
											$valor_rosas = 2300;							
										}else if ($reg['color_de_rosas']=="Rosas Rosadas"){
											$valor_rosas= 2200;		
										}else if ($reg['color_de_rosas']=="Rosas Amarillas"){
											$valor_rosas= 2100;
										}else if ($reg['color_de_rosas']=="Rosas Blancas"){
											$valor_rosas= 2000;
										}else if ($reg['color_de_rosas']=="Rosas Combinadas"){
											$valor_rosas= 2500;
										}else {
											$valor_rosas= 2050;
										}
							?>
						<span class="incomplete-headline active">
							<?php echo chao_tilde('Usted Eligió')?>  <?php echo $reg['color_de_rosas'] ?> por un Valor de $<?php echo $valor_rosas?> / Unidad			
						</span>						
						<span class="complete-headline">
							You chose <em data-name="title"></em>.
						</span>
					</h2>
				</div>
				</a>
			</section>
			<section class="bundle-section complete closed" data-section="Input" data-name="bundle" data-default-value="blades-gel">
				<a href="paso2.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad'];?>">
				<div class="header">
					<h2>
						<span class="num">2.</span>
							<?php							
								if($reg['unidades_de_rosas']=="12 Unidades"){
											$valor_unidades_rosas = $valor_rosas*12;							
										}else if ($reg['unidades_de_rosas']=="18 Unidades"){
											$valor_unidades_rosas = $valor_rosas*18;		
										}else {
											$valor_unidades_rosas = $valor_rosas*24;	
										}
							?>
						<span class="incomplete-headline active">
							<?php echo chao_tilde('Usted Eligió')?>   <?php echo $reg['unidades_de_rosas'] ?> de <?php echo $reg['color_de_rosas'] ?> por un Valor Total de $<?php echo $valor_unidades_rosas?>			
						</span>						
						<span class="complete-headline">
							You chose <em data-name="title"></em>.
						</span>
					</h2>
				</div>
				</a>
			</section> 	
			<section class="bundle-section complete closed" data-section="Input" data-name="bundle" data-default-value="blades-gel">
				<a href="paso3.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad'];?>">
				<div class="header">
					<h2>
						<span class="num">3.</span>
							<?php							
								if($reg['frecuencia_de_entrega']=="2 Veces * Semana"){
											$descuento=25;
											$num_entregas=96;
										}else if ($reg['frecuencia_de_entrega']=="1 Vez * Semana"){
											$descuento=25;	
											$num_entregas=48;
										}else if ($reg['frecuencia_de_entrega']=="Cada 2 Semanas"){
											$descuento=25;
											$num_entregas=24;
										}else if ($reg['frecuencia_de_entrega']=="Cada 3 Semanas"){
											$descuento=25;	
											$num_entregas=16;
										}else if ($reg['frecuencia_de_entrega']=="1 Vez * Mes"){
											$descuento=20;
											$num_entregas=12;
										}else if ($reg['frecuencia_de_entrega']=="Cada 2 Meses"){
											$descuento=20;
											$num_entregas=6;
										}else if ($reg['frecuencia_de_entrega']=="Cada 3 Meses"){
											$descuento=15;
											$num_entregas=4;
										}else if ($reg['frecuencia_de_entrega']=="Cada 4 Meses"){
											$descuento=15;
											$num_entregas=3;
										}else if ($reg['frecuencia_de_entrega']=="2 Veces * Ano"){
											$descuento=10;
											$num_entregas=2;
										}else {
											$descuento=10;	
											$num_entregas=1;
										}
								
								if($reg['numero_productos']=="1 Producto * Entrega"){
											$numero_productos=1;							
										}else if ($reg['numero_productos']=="2 Productos * Entrega"){
											$numero_productos=2;	
										}else if ($reg['numero_productos']=="3 Productos * Entrega"){
											$numero_productos=3;	
										}else if ($reg['numero_productos']=="4 Productos * Entrega"){
											$numero_productos=4;	
										}else if ($reg['numero_productos']=="5 Productos * Entrega"){
											$numero_productos=5;											
										}else {
											$numero_productos=6;		
										}
							?>
						<span class="incomplete-headline active">
							Usted Tiene un <?php echo $descuento ?>% de Descuento y Enviaremos <?php echo $numero_productos ?> Producto(s) * Entrega 	
						</span>						
						<span class="complete-headline">
							You chose <em data-name="title"></em>.
						</span>
					</h2>
				</div>
				</a>
			</section>
			<section class="handle-section " data-section="Input" data-name="handle" data-default-value="Total Orange">
				<div class="header">
					<h2>
						<span class="num">4.</span>
						<span class="incomplete-headline active">
							Datos del Suscriptor
						</span>
						<span class="complete-headline">
							Ingresa tus Datos<em data-name="value"></em>.
						</span>
					</h2>
				</div>
				<div class="content">
					<p class="intro">
						Ingresa tus Datos<br>						
					</p>		
					<form name="form" accept-charset="UTF-8" action="procesar_paso4.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad']; ?>" method="post" enctype="multipart/form-data">
						<div class="form address shipping grid" style="display: block">	
							<div class="col-1-1">
								<p class="h6 black-blue"><?php echo chao_tilde('Dirección de Entrega')?></p>
								<label for="shipping_name" class="for-ie">Name</label>
									<select class="month" id="billing_month" name="ciudad_de_entrega">
										<option value="Bogota">Bogota</option>
								<!--<option value="medellin">Medellín</option>-->
									</select>
							</div>	
							<div class="col-2-3 grid pad-r">	
								<div class="col-1-2 pad-r">
									<label for="billing_month" style="display: none;">Dia</label>
									<select class="month" id="billing_month" name="dir_1_entrega">
										<option value="Calle">Calle</option>
										<option value="Carrera">Carrera</option>
										<option value="Avenida">Avenida</option>
										<option value="Avenida Carrera">Avenida Carrera</option>
										<option value="Avenida Calle">Avenida Calle</option>
										<option value="Circular">Circular</option>
										<option value="Circunvalar">Circunvalar</option>
										<option value="Diagonal">Diagonal</option>
										<option value="Manzana">Manzana</option>
										<option value="Transversal">Transversal</option>
										<option value="Via">Vía</option>
									</select>
								</div>
								<div class="col-1-2 pad-l">
									<label for="shipping_name" class="for-ie"></label>
										<input id="shipping_name" type="text" placeholder="" name="dir_2_entrega" class="name" maxlength="100" value="">
										<div  class="error-msg" id="div_dir_2_entrega"></div>
								</div>
							</div>	
							<div class="col-1-3 pad-l">								
							   <label for="shipping_name" class="for-ie">Name</label>
								<input id="shipping_name" type="text" placeholder="#" name="dir_3_entrega" class="name" maxlength="100" value="">
								<div  class="error-msg" id="div_dir_3_entrega"></div>
							</div>
							<div class="col-2-3 grid pad-r">	
								<div class="col-1-2 pad-r">
									<label for="billing_month" style="display: none;">Dia</label>
									<select class="month" id="billing_month" name="dir_4_entrega">
										<option value="Apartamento">Apartamento</option>
										<option value="Oficina">Oficina</option>
										<option value="Casa">Casa</option>
										<option value="Otro">Otro</option>
									</select>
								</div>
								<div class="col-1-2 pad-l">
									<label for="shipping_name" class="for-ie"></label>
										<input id="shipping_name" type="text" placeholder="#" name="dir_5_entrega" class="name" maxlength="100" value="">
										<div  class="error-msg" id="div_dir_5_entrega"></div>
								</div>
							</div>							
							<div class="col-1-2 pad-r">
								<label for="shipping_state" class="for-ie">State</label>
								<input id="shipping_address_line_1" type="text" placeholder="Barrio" name="barrio" class="address_line_1" maxlength="30" value="">
								<div  class="error-msg" id="div_barrio"></div>
							</div>
							<div class="col-1-1">
								<label for="shipping_name" class="for-ie">Name</label>
								<textarea id="shipping_name" type="text" placeholder="<?php echo chao_tilde('Información de Adicional de Ayuda Para el Envío. P.Ej: Cerca a Exito, Diagonal a Colsubsidio, etc.')?>" name="ayuda_envio" class="name" maxlength="100" value=""></textarea>
								<div  class="error-msg" id="div_ayuda_envio"></div>
							</div>
							<div class="col-1-1">
								<p class="h6 black-blue"><?php echo chao_tilde('Envío y Recepción')?></p>
								<label for="shipping_name" class="for-ie">Name</label>
								<input id="shipping_name" type="text" placeholder="Nombre de Quien Recibe" name="nombre_de_quien_recibe" class="address_line_1" maxlength="100" value="">
								<div  class="error-msg" id="div_nombre_de_quien_recibe"></div>
							</div>
							<div class="col-1-1">
								<label for="shipping_address_line_2" class="for-ie">Address Line 2</label>
								<input id="shipping_address_line_2" type="text" placeholder="Telefono de Quien Recibe" name="telefono_de_quien_recibe" class="address_line_2" maxlength="255" value="">
								<div  class="error-msg" id="div_telefono_de_quien_recibe"></div>
							</div>							
						</div>
						<div class="shipping-options" data-default="4">
							<div class="updating" style="display: none;">Updating ...</div>								
								<div class="shipping_class " style="display: block;" id="sc_US_economy-free_wrapper">									
									<input type="radio" id="sc_US_economy-free" name="shipping_class" value="4" checked="">
									<label for="sc_US_economy-free" class="radio"></label>
									<label for="sc_US_economy-free" class="text">
										<a href="../../terminos-del-servicio">
											<span class="h6 method-name">Acepto Terminos y Condiciones</span>
											<span class="h6 method-cost" style="font-style: italic;">Ver</span>
										</a>
									</label>									
								</div>								
						</div>
						<?php
							$sin_descuento=$valor_unidades_rosas*$num_entregas*$numero_productos;
							$porcentaje=$descuento/100;
							$valor_descuento=$porcentaje*$sin_descuento;
							$valor_descuento2=$sin_descuento-$valor_descuento;
							$total=$valor_descuento2;
						?>
						
						
						  <br><br>
						  <!--<input type="submit" class="button blue medium bottom" value="Continuar">-->
						  <!--<input type="button" class="submit" value="Continuar" onClick="validar()">-->
						<center>
							<input type="button" class="button blue medium bottom" value="Continuar" onClick="validar()">
						</center>
						<input type="hidden" name="estado_pedido" value="<?php echo $reg["estado_pedido"]; ?>"/>
						<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>	
						<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
						<input type="hidden" name="color_de_rosas" value="<?php echo $reg["color_de_rosas"]; ?>"/>
						<input type="hidden" name="unidades_de_rosas" value="<?php echo $reg["unidades_de_rosas"]; ?>"/>
						<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>
						<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
						<input type="hidden" name="dia_de_inicio" value="<?php echo $reg["dia_de_inicio"]; ?>"/>
						<input type="hidden" name="mes_de_inicio" value="<?php echo $reg["mes_de_inicio"]; ?>"/>
						<input type="hidden" name="ano_de_inicio" value="<?php echo $reg["ano_de_inicio"]; ?>"/>
						<input type="hidden" name="frecuencia_de_entrega" value="<?php echo $reg["frecuencia_de_entrega"]; ?>"/>
						<input type="hidden" name="descuento" value="<?php echo $reg["descuento"]; ?>"/>
						<input type="hidden" name="numero_productos" value="<?php echo $reg["numero_productos"]; ?>"/>
						<input type="hidden" name="total" value="<?php echo $total ?>"/>	
						<input type="hidden" name="id_usuario" value="<?php echo $_GET["id_usuario"];?>"/>
						<input type="hidden" name="id_pedidos_plan_continuidad" value="<?php echo $_GET["id_pedidos_plan_continuidad"];?>"/>
					</form>
				</div>
			</section>
			<section class="review-section closed" data-section="Review" data-name="review">
				<div class="header">
					<h2>
						<span class="num">5.</span>
						<span class="headline">Carrito de Compras y Pagar</span>
					</h2>
				</div>
			</section>
			<?php
				}
			?>
		</main>
        <div class='push'></div>
    </div>
   <?php require_once("../../instancias/footer3.php"); ?>	
</body>
</html>
