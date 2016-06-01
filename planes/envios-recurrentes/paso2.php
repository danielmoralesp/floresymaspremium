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
    <title>Paso 2 | FloresyMaa Premium</title>
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
		window.location = "paso2-m.php?id_pedidos_plan_continuidad=<?php echo $id_pedidos_plan_continuidad?>";
		}
	  //-->
	</script>

    <script src="../../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/auto-refill-build/base-52c03334d5621da5001fbbee9080cedf.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../../assets/validacion/validar-paso2-recurrente.js"></script>

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
			<form name="form" class="form-horizontal" id="sample-form" method="post" action="procesar_paso2.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad']; ?>" >
			<section class="timing-section active" data-section="Input" data-name="timing" data-default-value="90">
				<div class="header">
					<h2>
						<span class="num">2.</span>
						<span class="incomplete-headline active">
							Numero de Unidades
						</span>
						<span class="complete-headline">
							Great! You shave <em data-name="shaves"></em>, we'll send your shave supplies every <em data-name="interval"></em> <em>months</em>.
						</span>
					</h2>
				</div>
				<div class="content">
				<p class="intro">
					Elija el Numero de Unidades que desea
				</p>
					<ul class="options">
						<li class="option " data-value="60">
							<div class="action">
								<h3>12 Unidades<br> x Caja</h3><br>
								<!-- option-->
								<div class="soft-product-selector" data-modifier="soft-product">
									<div class="option">
										<input id="The Truman primera" name="unidades_de_rosas" type="radio" value="12 Unidades">
										<label for="The Truman primera" class="radio"></label>
										<label for="The Truman primera" class="text">
											<strong></strong>
											<span></span>
										</label>
									</div>
								</div>								
								<!-- option-->
							</div>										
						</li>
						<li class="option " data-value="90">
							<div class="action">
								<h3>18 Unidades<br> x Caja</h3><br>								<!-- option-->
								<div class="soft-product-selector" data-modifier="soft-product">
									<div class="option">
										<input id="The Truman segunda" name="unidades_de_rosas" type="radio" value="18 Unidades" >
										<label for="The Truman segunda" class="radio"></label>
										<label for="The Truman segunda" class="text">
											<strong></strong>
											<span></span>
										</label>
									</div>
								</div>								
								<!-- option-->
							</div>
						</li>
						<li class="option " data-value="150">
							<div class="action">								
								<h3>24 Unidades<br> x Caja</h3><br>
								<!-- option-->
								<div class="soft-product-selector" data-modifier="soft-product">
									<div class="option">
										<input id="The Truman tercera" name="unidades_de_rosas" type="radio" value="24 Unidades">
										<label for="The Truman tercera" class="radio"></label>
										<label for="The Truman tercera" class="text">
											<strong></strong>
											<span></span>
										</label>
									</div>
								</div>								
								<!-- option-->
							</div>
						</li><br><br><br>				
					</ul>
					<center>
						<div class="error-msg" id="div_unidades_de_rosas"></div><br>
						<input type="button" class="button blue medium bottom" value="Continuar" onClick="validar()">
					</center>
					<input type="hidden" name="estado_pedido" value="<?php echo $reg["estado_pedido"]; ?>"/>
					<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>	
					<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
					<input type="hidden" name="color_de_rosas" value="<?php echo $reg["color_de_rosas"]; ?>"/>
					 <input type="hidden" name="id_pedidos_plan_continuidad" value="<?php echo $_GET["id_pedidos_plan_continuidad"];?>"/>
				</div>
			</section>
			</form>
			<section class="timing-section closed" data-section="Input" data-name="timing" data-default-value="90">
				<div class="header">
					<h2>
						<span class="num">3.</span>
						<span class="incomplete-headline active">
							<?php echo chao_tilde('Seleccionar Calendario de Envíos')?>
						</span>
						<span class="complete-headline">
							Great! You shave <em data-name="shaves"></em>, we'll send your shave supplies every <em data-name="interval"></em> <em>months</em>.
						</span>
					</h2>
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
</html>
