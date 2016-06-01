<?php	
	require_once("conexion.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title></title>
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<link href="" rel="canonical" />
    <meta name="viewport" content="width=1210">
    <meta content="" name="" />
	<meta content="" name="" />
	
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "entrega-en-90-minutos-m";
		}
	  //-->
	</script>

    <script src="assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/desktop/homepage/base-bfb5136524ac657eec7868c4ac6ed618.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="assets/desktop/auto-refill/base-99482b06d8df3d7b1f16066fd86bbb63.css" media="screen" rel="stylesheet" type="text/css" />

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
    <?php require_once("instancias/header.php"); ?><br><br>
	<div class='homepage' id="home_page">
		<div class="featured-products">
			<h3 class="">Entrega Inmediata</h2><br>
				<h4 class="">Estos son los productos para entrega en 90 Minutos para Bogotá de Flor Exportación</h4>
					<section class="grid">
						<?php				
							$sql = "select * from producto where menos_de_90_min='si' and en_inventario='si' and producto_padre='si' order by orden_importancia asc";					
							$res = mysql_query($sql,$con);
							while($reg = mysql_fetch_array($res)){
						?>  
						<div class="featured-product">							
							<a href="productos/producto.php?id_producto=<?php echo $reg["id_producto"];?>" class="product color-picker" data-impressionable data-clicktrackable data-id="131" data-position="100" data-list="Featured Products">
								<img alt="" class="product-shot" src="panel/catalogo/img/thumbnail/<?php echo $reg["foto_grande"]; ?>" />
									<div class='colors'>
											<?php				
												$sql2="select * from producto where producto_padre='no' and menos_de_90_min='si' and en_inventario='si' and tipo_de_producto='".$reg["tipo_de_producto"]."'"; 
												$res2 = mysql_query($sql2,$con);
												while($reg2 = mysql_fetch_array($res2)){
											?>
											<a href="productos/producto.php?id_producto=<?php echo $reg2["id_producto"];?>">
												<img src="panel/img/colores/<?php echo $reg2["colores_de_rosas"]; ?>.png" height="30px" width="30px" />
											</a>
											<?php			
												}														
											?>	
									</div>
									<h3 class="blue"><?php echo $reg["tipo_de_producto"]; ?></h3>
									<?php
										$precio_sin_puntos = $reg['precio_del_producto'];
										$precio= number_format($precio_sin_puntos);									
									?>
									<p class="price">$<?php echo $precio; ?></p><br>
									<p>Iva y Envío Incluido</p>
									<p>* Dentro del perimetro</p>
							</a>
						</div>
						<?php			
							}														
						?>	
					</section>
		</div>
		<div id="auto_refill">
			<section class="module how-it-works">
				<h2 class="title">Solo 3 Pasos</h2>
				<ul class="steps">
						<li class="step">
							<span class="number">1</span>
							<p class="head">Elige el Producto</p>
							<p class="body">Productos para entregar <br>en 90 minutos.</p><br><br>							
						</li>
						<li class="step">
							<span class="number">2</span>
							<p class="head">Realiza la Compra</p>
							<p class="body">Escoge uno de los medios,<br> de pago habilitados</p><br><br>							
						</li>
						<li class="step">
							<span class="number">3</span>
							<p class="head">Recibe en 90 Minutos</p>
							<p class="body">Hacemos la entrega en <br> 90 minutos. Esperalo!</p><br><br>							
						</li>
				</ul>
				<a href="nosotros/index" class="button medium pale-blue">Nosotros</a>
			</section>
			<section class="module product-features grid" data-product-features>
				<div class="image col-1-2">
						<img src="https://lh3.googleusercontent.com/aTDrMIm1aIxIPHBRb-j-SIvKuqy1M1sFHBphnTB03_k=w1500-h600-no" data-product-image="" class="active">
						<!--<img src="assets/auto-refill/shaving-gel-814ed91169470d5d1bd4463f91140ec0.jpg" data-product-image="Rosesing Gel" class="">
						<img src="assets/auto-refill/after-shave-ed90dc73c4553814aa4ba75b4dd9eb4d.jpg" data-product-image="After Rosese" class="">-->
				</div>
				<div class="text col-1-2">
					<h2 class="title">Productos especialmente diseñados<br class='mobile'> para satisfacerlo en calidad y cumplimiento</h2>
					<div class="product-links">
							<span data-product-action="Harry&#x27;s Blades" class="product-link active">
								Ventajas
							</span>
							<!--|
							<span data-product-action="Rosesing Gel" class="product-link ">
								Rosesing Gel
							</span>
							|
							<span data-product-action="After Rosese" class="product-link ">
								After Rosese
							</span>	-->						
					</div>
						<ul data-product-feature-list="Harry&#x27;s Blades" class="features active">
								<li class="feature">Rosas 100% de Exportación</li>
								<li class="feature">Cumplimiento en las entregas</li>
								<li class="feature">Productos y Empaques de alta calidad</li>
						</ul>
						<!--<ul data-product-feature-list="Rosesing Gel" class="features ">
								<li class="feature">Rich gel that lathers into foam</li>
								<li class="feature">12 natural ingredients that calm and soothe</li>
								<li class="feature">Hydrates and protects during and after Rosese</li>
						</ul>
						<ul data-product-feature-list="After Rosese" class="features ">
								<li class="feature">Light lotion that absorbs quickly, no oily residue</li>
								<li class="feature">12 natural ingredients, ideal for sensitive skin</li>
								<li class="feature">Refreshes, hydrates, and protects</li>
						</ul>-->
						<a href="terminos-del-servicio" class="button medium pale-blue">Terminos</a>
				</div>
			</section>
		</div>
		<div class="more">
			<div class="container">
				<h2 class="blue">Más sobre Nosotros</h2>
				<h4 class="blue">Hacemos más que un arreglo de flores. Entregamos Diseño y Calidad</h4>
				<section class="grid">						
						<a href="nosotros" class="col-1-3">
							<div class="img-frame">
								<div class="hover">
									<span class="button">Ver Tracking</span>
								</div>
								<img alt="" src="https://lh3.googleusercontent.com/b04U_LsklMgc32EjdcZgR2k6PFu5OCsaXpUB85hCInw=s350-no" />
							</div>
							<h3 class="blue">Tracking de Pedidos</h3>
							<p>Nuestra plataforma le mantedra informado sobre cuando se elabora, se despacha y se entrega su pedido</p>
						</a>
						<a href="nosotros" class="col-1-3">
							<div class="img-frame">
								<div class="hover">
									<span class="button">Ver Cultivo</span>
								</div>
								<img alt="" src="https://lh3.googleusercontent.com/n8h29Iq7hfVP_8jPMgIGhUSWLgu6PTKS0weVU-N96Ds=s350-no" />
							</div>
							<h3 class="blue">Cultivo de Rosas Exportación</h3>
							<p>Todos los productos se elaboran con rosas exportación, asi garantizamos la duración de la flor. </p>
						</a>
						<a href="nosotros" class="col-1-3">
							<div class="img-frame">
								<div class="hover">
									<span class="button">Ver Planes</span>
								</div>
								<img alt="" src="https://lh3.googleusercontent.com/6jEyWb0jNC8KdbxGpDCfd2qA-_x4nVYMwGjzTjyyc-s=s350-no" />
							</div>
							<h3 class="blue">Planes de Continuidad</h3>
							<p>Sabemos que usted querrá continuar cuando experimente nuestra calidad y duración. </p>
						</a>
				</section>
			</div>
		</div>
		<div class="featured-products">
			<div class="">							
				<a href="http://www.eltiempo.com/economia/sectores/fondos-privados-listos-a-invertir-126-billones-en-colombia/15864275" target="_blank">
					<img alt="" src="assets/homepage/press/eltiempo.png" />
				</a>
				<a href="http://thenextweb.com/insider/2014/09/01/august-latin-america-tech-news-shouldnt-miss-past-month/" target="_blank">
					<img alt=""  src="assets/homepage/press/portafolio.png" />
				</a>
				<a href="http://pulsosocial.com/2014/07/30/velum-el-esperado-fondo-vc-de-medellin-anuncia-sus-tres-primeras-inversiones/" target="_blank">
					<img alt="" src="assets/homepage/press/pulsosocial.png" />
				</a>
			</div>
		</div>
	</div>	
	<div class='push'></div>	
    </div>
	<?php require_once("instancias/footer.php"); ?>
    <script src="assets/desktop/global/init-f4172392de5a94d426c0cff014321f77.js" type="text/javascript"></script>    
    <script src="assets/desktop/homepage/init-85c6a2b3c08f7578d793a3f205bfc7bc.js" type="text/javascript"></script>
	<script src="assets/shared/auto_refill/init-6df665417b2982027d7c13f5501f988b.js" type="text/javascript"></script>
</body>
</html>
