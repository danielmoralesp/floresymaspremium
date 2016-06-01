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
    <title>Paso 3 | FloresyMaa Premium</title>
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	<?php 
	$id_pedidos_plan_continuidad =$_GET["id_pedidos_plan_continuidad"];	
	?>   
   <!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "paso3-m.php?id_pedidos_plan_continuidad=<?php echo $id_pedidos_plan_continuidad?>";
		}
	  //-->
	</script>

    <script src="../../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/auto-refill-build/base-52c03334d5621da5001fbbee9080cedf.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="../../assets/desktop/checkout/base-ec3b26d4c38ea303cded78672d365221.css" media="screen" rel="stylesheet" type="text/css" />

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
							<?php echo chao_tilde('Usted Eligió')?> <?php echo $reg['unidades_de_rosas'] ?> de <?php echo $reg['color_de_rosas'] ?> por un Valor Total de $<?php echo $valor_unidades_rosas?>			
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
						<span class="num">3.</span>
						<span class="incomplete-headline active">
							Calendario de Entregas
						</span>
						<span class="complete-headline">
							And, a free razor handle in <em data-name="value"></em>.
						</span>
					</h2>
				</div>
				<div class="content">
					<p class="intro">
						Elige el calendario de entregas de los productos.<br>						
					</p>		
					<form name="form" accept-charset="UTF-8" action="procesar_paso3.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad']; ?>" method="post" enctype="multipart/form-data">
						<div class="form address shipping grid" style="display: block">	
							<div class="col-2-3 grid pad-r">
								<p class="h6 black-blue col-1-1"><?php echo chao_tilde('Cuando Quiere que empiecen los envios?')?></p><br><br>
								<p class="h6  col-1-1"><?php echo chao_tilde('Fecha de Entrega (Dia-Mes-Año)')?></p>
									<div class="col-1-2 pad-r">
										<label for="billing_month" style="display: none;">Dia</label>
										<select class="month" id="billing_month" name="dia_de_inicio">
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
									<div class="col-1-2 pad-l">
										<label for="billing_year" style="display: none;">Mes</label>
										<select class="year" id="billing_year" name="mes_de_inicio">
										<option  selected="selected" value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										</select>
									</div>
							</div>	
							<div class="col-1-3 pad-l">
								<p class="h6 black-blue" style="color:white">Fecha de Entrega</p><br>
								<p class="h6 black-blue" style="color:white">Fecha de Entrega</p>
								<label for="billing_year" style="display: none;"><?php echo chao_tilde('Año')?></label>
									<select class="year" id="billing_year" name="ano_de_inicio">
										<option selected="selected" value="2015">2015</option>
									</select>
							</div>
							<div class="col-1-1">
								<p class="h6 black-blue"><?php echo chao_tilde('¿Con Que Frecuencia Quiere que Entreguemos?')?></p><br>
								<label for="shipping_name" class="for-ie">Name</label>
									 <select class="month" id="billing_month" name="frecuencia_de_entrega">
										<option value="2 Veces * Semana">2 Veces * Semana = 25% de Descuento</option>
										<option value="1 Vez * Semana">1 Vez * Semana = 25% de Descuento</option>
										<option value="Cada 2 Semanas">Cada 2 Semanas = 25% de Descuento</option>
										<option value="Cada 3 Semanas">Cada 3 Semanas = 25% de Descuento</option>
										<option value="1 Vez * Mes">1 Vez * Mes = 20% de Descuento</option>
										<option value="Cada 2 Meses">Cada 2 Meses = 20% de Descuento</option>
										<option value="Cada 3 Meses">Cada 3 Meses = 15% de Descuento</option>
										<option value="Cada 4 Meses">Cada 4 Meses = 15% de Descuento</option>
										<option value="2 Veces * Ano">2 Veces * Año = 10% de Descuento</option>
										<option value="1 Vez * Ano">1 Vez * Año = 10% de Descuento</option>								
									<!--<option value="medellin">Medellín</option>-->
									</select>
							</div>			
							<div class="col-1-1">
								<p class="h6 black-blue"><?php echo chao_tilde('¿Mas de 1 Producto * Entrega?')?></p><br>
								<label for="shipping_name" class="for-ie">Name</label>
								 <select class="month" id="billing_month" name="numero_productos">
									<option value="1 Producto * Entrega">1 Producto * Entrega</option>
									<option value="2 Productos * Entrega">2 Productos * Entrega</option>
									<option value="3 Productos * Entrega">3 Productos * Entrega</option>
									<option value="4 Productos * Entrega">4 Productos * Entrega</option>
									<option value="5 Productos * Entrega">5 Productos * Entrega</option>
									<option value="6 Productos * Entrega">6 Productos * Entrega</option>					
								<!--<option value="medellin">Medellín</option>-->
								</select>
							</div>
						</div>
						  <br><br>
						  <!--<input type="submit" class="button blue medium bottom" value="Continuar">-->
						  <!--<input type="button" class="submit" value="Continuar" onClick="validar()">-->
						<center>
							<input type="submit" class="button blue medium bottom" value="Continuar">
						</center>
						<input type="hidden" name="estado_pedido" value="<?php echo $reg["estado_pedido"]; ?>"/>
						<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>	
						<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
						<input type="hidden" name="color_de_rosas" value="<?php echo $reg["color_de_rosas"]; ?>"/>
						<input type="hidden" name="unidades_de_rosas" value="<?php echo $reg["unidades_de_rosas"]; ?>"/>
						<input type="hidden" name="descuento" value="0"/>
						<input type="hidden" name="id_pedidos_plan_continuidad" value="<?php echo $_GET["id_pedidos_plan_continuidad"];?>"/>
					</form>
				</div>
			</section>
			<section class="handle-section closed" data-section="Input" data-name="handle" data-default-value="Total Orange">
				<div class="header">
					<h2>
						<span class="num">4.</span>
						<span class="incomplete-headline active">
							Datos del Suscriptor
						</span>
						<span class="complete-headline">
							And, a free razor handle in <em data-name="value"></em>.
						</span>
					</h2>
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
</html