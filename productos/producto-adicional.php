﻿<?php
	require_once("../conexion.php");
	$id_producto = $_GET["id_producto"];
	$sql="select * from producto where id_producto='".$_GET["id_producto"]."'	"; 
	$res = mysql_query($sql,$con);
	if($reg = mysql_fetch_array($res)){
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title><?php echo $reg["tipo_de_producto"]; ?> - $<?php echo $reg["precio_del_producto"]; ?>  | FloresyMas.co</title>
		<meta content="" name="description" />
		<meta content="" name="keywords" />
		<meta content="" property="og:title" />
		<meta content="" property="og:url" />
		<meta content="" property="og:image" />
		<meta content="" property="og:site_name" />
		<meta content="" property="twitter:card" />
		<meta content="" property="twitter:site" />
		<meta content="" property="twitter:creator" />
		<meta content="" property="twitter:title" />
		<meta content="" property="twitter:description" />
		<meta content="" property="twitter:image" />
		<meta content="" property="twitter:data1" />
		<meta content="" property="twitter:label1" />
		<meta content="" property="twitter:data2" />
		<meta content="" property="twitter:label2" />
		<link href="" rel="canonical" />
		<meta name="viewport" content="width=1210">
		<meta content="" name="csrf-param" />
		<meta content="" name="csrf-token" />
		
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "";
		}
	  //-->
	</script>
	
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/product-page/base-831a2384d7f7e82971a4f884f0f20229.css" media="all" rel="stylesheet" type="text/css" />

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
		<?php require_once("../instancias/header2.php"); ?>
		<div class="grid" itemscope itemtype="">
			<div class="grid col-1-1 hero" data-modifiers="soft_product_type;color">
				<div class="col-2-3 rel hero-wrap">
					<div class="product-hero gallery active" data-current-hero="true" data-hero-type="gallery" data-hero-id="131">
						<ul class="frame">
							<li class="large-image active" data-id="0">
								<?php
									$id_fotos_adicionales= $_GET["id_fotos_adicionales"];
									$sql5="select * from fotos_adicionales where id_producto='$id_producto' and id_fotos_adicionales='$id_fotos_adicionales'"; 
									$res5 = mysql_query($sql5,$con);
									if($reg5 = mysql_fetch_array($res5)){										
								?>
								<img alt="" data-preload="131" data-src="../panel/catalogo/img/adicionales/grande/<?php echo $reg5["foto_adicional_1"]; ?>" itemprop="image" src="../panel/catalogo/img/adicionales/grande/<?php echo $reg5["foto_adicional_1"]; ?>" />
								<?php
									}
								?>
							</li>
							<div class="thumbnails">
								<li class="thumbnail " data-id="1">
									<a href="producto.php?id_producto=<?php echo $id_producto?>">
										<img alt="" src="../panel/catalogo/img/thumbnail/<?php echo $reg["foto_grande"]; ?>" />
									</a>
								</li>
							</div>
						</ul>
					</div>
				</div>
				<div class="col-1-3 table">
					<div class="middle">
						<div class="product form ">
							<h1 class="blue" itemprop="name"><?php echo $reg["nombre_del_producto"]; ?></h1>
							<p itemprop="offers" itemscope itemtype="">
								<span class="price" itemprop="price">$<?php echo number_format($reg["precio_del_producto"]); ?> </span>
									<small class="price-text"></small>
							</p>
							<p class="museo availability">
									- ¿Disponible para Entrega en 90 Minutos? <?php echo $reg["menos_de_90_min"]; ?><br>
								<span class="all" style="display: block;">
									- Envio Gratis Dentro del Perímetro <a href="">(Ver Perímetros)</a>
								</span>
								<span class="all" style="display: block;">
									- Este Producto Incluye: <?php echo $reg["unidades_de_rosas"]; ?> Unidades de Rosas / De Color <?php echo $reg["colores_de_rosas"]; ?>
								</span>
							</p>
							<section class="modifiers one-time " data-product-ids="131,129,132,130,8,5,6,7">
								<input type="hidden" value="131" class="id">
									<div class="color-picker clear" data-modifier="color">
										<label class="text float-left">
											Color
											<span class="color-name"></span>
										</label>
											<div class="float-right colors">
													<div class="color">
														<?php				
															$sql2="select * from producto where producto_padre='no' and en_inventario='si' and tipo_de_producto='".$reg["tipo_de_producto"]."'"; 
															$res2 = mysql_query($sql2,$con);
															while($reg2 = mysql_fetch_array($res2)){
														?>
														<a href="producto.php?id_producto=<?php echo $reg2["id_producto"];?>">
															<label><img src="../panel/img/colores/<?php echo $reg2["colores_de_rosas"]; ?>.png" height="20px" width="60px" / ></label>
														</a>
														<?php			
															}														
														?>
													</div>	
											</div>
									</div>
									<div class="pack-picker clear" data-modifier="pack-size">
										<label class="text float-left">Unidades de Rosas</label>
											<div class="float-right packs">
													<div class="pack">
														<?php				
															$sql3="select * from producto where producto_padre='no' and en_inventario='si' and tipo_de_producto='".$reg["tipo_de_producto"]."'"; 
															$res3 = mysql_query($sql3,$con);
															if($reg3 = mysql_fetch_array($res3)){
														?>													
														<a href="producto.php?id_producto=<?php echo $reg3["id_producto"];?>">															
															<label for="8">
																<?php echo $reg3["unidades_de_rosas"]; ?>
															</label>
														</a>
														<?php			
															}														
														?>
													</div>
											</div>
									</div>
							</section>
							<form action="../carrito" method="post">
								<div class="add-to-cart">  
									<div class="buttons">
										<button class="orange medium full add-to-cart" style="display: display;">Añadir al Carrito</button>
										<button class="blue medium full sold-out add-to-waitlist" style="display: none;">Add to Waitlist</button>
									</div>
									<input type="hidden" name="id_producto" value="<?php echo $reg["id_producto"]; ?>"/>
									<input type="hidden" name="foto_thumbnail" value="<?php echo $reg["foto_thumbnail"]; ?>"/>
									<input type="hidden" name="descripcion_del_producto" value="<?php echo $reg["descripcion_del_producto"]; ?>"/>
									<input type="hidden" name="nombre_del_producto" value="<?php echo $reg["nombre_del_producto"]; ?>"/>
									<input type="hidden" name="precio_del_producto" value="<?php echo $reg["precio_del_producto"]; ?>"/>
									<input type="hidden" name="colores_de_rosas" value="<?php echo $reg["colores_de_rosas"]; ?>"/>
									<input type="hidden" name="unidades_de_rosas" value="<?php echo $reg["unidades_de_rosas"]; ?>"/>
									<input type="hidden" name="tamano_del_producto" value="<?php echo $reg["tamano_del_producto"]; ?>"/>
									<input type="hidden" name="cantidad" value="1"/>
								</div>			
							</form>
						</div>
					</div>
				</div>
			</div>
        <div class="col-1-1 product-description" data-id="131" style="display: block">
			<div class="grid">
				<div class="col-1-3">
					<h4>Incluye</h4>
					<p>
								1 Caja de <?php echo $reg["tamano_del_producto"]; ?><br>
								<?php echo $reg["unidades_de_rosas"]; ?> Rosas <?php echo $reg["colores_de_rosas"]; ?><br>
					</p>
				</div>
				<div class="col-1-3">
					<h4>Descripción</h4>
					<p><?php echo $reg["descripcion_del_producto"]; ?></p>
				</div>
				<div class="col-1-3">
					<h4>Información sobre el envío</h4>
					<p>
						¿Para Entrega en 90 Minutos? <?php echo $reg["menos_de_90_min"]; ?><br>
						Envio Gratis Dentro del Perímetro <a href="">(Ver Perímetros)</a>
					</p>
				</div>
			</div>
		</div>
		<!--<section class="module headline classic">
			<div class="grid">
				<div class="col-1-1">
						<h2>Three things really matter with razor blades:<br> sharpness, flexibility, and comfort. Our blades deliver all three.</h2>
				</div>
			</div>
		</section>
        <section class="module half-image-half-text classic">
			<div class="grid" data-text-position="left">
				<div class="col-1-2 text">
					<div class="table">
						<div class="middle">
							<h2>Precision-Angled Blades</h2>
							<p>The magic of a great blade is strength at the base and sharpness at the tip. We grind steel into a specialized “Gothic Arch” angle to deliver just that. Our razor cartridge has 5 precision-angled blades to spread pressure evenly across your face for maximum ease and comfort.</p>
						</div>
					</div>
				</div>
				<div class="col-1-2 image desktop" style="background-image: url(../assets/auto-refill/contiabajo.png);"></div>
				<div class="col-1-2 image mobile" style="background-image: url(../assets/images/products/module/3402140ae4deed8c8c3917d070279dcf69a31df3.jpg);"></div>
			</div>
		</section>
        <section class="module half-image-half-text new-twist">
			<div class="grid" data-text-position="right">
				<div class="col-1-2 text">
					<div class="table">
						<div class="middle">
							<h2>Ergonomic Handle Design</h2>
							<p>The Truman handle was designed for comfort and control. The handle has a weighted core for substance, and the molded exterior provides an ergonomic grip. It may be the best-looking thing in your bathroom. (Other than you.)</p>
						</div>
					</div>
				</div>
				<div class="col-1-2 image desktop" style="background-image: url(../assets/auto-refill/contiabajo.png);"></div>
				<div class="col-1-2 image mobile" style="background-image: url(../assets/images/products/module/e9863de8ac990a47ba79ca3052f4c222990d06db.jpg);"></div>
			</div>
		</section>
        <section class="module full-image-half-text marble-and-iron">
			<div class="grid" data-text-position="left" style="background-image: url(../assets/auto-refill/continuidad.png);">
				<div class="col-1-2 text">
					<div class="table">
						<div class="middle">
							<h2>Hydrating Foaming Gel</h2>
							<p>Our foaming Rosese gel lathers up to help your razor glide smoothly over your skin. And unlike many other foams, it&#x27;s packed with natural ingredients that soothe irritation and hydrate your face. Say goodbye to dry.</p>
							<a href=""></a>
						</div>
					</div>
				</div>
				<div class="col-1-2 image desktop"></div>
				<div class="col-1-2 image mobile" style="background-image: url(../assets/images/products/module/233fb1d2178bb6bb6636b1043f18987e7c2da357.jpg);"></div>
			</div>
		</section>-->
        <!--<section class="module full-image-half-text whiteout">
			<div class="grid" data-text-position="right" style="background-image: url(../assets/images/products/module/f5efa4b88a060379b8520d734df5770268ba91a9.jpg);">
				<div class="col-1-2 text">
					<div class="table">
						<div class="middle">
							<h2>Moisturizing Shave Cream</h2>
							<p>Our cream is formulated with natural ingredients to deliver effortless glide during your shave. Your skin is soothed by licorice and cucumber, moisturized by marula and coconut oils, and refreshed by eucalyptus and peppermint.</p>
							<a href=""></a>
						</div>
					</div>
				</div>
				<div class="col-1-2 image desktop"></div>
				<div class="col-1-2 image mobile" style="background-image: url(../assets/images/products/module/67294ad39cdc2888149fc1d586ac08b532c1ef7a.jpg);"></div>
			</div>
		</section>   -->     
		<div id="waitlist_popup" style="visibility: hidden; opacity: 0;" class="popup table" data-sku="131"></div>
		</div>
        <div id='back_to_top'></div>
        <div class='push'></div>
    </div>
	<?php require_once("../instancias/footer2.php"); ?>
	<?php
		}			
	?>

    <script src="../assets/desktop/global/init-5b2cab29e45b31055652fe8cae9e2e4d.js" type="text/javascript"></script>    
    <script src="../assets/shared/product_page/init-0d9eed58fe258e4efeee02c078d851bd.js" type="text/javascript"></script>
    <script src="../assets/desktop/product_page/init-c731820003b93b37e6adb42e37024d4e.js" type="text/javascript"></script>
	
	
</body>
</html>
