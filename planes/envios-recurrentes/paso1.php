<?php
	require_once("../../conexion.php");
	$sql="select * from pedidos_plan_continuidad";
	$res = mysql_query($sql,$con);
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title>Paso 1 | FloresyMaa Premium</title>
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />    
	
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "paso1-m";
		}
	  //-->
	</script>

    <script src="../../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../../assets/desktop/auto-refill-build/base-52c03334d5621da5001fbbee9080cedf.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../../assets/validacion/validar-paso1-recurrente.js"></script>

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
			<form name="form" class="form-horizontal" id="sample-form" method="post" action="procesar_paso1.php?id_pedidos_plan.continuidad=<?php echo $reg['id_pedidos_plan_continuidad']; ?>" >	
				<section class="handle-section " data-section="Input" data-name="handle" data-default-value="Total Orange">
					<div class="header">
						<h2>
							<span class="num">1.</span>
							<span class="incomplete-headline active">
								Color de las Rosas
							</span>
							<span class="complete-headline">
								And, a free razor handle in <em data-name="value"></em>.
							</span>
						</h2>
					</div>
					<div class="content">
						<p class="intro">
							<?php echo chao_tilde('Todas nuestras rosas son de exportación, garantizamos la calidad y la duración. ')?>
						</p>
						<ul class="options">							
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/akito.png" width="110px" height="95px"/>
									<p class="title">
										Akito
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman primera" name="color_de_rosas" type="radio" value="akito" >
											<label for="The Truman primera" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/bikini.png" width="110px" height="95px"/>
									<p class="title">
										Bikini
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman segunda" name="color_de_rosas" type="radio" value="bikini" >
											<label for="The Truman segunda" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/blush.png" width="110px" height="95px"/>
									<p class="title">
										Blush
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman tercera" name="color_de_rosas" type="radio" value="blush" >
											<label for="The Truman tercera" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/cherry-brandy.png" width="110px" height="95px"/>
									<p class="title">
										Cherry B.
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman cuarta" name="color_de_rosas" type="radio" value="cherry-brandy" >
											<label for="The Truman cuarta" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/circus.png" width="110px" height="95px"/>
									<p class="title">
										Circus
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman quinta" name="color_de_rosas" type="radio" value="circus" >
											<label for="The Truman quinta" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/cool-water.png" width="110px" height="95px"/>
									<p class="title">
										Cool Water
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman sexta" name="color_de_rosas" type="radio" value="cool-water" >
											<label for="The Truman sexta" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/deeppurple.png" width="110px" height="95px"/>
									<p class="title">
										Deep Purple
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman septima" name="color_de_rosas" type="radio" value="deeppurple" >
											<label for="The Truman septima" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/dejavu.png" width="110px" height="95px"/>
									<p class="title">
										Dejavu
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman octava" name="color_de_rosas" type="radio" value="dejavu" >
											<label for="The Truman octava" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/engagement.png" width="110px" height="95px"/>
									<p class="title">
										Engagement
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman novena" name="color_de_rosas" type="radio" value="engagement" >
											<label for="The Truman novena" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/esperance.png" width="110px" height="95px"/>
									<p class="title">
										Esperance
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman decima" name="color_de_rosas" type="radio" value="esperance" >
											<label for="The Truman decima" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/fiesta.png" width="110px" height="95px"/>
									<p class="title">
										Fiesta
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman undecima" name="color_de_rosas" type="radio" value="fiesta" >
											<label for="The Truman undecima" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/freedom.png" width="110px" height="95px"/>
									<p class="title">
										Freedom
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman doceava" name="color_de_rosas" type="radio" value="freedom" >
											<label for="The Truman doceava" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/high-magic.png" width="110px" height="95px"/>
									<p class="title">
										High Magic
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman treceava" name="color_de_rosas" type="radio" value="high-magic" >
											<label for="The Truman treceava" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/hightinkel.png" width="110px" height="95px"/>
									<p class="title">
										HighTinkel
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman catorce" name="color_de_rosas" type="radio" value="hightinkel" >
											<label for="The Truman catorce" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/hotmerengue.png" width="110px" height="95px"/>
									<p class="title">
										Hot Mgue
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman quince" name="color_de_rosas" type="radio" value="hotmerengue" >
											<label for="The Truman quince" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/hot-paris.png" width="110px" height="95px"/>
									<p class="title">
										Hot Paris
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman diesciseis" name="color_de_rosas" type="radio" value="hot-paris" >
											<label for="The Truman diesciseis" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/iguana.png" width="110px" height="95px"/>
									<p class="title">
										Iguana
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman diesciciete" name="color_de_rosas" type="radio" value="iguana" >
											<label for="The Truman diesciciete" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/latina.png" width="110px" height="95px"/>
									<p class="title">
										Latina
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman diesciocho" name="color_de_rosas" type="radio" value="latina" >
											<label for="The Truman diesciocho" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/malibu.png" width="110px" height="95px"/>
									<p class="title">
										Malibu
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman diescinueve" name="color_de_rosas" type="radio" value="malibu" >
											<label for="The Truman diescinueve" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/moody-blues.png" width="110px" height="95px"/>
									<p class="title">
										Moody B.
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veinte" name="color_de_rosas" type="radio" value="moody-blues" >
											<label for="The Truman veinte" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/movie-star.png" width="110px" height="95px"/>
									<p class="title">
										Movie Star
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintiuno" name="color_de_rosas" type="radio" value="movie-star" >
											<label for="The Truman veintiuno" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/orange-crush.png" width="110px" height="95px"/>
									<p class="title">
										Orange C.
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintidos" name="color_de_rosas" type="radio" value="orange-crush" >
											<label for="The Truman veintidos" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/palmpeach.png" width="110px" height="95px"/>
									<p class="title">
										Palm Peach
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintitres" name="color_de_rosas" type="radio" value="palmpeach" >
											<label for="The Truman veintitres" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/pinkfloyd.png" width="110px" height="95px"/>
									<p class="title">
										Pink Floyd
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veinticuatro" name="color_de_rosas" type="radio" value="pinkfloyd" >
											<label for="The Truman veinticuatro" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>							
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/proud.png" width="110px" height="95px"/>
									<p class="title">
										Proud
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veinticinco" name="color_de_rosas" type="radio" value="proud" >
											<label for="The Truman veinticinco" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/rosita-vendella.png" width="110px" height="95px"/>
									<p class="title">
										Vendella
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintiseis" name="color_de_rosas" type="radio" value="rosita-vendella" >
											<label for="The Truman veintiseis" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/shoking-versilia.png" width="110px" height="95px"/>
									<p class="title">
										Shoking V.
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintisiete" name="color_de_rosas" type="radio" value="shoking-versilia" >
											<label for="The Truman veintisiete" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/sweet-berry.png" width="110px" height="95px"/>
									<p class="title">
										Sweet Berry
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintiocho" name="color_de_rosas" type="radio" value="sweet-berry" >
											<label for="The Truman veintiocho" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<ul class="options">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/sweetnes.png" width="110px" height="95px"/>
									<p class="title">
										Sweetnes
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman veintinueve" name="color_de_rosas" type="radio" value="sweetnes" >
											<label for="The Truman veintinueve" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/topaz.png" width="110px" height="95px"/>
									<p class="title">
										Topaz
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman treinta" name="color_de_rosas" type="radio" value="topaz" >
											<label for="The Truman treinta" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/vendela.png" width="110px" height="95px"/>
									<p class="title">
										Vendela
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman treintayuno" name="color_de_rosas" type="radio" value="vendela" >
											<label for="The Truman treintayuno" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/white-chocolate.png" width="110px" height="95px"/>
									<p class="title">
										White C.
									</p>
									<!-- option-->
									<div class="" data-modifier="">
										<div class="option">
											<input id="The Truman treintaydos" name="color_de_rosas" type="radio" value="white-chocolate" >
											<label for="The Truman treintaydos" class="radio"></label>										
												<strong></strong>
												<span></span>
											</label>
										</div>
									</div>								
									<!-- option-->
								</div>
							</li>
						</ul>
						<br><br>						
						<center>
							<div class="error-msg" id="div_color_de_rosas"></div><br>
							<input type="button" class="button blue medium bottom" value="Continuar" onClick="validar()">
						</center>						
						<input type="hidden" name="estado_pedido" value="1"/>
						<input type="hidden" name="fecha_de_pedido" value="<?php echo date('m/d/Y')?>"/>	
						<input type="hidden" name="fecha_de_pago" value="<?php echo date('m/d/Y')?>"/>						
					</div>
				</section>
			</form> 
			<?php		
				}
			?>
			<section class="bundle-section closed" data-section="Input" data-name="bundle" data-default-value="blades-gel">
				<div class="header">
					<h2>
						<span class="num">2.</span>

						<span class="incomplete-headline active">
							Elije la Cantidad de Rosas
						</span>
						<span class="complete-headline">
							You chose <em data-name="title"></em>.
						</span>
					</h2>
				</div>				
			</section>
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
		</main>
        <div class='push'></div>
    </div>
    <?php require_once("../../instancias/footer3.php"); ?>		


</body>
</html>
