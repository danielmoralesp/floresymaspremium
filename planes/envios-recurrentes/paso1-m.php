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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />

    <script>
        dataLayer = [];
    </script>
	
    <script>
        function loadCSS(e,n,o,t){"use strict"
        var d=window.document.createElement("link"),i=n||window.document.getElementsByTagName("script")[0],s=window.document.styleSheets
        return d.rel="stylesheet",d.href=e,d.media="only x",t&&(d.onload=t),i.parentNode.insertBefore(d,i),d.onloadcssdefined=function(n){for(var o,t=0;t<s.length;t++)s[t].href&&s[t].href.indexOf(e)>-1&&(o=!0)
            o?n():setTimeout(function(){d.onloadcssdefined(n)})},d.onloadcssdefined(function(){d.media=o||"all"}),d}
        loadCSS("https://harrys-a.akamaihd.net/assets/mobile/global/fonts-759e2b1a571493698d0f0802ba06e0a7.css");
    </script>

        <link href="../../assets/mobile/core-af587547fe0355e73614e29cc2feb274.css" media="all" rel="stylesheet" type="text/css" />
        <link href="../../assets/mobile/auto-refill-build/base-203519e1a17e14d199ad9c4a81fa1b5a.css" media="screen" rel="stylesheet" type="text/css" />
		
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
<body class="">
    <div id="flashes">
    </div>
	<?php require_once("../../instancias/header2-m.php"); ?>       
    <?php require_once("../../instancias/menu-m.php"); ?>   
	<main id="shave_plans_build">
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
						<ul class="">							
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
						</ul>
						<ul class="">
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
						<ul class="">
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
										Cool W.
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
						</ul>
						<ul class="">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/deeppurple.png" width="110px" height="95px"/>
									<p class="title">
										Deep P.
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
						<ul class="">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/engagement.png" width="110px" height="95px"/>
									<p class="title">
										Engage
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
						</ul>
						<ul class="">
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
						<ul class="">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/high-magic.png" width="110px" height="95px"/>
									<p class="title">
										High M.
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
										HighTink
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
						</ul>
						<ul class="">
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
						<ul class="">
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
						</ul>
						<ul class="">
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
						<ul class="">
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
						</ul>
						<ul class="">
							<li class="option " data-value="Olive 107">
								<div class="action">
									<img alt="Olive-107" src="../../panel/img/colores/palmpeach.png" width="110px" height="95px"/>
									<p class="title">
										Palm P.
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
						<ul class="">
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
						</ul>
						<ul class="">
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
										Sweet B.
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
						<ul class="">
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
						</ul>
						<ul class="">
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
							<?php echo chao_tilde('Seleccionar Calendario')?>
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

    <?php require_once("../../instancias/footer2-m.php"); ?>		


    <script type="text/javascript">
        var Harrys = Harrys || {};
        Harrys.IS_MOBILE = true;
        Harrys.SKIP_HEADER = false;
        Harrys.SKIP_FOOTER = false;
        dataLayer.push({ 'siteType': 'Mobile' });
    </script>
    <script type="text/javascript">
    var Harrys = Harrys || {};
    Harrys.ENV = "production";
    Harrys.DISABLE_ANALYTICS = false;
    Harrys.CDN_HOST = "https://harrys-a.akamaihd.net/"
    Harrys.COUNTRIES = {"US":{"full_name":"United States","zip_format":"\\A\\d{5}(-\\d{4})?\\z","zip_label":"Zip Code","zip_pattern":"\\d*","states":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","PR":"Puerto Rico","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming","GU":"Guam","AS":"American Samoa","MP":"Northern Mariana Islands","VI":"Virgin Islands","AA":"U.S. Armed Forces \u2013 Americas","AE":"U.S. Armed Forces \u2013 Europe","AP":"U.S. Armed Forces \u2013 Pacific"}},"CA":{"full_name":"Canada","zip_format":"\\A[A-Z]\\d[A-Z] ?\\d[A-Z]\\d\\z","zip_label":"Postal Code","zip_pattern":null,"states":{"AB":"Alberta","BC":"British Columbia","MB":"Manitoba","NB":"New Brunswick","NL":"Newfoundland and Labrador","NS":"Nova Scotia","ON":"Ontario","PE":"Prince Edward Island","QC":"Quebec","SK":"Saskatchewan","NT":"Northwest Territories","NU":"Nunavut","YT":"Yukon"}}}
    Harrys.CANADA_POSTAL_PREFIXES = {"NL":["A"],"NS":["B"],"PE":["C"],"NB":["E"],"QC":["G","H","J","K"],"ON":["J","K","L","M","N","P"],"MB":["R"],"SK":["S"],"AB":["T"],"BC":["V"],"NU":["X"],"NT":["X"],"YT":["Y"]}
    Harrys.products = Harrys.products_data = [{"id":326,"uid":null,"description":"Light lotion that protects and hydrates your skin after shaving. Quickly absorbed, no shiny residue. Ideal for sensitive and dry skin.","is_subscribable":true,"name":"After Shave Moisturizer","price":"14.0","properties":{"is_engravable":"false","tube_size":"Large - 4oz"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/after-shave-large-2688b7bfb111c4d4a43b1e67d1c2336b.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/786d04a785a7c500a092f811c7b766b5c3372a34.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"tube_size":"Large - 4oz"},{"id":335,"uid":null,"description":"Specifically designed for optimal packing, this kit is perfect for the guy on the move.","is_subscribable":false,"name":"Travel Kit","price":"25.0","properties":{"is_engravable":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/be6ebde50802c20f6cb264005a3a835b49868939.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/b32ec1a51ebdab5c7d0eaf12a578da417c749dc2.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":63,"uid":"HPRB0068","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"The Maple Leaf","price":"0.0","properties":{"is_engravable":"false","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/maple-leaf.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/maple-leaf.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":327,"uid":null,"description":"Rich gel that lathers into foam. Packed with natural ingredients that cushion and hydrate your skin.","is_subscribable":true,"name":"Foaming Shave Gel","price":"6.0","properties":{"is_engravable":"false","tube_size":"Medium - 4oz","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/foaming-shave-gel-medium-9fca0a17b34e9bd3e7a2f93990d6f938.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/3caef8bd482e258b1303a8fb8236a25c01470689.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/3d1a14e931657eede3e8611f71786d4f85a7e4dc.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/ce64cfb04f27da5ca88562f0ac4a03e8bd26e5a0.jpg","tube_size":"Medium - 4oz","soft_product_type":"foaming_shave_gel"},{"id":325,"uid":null,"description":"Light lotion that protects and hydrates your skin after shaving. Quickly absorbed, no shiny residue. Ideal for sensitive and dry skin.","is_subscribable":true,"name":"After Shave Moisturizer","price":"8.0","properties":{"is_engravable":"false","tube_size":"Regular - 1.7oz"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/after-shave-regular-2290a0c5ea2eec31e8f038d8e4c89aea.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/77a726df4818080e4eb21c41d957a41a3aa7e82f.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/c8b52b1b4582c5485fcb4edeb5b28fbf23d8742d.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/de6882780db44937f5dcb5ca572b59622a48dbff.jpg","tube_size":"Regular - 1.7oz"},{"id":331,"uid":null,"description":"A Truman handle, foaming shave gel, and a travel blade cover. \r\n","is_subscribable":false,"name":"Free Trial Set","price":"12.0","properties":{"color":"Nautilus Blue","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/51bb6884f3f9b3e8043a437b4d644cbdca53393f.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/e4b5f6b57b2d01472765387e81288b40fb8bb7e1.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue","soft_product_type":"foaming_shave_gel"},{"id":329,"uid":null,"description":"A convenient refill set of 8 blade cartridges, 2 foaming shave gels, and 1 after shave moisturizer.","is_subscribable":false,"name":"Blades, Shave Gel \u0026 After Shave","price":"38.0","properties":{"soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/refill-pack-sensitive-gel-940db0922859da3e4c4ee00471b4d9ac.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/f4f7b461facf7865470d610256e792a4ffbe3d5d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":161,"uid":"DPRB0222","description":"","is_subscribable":false,"name":"Shave Plan","price":"31.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/shave-plan-8-blade-2-cream-1f171a29fcb475c96b5f3d73057351eb.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/shave-plan-8-blade-2-cream-f416ab61965030e0373f06287fa9a489.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":328,"uid":null,"description":"Rich gel that lathers into foam. Packed with natural ingredients that cushion and hydrate your skin.","is_subscribable":true,"name":"Foaming Shave Gel","price":"8.0","properties":{"is_engravable":"false","tube_size":"Large - 6.7oz","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/foaming-shave-gel-large-d9caa3bd9a970b508fefd36c4b09baee.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/27aa9724c60d706f6417d964d93dc04aa4250c35.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/1bd6b6d3c020b7a17b63d3aaf3a4db452f31d123.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/fe65128b2729a85017bd595611812d8f59c15ffa.jpg","tube_size":"Large - 6.7oz","soft_product_type":"foaming_shave_gel"},{"id":332,"uid":null,"description":"A Truman handle, foaming shave gel, and a travel blade cover.","is_subscribable":false,"name":"Free Trial Set","price":"12.0","properties":{"color":"Total Orange","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/6699b6beb65ed50fb83d1e026797b9d2e3980e09.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/33c1ed89fa67c235bf121eceb2cbda63c82932e9.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange","soft_product_type":"foaming_shave_gel"},{"id":129,"uid":"KKRB0042","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Nautilus Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/875c31b0d5679ff0268577b75080a052c4295104.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/4a1694e22409b593c34aa08fe2c1595280fe884f.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue","soft_product_type":"foaming_shave_gel"},{"id":324,"uid":null,"description":"","is_subscribable":false,"name":"Harry's x Movember Handle","price":"15.0","properties":{"is_engravable":"false"},"price_text":"","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/5bea5a5803de1cd8ed049821c49f985819c9952a.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/40d24d694961a668facec2b42fb8134ee714fdb6.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":110,"uid":"SPSV0013","description":"Take care of your face without hurting your wallet. A 3.4oz blend of natural ingredients that provide a close, comfortable shave.","is_subscribable":true,"name":"Shave Cream","price":"8.0","properties":{"is_engravable":"false","tube_size":"Medium - 3.4oz","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/shave-cream-medium-ceb44c9539db9fad9628c0dc29e663f7.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/064fac212ed130234e576dbf39cab6b17d6fd067.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/cfcf1aa0fad3494d61933bfcef18983366fe53da.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/d8a594bc1f4f78266954b97e4a946569eb1eb4cb.jpg","tube_size":"Medium - 3.4oz","soft_product_type":"shave_cream"},{"id":333,"uid":null,"description":"A Truman handle, foaming shave gel, and a travel blade cover.","is_subscribable":false,"name":"Free Trial Set","price":"12.0","properties":{"color":"Olive 107","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/f8bc84493a9d38cad42621ff50656553e74620f9.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/3e7f14b42e4a6b55af9466e838ed07e19e6edb5a.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107","soft_product_type":"foaming_shave_gel"},{"id":334,"uid":null,"description":"A Truman handle, foaming shave gel, and a travel blade cover.","is_subscribable":false,"name":"Free Trial Set","price":"12.0","properties":{"color":"Ivory","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/05657caa0e871618cdda66ff820bc57d758703f5.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/459007bbbe2aeceadac74e889d902c076e8a2995.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory","soft_product_type":"foaming_shave_gel"},{"id":309,"uid":null,"description":"Designed to keep your blades dry and on display, this anodized aluminum stand has a minimal feel with a lot of function (there's even a built-in grip at the base to prevent slipping). One size fits all Harry\u2019s razors.","is_subscribable":false,"name":"Harry's Razor Stand","price":"15.0","properties":{"is_engravable":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/b6dd834e944cd85b6d16becf17a2cbecc20d0a5d.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/c1acd6917eaef39e2463076a3b7f00a35bf54e00.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":120,"uid":"SPSV0012","description":"Take care of your face without hurting your wallet. A blend of natural ingredients that provide a close, comfortable shave.","is_subscribable":true,"name":"Shave Cream","price":"12.0","properties":{"is_engravable":"false","tube_size":"Large - 6.7oz","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/shave-cream-large-bec5b2a3db460b1002061ffc1da303c1.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/6efbcaa0627776792dffdcde36b2f53bba525815.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"tube_size":"Large - 6.7oz"},{"id":285,"uid":"KKRB0092","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Exum Yellow","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/9c1941f2eb4f6016d1b26f2458d8c9de9e397295.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/436663360eaf6ae1e31d0b5d6f14a90deb41323b.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Exum Yellow","soft_product_type":"shave_cream"},{"id":9,"uid":"HPRB0006","description":"Constructed from precision-grade aluminum, the Winston is designed for effortless glide and precise control.","is_subscribable":false,"name":"The Winston","price":"20.0","properties":{"is_engravable":"false","color":"Chrome","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winston-handle-9a6aa6e7396b60e65402c825b1109fca.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/24c8a94c49a6631d094c0271eddcf73b433be0cd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome"},{"id":277,"uid":"HPRB0098","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"Jimmy Chin Razor","price":"15.0","properties":{"is_engravable":"false","color":"Exum Yellow","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/e402f757f3c96df5314cb5c065599ec41cf3ad64.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/003c5251ecf20b5a18fb9169dbc60bb6a682b068.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Exum Yellow"},{"id":295,"uid":"KKRB0097","description":"8 German Engineered Blade Cartridges","is_subscribable":true,"name":"Blades Only Plan","price":"15.0","properties":{"is_engravable":"false","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/7a537efb00d9bbd10f9fc703bde26243f43d72e2.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/4eaabe3a4f10d0bffd6e96c2f33e0d369d23760a.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/9d2676ca1aaf31301b3048b4a20a2c6790f8087d.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/2e1d2ff96381cae1f006b9ee1516d0fb65865496.jpg"},{"id":135,"uid":"KKRB0049","description":"A convenient refill set of Harry\u2019s German engineered blades and foaming shave gel. Includes 8 blades and 2 foaming shave gels.","is_subscribable":false,"name":"Blades \u0026 Shave Gel","price":"31.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/refill-pack-gel-6af9cc9b6b7675b571a32b95c4dbbb69.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/1876cf4376fab186a340f565a8ae2a704cbddbdf.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":43,"uid":"HPRB0069","description":"36 German blades engineered for sharpness and strength - a year's supply of Harry's blades for a clean 2014.","is_subscribable":false,"name":"Year of Blades","price":"52.0","properties":{"is_engravable":"false","pack_size":"36","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/yob-megapack-933b406ef3cf182ce9822a1d12f08f67.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/yob-megapack-6828ab2366a3556590fe134cd47b3a56.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"pack_size":"36"},{"id":32,"uid":"HPRB0044","description":"A Truman and 2 oz shave cream in a practical little box. Take it on the road or try it at home; works anywhere.","is_subscribable":false,"name":"One-Two Set","price":"12.0","properties":{"is_engravable":"false","color":"Olive 107","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"(Includes handle \u0026 shave cream)","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/one-two-set-olive-107-5bbe38f539af3078715b57eff0fd5f4d.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/one-two-set-olive-107-b6d42897b8ff0c905957569161edd456.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107","soft_product_type":"shave_cream"},{"id":293,"uid":"KKRB0096","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Exum Yellow","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/3d0b9b68917adb65a514db45ba4f8e7e493e6a0f.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/b2228fc7c0ecf96320de152e9255f560db728774.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Exum Yellow","soft_product_type":"foaming_shave_gel"},{"id":33,"uid":"HPRB0045","description":"A Truman and 2 oz shave cream in a practical little box. Take it on the road or try it at home; works anywhere.","is_subscribable":false,"name":"One-Two Set","price":"12.0","properties":{"is_engravable":"false","color":"Total Orange","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"(Includes handle \u0026 shave cream)","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/one-two-set-total-orange-5bbe38f539af3078715b57eff0fd5f4d.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/one-two-set-total-orange-b6d42897b8ff0c905957569161edd456.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange","soft_product_type":"shave_cream"},{"id":275,"uid":"HPRB0097","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"Jimmy Chin Razor","price":"15.0","properties":{"is_engravable":"false","color":"Teton Green","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/bea5e3d016696ad32ae95253e73cf8f46b161e43.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/9561ec3efd450de0837ac7e66ca94de818a48b5f.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Teton Green"},{"id":183,"uid":"KKRB0053","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"Winter Winston Set","price":"30.0","properties":{"is_engravable":"false","color":"Ice Blue","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-ice-blue-cream-e1718869f7c470f606f541108cfe3c00.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-ice-blue-cream-08d74eb41f1f0c33bb4aebdcaf1a080d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"shave_cream"},{"id":31,"uid":"HPRB0043","description":"A Truman and 2 oz shave cream in a practical little box. Take it on the road or try it at home; works anywhere.","is_subscribable":false,"name":"One-Two Set","price":"12.0","properties":{"is_engravable":"false","color":"Ivory","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"(Includes handle \u0026 shave cream)","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/one-two-set-ivory-5bbe38f539af3078715b57eff0fd5f4d.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/one-two-set-ivory-b6d42897b8ff0c905957569161edd456.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory","soft_product_type":"shave_cream"},{"id":94,"uid":"KKRB0023","description":"One real razor for Dad, one toy razor for Son.","is_subscribable":false,"name":"Father \u0026 Son Shave Set","price":"30.0","properties":{"is_engravable":"false","color":"Chrome","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/fathers-day-set-764a40110607690959d8fb63f41b36da.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/fathers-day-set-f703fada828f3e3a0e1242c07a899cb0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome"},{"id":30,"uid":"HPRB0042","description":"A Truman and 2 oz shave cream in a practical little box. Take it on the road or try it at home; works anywhere.","is_subscribable":false,"name":"One-Two Set","price":"12.0","properties":{"is_engravable":"false","color":"Nautilus Blue","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"(Includes handle \u0026 shave cream)","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/one-two-set-nautilus-blue-5bbe38f539af3078715b57eff0fd5f4d.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/one-two-set-nautilus-blue-b6d42897b8ff0c905957569161edd456.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue","soft_product_type":"shave_cream"},{"id":273,"uid":"HPRB0096","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"Jimmy Chin Razor","price":"15.0","properties":{"is_engravable":"false","color":"Summit Red","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/4b60f56cce4d5e2ca15783a6160c70e32af7856e.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/de60aac3d034f375ec34fc87a683bf863f9c7a37.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Summit Red"},{"id":1,"uid":"HPRB0007","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"The Truman","price":"10.0","properties":{"is_engravable":"false","color":"Nautilus Blue","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/b719cd5a013857352ea4855560aaa5c528001ea0.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/17e9067e021911d060c219aa7cd36859927c2519.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue"},{"id":4,"uid":"HPRB0010","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"The Truman","price":"10.0","properties":{"is_engravable":"false","color":"Total Orange","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/049f7849d537c05e8c9b96c540d29f6eeaa2479d.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/2f6ff16b03a5530d7b8b8879c25bf14dada672dd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange"},{"id":271,"uid":"HPRB0095","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"Jimmy Chin Razor","price":"15.0","properties":{"is_engravable":"false","color":"Meru Blue","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/a3c005b85c79da7df37f867bced9b5ce52be326c.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/3c2f888aefb9eda3d0070295ce3ee9dd4cd74c50.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Meru Blue"},{"id":193,"uid":"KKRB0056","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"The Engraved Winter Winston Set","price":"45.0","properties":{"color":"Charcoal","is_engravable":"true","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-engraved-charcoal-cream-5c6fd1feb1c10bb564b744f191194bea.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-engraved-charcoal-cream-bf22c3133f551b5f5ad01f762864011c.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"shave_cream"},{"id":189,"uid":"KKRB0058","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"Winter Winston Set","price":"30.0","properties":{"color":"Charcoal","is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-charcoal-gel-41fd7aeae22588e5e63edbfe1e30890c.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-charcoal-gel-39886ab9503fcd0b4726547e14346abd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"foaming_shave_gel"},{"id":106,"uid":"HPRB0084","description":"","is_subscribable":false,"name":"Harry's + Uncrate Black Truman","price":"0.0","properties":{"is_engravable":"false","color":"Black","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":null,"checkout_image":null,"shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Black"},{"id":163,"uid":"DPRB0226","description":"","is_subscribable":false,"name":"Shave Plan","price":"31.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/shave-plan-8-blade-2-cream-1f171a29fcb475c96b5f3d73057351eb.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/shave-plan-8-blade-2-cream-f416ab61965030e0373f06287fa9a489.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":162,"uid":"DPRB0224","description":"","is_subscribable":false,"name":"Shave Plan","price":"31.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/shave-plan-8-blade-2-cream-1f171a29fcb475c96b5f3d73057351eb.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/shave-plan-8-blade-2-cream-f416ab61965030e0373f06287fa9a489.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":151,"uid":"DPRB0051","description":"A convenient refill set of Harry\u2019s German engineered blades and naturally soothing shave cream. Includes 4 blades and 1 shave cream.","is_subscribable":false,"name":"Essential Refill Set","price":"15.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":null,"in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/refill-pack-one-5383f4393e53369817b24436ba92fb5f.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/refill-pack-one-1b76b14fec7c1bb4cbd6eadebe17e5c0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":152,"uid":"DPRB0052","description":"A convenient refill set of Harry\u2019s German engineered blades and naturally soothing shave cream. Includes 4 blades and 1 foaming shave gel.","is_subscribable":false,"name":"Essential Refill Set","price":"15.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":null,"in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/refill-pack-one-gel-05d51e46ff38aa1f6be626f051e6bf21.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/refill-pack-one-gel-96aa0d09983077b8bd5489f502455469.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":131,"uid":"KKRB0045","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Total Orange","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/c5f4471ff98cdfd8561b068dcf3fefcb0733bb28.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/1021e5dd26c2a9c760de460283db535fbf833c0c.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange","soft_product_type":"foaming_shave_gel"},{"id":107,"uid":"KKRB0040","description":"One limited edition black Truman Razor, 3 black blade cartridges, 3.4oz shave cream and black travel blade cover. Created exclusively by Harry's + Uncrate.","is_subscribable":false,"name":"Harry's + Uncrate Black Truman Set","price":"25.0","properties":{"is_engravable":"false","color":"Black","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/uncrate-set-996f3d5d794ba2094b04e5ccee5c7e15.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/uncrate-set-e195477e365f0fb011955589f62ad825.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Black","soft_product_type":"shave_cream"},{"id":159,"uid":"HPRB0102","description":"","is_subscribable":true,"name":"Harry's x Movember Razor","price":"20.0","properties":{"is_engravable":"false","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/movember-63b458c6914852a74b6d295dd75c5659.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/movember-f6370b4079ab266bdd97be2290c41dc7.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":217,"uid":"DPRB0061","description":"A month's worth of shaving - The Winter Winston razor, Foaming Shave Gel(4oz), 3 blade cartridges, travel blade cover - PLUS travel-sized versions of Foaming Shave Gel(2oz), After Shave Moisturizer(1.7oz), and Lip Balm SPF 15.","is_subscribable":false,"name":"Winter Winston \u0026 Essentials Kit","price":"65.0","properties":{"is_engravable":"true","color":"Ice Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-essentials-kit-ice-blue-gel-engraved-703bc6fa33802c856f018841f00c9050.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-essentials-kit-ice-blue-gel-engraved-ecf07e4a6b8724d4f3ee26b299d07a61.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"foaming_shave_gel"},{"id":215,"uid":"DPRB0058","description":"A month's worth of shaving - The Winter Winston razor, Foaming Shave Gel(4oz), 3 blade cartridges, travel blade cover - PLUS travel-sized versions of Foaming Shave Gel(2oz), After Shave Moisturizer(1.7oz), and Lip Balm SPF 15.","is_subscribable":false,"name":"Winter Winston \u0026 Essentials Kit","price":"50.0","properties":{"color":"Charcoal","is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-essentials-kit-charcoal-gel-630a03a186319ebf053e84546fe980e4.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-essentials-kit-charcoal-gel-ffab4d036d1cc1461130efd08c4fe9da.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"foaming_shave_gel"},{"id":213,"uid":"DPRB0057","description":"A month's worth of shaving - The Winter Winston razor, Foaming Shave Gel(4oz), 3 blade cartridges, travel blade cover - PLUS travel-sized versions of Foaming Shave Gel(2oz), After Shave Moisturizer(1.7oz), and Lip Balm SPF 15.","is_subscribable":false,"name":"Winter Winston \u0026 Essentials Kit","price":"50.0","properties":{"is_engravable":"false","color":"Ice Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-essentials-kit-ice-blue-gel-630a03a186319ebf053e84546fe980e4.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-essentials-kit-ice-blue-gel-ffab4d036d1cc1461130efd08c4fe9da.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"foaming_shave_gel"},{"id":223,"uid":"KKRB0064","description":"A gift card redeemable for 4 blade cartridges and 1 Shave Cream (3.4oz). That's one month of shaving.","is_subscribable":false,"name":"1 Month of Shaving","price":"15.0","properties":{"is_engravable":"false","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/one-month-of-shaving-cream-f481d3966ffd5bcee12bdc545b3360a7.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/one-month-of-shaving-cream-f6c2a9ae4178279904cb0e1377f3cb8e.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":219,"uid":"DPRB0062","description":"A month's worth of shaving - The Winter Winston razor, Foaming Shave Gel(4oz), 3 blade cartridges, travel blade cover - PLUS travel-sized versions of Foaming Shave Gel(2oz), After Shave Moisturizer(1.7oz), and Lip Balm SPF 15.","is_subscribable":false,"name":"Winter Winston \u0026 Essentials Kit","price":"65.0","properties":{"color":"Charcoal","is_engravable":"true","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-essentials-kit-charcoal-gel-engraved-703bc6fa33802c856f018841f00c9050.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-essentials-kit-charcoal-gel-engraved-9ef78c8b44f82797646eaefcc3eeea18.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"foaming_shave_gel"},{"id":267,"uid":"KKRB0079","description":"A Winter Winston Shave Set plus a Gift Card redeemable for 32 blade cartridges and 8 Foaming Shave Gels (6.7oz). That's a whole year's worth of shaving.","is_subscribable":false,"name":"Year of Shaving","price":"120.0","properties":{"color":"Charcoal","is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/year-of-shaving-charcoal-gel-e99ed9330ffb978f18e8206f792f5625.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/year-of-shaving-charcoal-gel-634be387e5efc0196c4ddebc09796476.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"foaming_shave_gel"},{"id":255,"uid":"KKRB0077","description":"A Winston Set plus a gift card redeemable for 16 blade cartridges and 4 Foaming Shave Gels (6.7oz). That's 6 whole months worth of shaving.","is_subscribable":false,"name":"6 Months of Shaving","price":"75.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/six-months-of-shaving-gel-014f7b5251cd1fc4881596f3ee10638c.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/six-months-of-shaving-gel-130b0db9f68d53a93c2d98d31df55d20.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":291,"uid":"KKRB0095","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Teton Green","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/cbfd2d7745c8fa1e3a8b373ff35607c5d37df0b2.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/744429dfc6466ac9d4337f7f872a5bc275b432d4.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Teton Green","soft_product_type":"foaming_shave_gel"},{"id":191,"uid":"KKRB0055","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"The Engraved Winter Winston Set","price":"45.0","properties":{"is_engravable":"true","color":"Ice Blue","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-engraved-ice-blue-cream-be0f177a5a3f3d347814614b82a9982a.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-engraved-ice-blue-cream-ddcd27864fcdcc5a7a5a1fb36a81e5cd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"shave_cream"},{"id":181,"uid":"HPRB0107","description":"Precision-grade, metallic-coated aluminum in two limited edition colors. The Winter Winston delivers effortless glide and precise control during any season.","is_subscribable":false,"name":"The Winter Winston Engraved","price":"40.0","properties":{"color":"Charcoal","is_engravable":"true","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-charcoal-engraved-57c5249837315a45dc0891c97a9b2357.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-charcoal-engraved-11e35093a96ea522433fcc256f6724fd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal"},{"id":179,"uid":"HPRB0106","description":"Precision-grade, metallic-coated aluminum in two limited edition colors. The Winter Winston delivers effortless glide and precise control during any season.","is_subscribable":false,"name":"The Winter Winston Engraved","price":"40.0","properties":{"is_engravable":"true","color":"Ice Blue","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-ice-blue-engraved-4cffd179dbf14e51874019156c4dfcb7.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-ice-blue-engraved-79ad9cf53c28c945b5aede0ac679b014.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue"},{"id":177,"uid":"HPRB0090","description":"Precision-grade, metallic-coated aluminum in two limited edition colors. The Winter Winston delivers effortless glide and precise control during any season.","is_subscribable":false,"name":"The Winter Winston","price":"25.0","properties":{"color":"Charcoal","is_engravable":"false","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-charcoal-57c5249837315a45dc0891c97a9b2357.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-charcoal-11e35093a96ea522433fcc256f6724fd.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal"},{"id":175,"uid":"HPRB0089","description":"Precision-grade, metallic-coated aluminum in two limited edition colors. The Winter Winston delivers effortless glide and precise control during any season.","is_subscribable":false,"name":"The Winter Winston","price":"25.0","properties":{"is_engravable":"false","color":"Ice Blue","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-ice-blue-4cffd179dbf14e51874019156c4dfcb7.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-ice-blue-79ad9cf53c28c945b5aede0ac679b014.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue"},{"id":211,"uid":"KKRB0063","description":"A Foaming Shave Gel(2oz), After Shave Moisturizer(1.7oz) and Lip Balm SPF 15. Everything you need to fight the elements and keep hydrated - in a tidy box.","is_subscribable":false,"name":"Winter Essentials Kit","price":"20.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":false},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-essentials-kit-34b4cf439d6500e1340ed7d06d9e3e66.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-essentials-kit-a60cdbb064f51b76d665d36ccda4fcc6.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":167,"uid":"KKRB0050","description":"A limited edition Movember Truman handle, 3 blade cartridges, foaming shave gel, and travel blade cover. $5 from each set is donated to The Movember Foundation. Give back and shave well.","is_subscribable":false,"name":"Harry's x Movember Set","price":"20.0","properties":{"is_engravable":"false","color":"Movember","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/movember-set-c7e1daeeb96151016bbe3bf6999590a3.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/movember-set-9e5f3accc042766c827a3d1fb787beee.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Movember"},{"id":299,"uid":"KKRB0099","description":"8 German Engineered Blade Cartridges, 2 Foaming Shave Gels (6.7oz), and 1 After Shave Moisturizer (1.7oz)","is_subscribable":true,"name":"Blades, Gel, and Aftershave Plan","price":"38.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/fcab62fdafcfb7399c000e5af82605a2db317657.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/98ae10caacd61cd611e7ee92569d4b9f46c7584a.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/07535f2042de445fc9c8943c9d63255f03650d56.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/400516385b3d737ae21ed7634aa5fbeb851fa4d2.jpg","soft_product_type":"foaming_shave_gel"},{"id":297,"uid":"KKRB0098","description":"8 German Engineered Blade Cartridges and 2 Foaming Shave Gels (6.7oz)","is_subscribable":true,"name":"Blades and Gel Plan","price":"30.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/a9f0675730199a47672ad6c76ca09120bf8bae4b.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/a605ca85301ed2e196f40908566e92f8bc05b443.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/9239d670cb33e22f3de00b0ef579d86010d8bb54.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/ef53fb96073f9e12fc56ec06230f135c8f53e3de.jpg","soft_product_type":"foaming_shave_gel"},{"id":197,"uid":"KKRB0060","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"The Engraved Winter Winston Set","price":"45.0","properties":{"color":"Charcoal","is_engravable":"true","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-engraved-charcoal-gel-39166883d1d337810919170d979d7ab0.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-engraved-charcoal-gel-1ef1345215bc7da4d0d30424b0f42b1d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"foaming_shave_gel"},{"id":195,"uid":"KKRB0059","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"The Engraved Winter Winston Set","price":"45.0","properties":{"is_engravable":"true","color":"Ice Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-engraved-ice-blue-gel-9887ca36ad531208566ec0eefc4f4838.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-engraved-ice-blue-gel-3b2faf5224d4216452d05e9ae118dba0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"foaming_shave_gel"},{"id":187,"uid":"KKRB0057","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"Winter Winston Set","price":"30.0","properties":{"is_engravable":"false","color":"Ice Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-ice-blue-gel-7e88b16b74c5314be87382d13182e7dd.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-ice-blue-gel-140e28576d820510e7d5e509ca0b1b04.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue","soft_product_type":"foaming_shave_gel"},{"id":185,"uid":"KKRB0054","description":"This set has all you need to get started with Harry's. A great shave at a fair price.","is_subscribable":false,"name":"Winter Winston Set","price":"30.0","properties":{"color":"Charcoal","is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winter-winston-set-charcoal-cream-b2ed0b9c2fdbd00ade66f56c0ce7be1f.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/winter-winston-set-charcoal-cream-caa031c3021577d14787238b4dfec7dc.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal","soft_product_type":"shave_cream"},{"id":270,"uid":"ECAR0003","description":"A Winter Winston Shave Set plus a Gift Card redeemable for 32 blade cartridges and 8 Foaming Shave Gels (6.7oz). That's a whole year's worth of shaving.","is_subscribable":false,"name":"Year of Shaving E-Gift","price":"120.0","properties":{"color":"Charcoal","is_engravable":"false","is_digital":"true"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":true,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/year-of-shaving-egift-charcoal-gel-e99ed9330ffb978f18e8206f792f5625.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/year-of-shaving-egift-charcoal-gel-634be387e5efc0196c4ddebc09796476.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Charcoal"},{"id":269,"uid":"ECAR0004","description":"A Winter Winston Shave Set plus a Gift Card redeemable for 32 blade cartridges and 8 Foaming Shave Gels (6.7oz). That's a whole year's worth of shaving.","is_subscribable":false,"name":"Year of Shaving E-Gift","price":"120.0","properties":{"is_engravable":"false","color":"Ice Blue","is_digital":"true"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":true,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/year-of-shaving-egift-blue-gel.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/year-of-shaving-egift-blue-gel.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ice Blue"},{"id":92,"uid":"KKRB0025","description":"One real razor for Dad, one toy razor for Son.","is_subscribable":false,"name":"Father \u0026 Son Shave Set - Engraved","price":"45.0","properties":{"color":"Chrome","is_engravable":"true","is_secondary_engravable":"true","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/fathers-day-set-engraved-764a40110607690959d8fb63f41b36da.jpg","checkout_image":"https://harrys-a.akamaihd.net/assets/products/checkout/fathers-day-set-engraved-f703fada828f3e3a0e1242c07a899cb0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome"},{"id":28,"uid":"HPRB0047","description":"Our Winston engraved with anything you can dream up (all 1, 2, or 3 letters worth). (Please allow up to 3 days for engraving).","is_subscribable":false,"name":"The Engraved Winston","price":"35.0","properties":{"color":"Chrome","is_engravable":"true","is_digital":"false"},"price_text":"(Includes engraved handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/winston-handle-engraved-d5b35ca0a22ef0f304cbbcab771a1636.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/c0aa58e5461049db1811e2be8441c2a43cd7cb2c.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome"},{"id":3,"uid":"HPRB0009","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"The Truman","price":"10.0","properties":{"is_engravable":"false","color":"Olive 107","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/072073fe906adb8d13ece29df770b19e93a58744.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/da97d3ae772b4a29f19c39e7986bf3b739ce7aba.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107"},{"id":283,"uid":"KKRB0091","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Teton Green","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/c554eb44a137369becb8b9e76ab9371c65d140e5.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/083ee4d4aed5da15fc32a3f2f72bc8d1c4cfacd0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Teton Green","soft_product_type":"shave_cream"},{"id":281,"uid":"KKRB0090","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Summit Red","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/f2571d28d02e9c2ff606a658f1d168af27bc38d5.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/9603c93b789bdffbbd2d888498b15fa7b670aa36.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Summit Red","soft_product_type":"shave_cream"},{"id":289,"uid":"KKRB0094","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Summit Red","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/672b757f860ba2cf72bf50fc5e36f88b60a3019b.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/ca66767c4b14a0cdce7426812bcb82df9f940df9.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Summit Red","soft_product_type":"foaming_shave_gel"},{"id":287,"uid":"KKRB0093","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Meru Blue","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/0188f0929e8820f1e60d45cf4f71431f3fcdce69.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/92ddd5a8a3b4bddd23948abbec8a5ea22cc112c8.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Meru Blue","soft_product_type":"foaming_shave_gel"},{"id":8,"uid":"HPRB0016","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Total Orange","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/ff5027ae9c9f84234a4fca158b15584fc357dfe5.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/5569e754d7e6925b706344259bb180832f66b1be.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange","soft_product_type":"shave_cream"},{"id":312,"uid":null,"description":"Our Winston Set plus our new razor stand (with option to engrave). Give Dad a gift he'll use for shaves and shaves to come.","is_subscribable":false,"name":"Father's Day Shave Set","price":"40.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/a70273fb2473db6ba997d33b64f7e864a54ef692.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/e0bdb62511b01cc6dee88c8040dc2fe85c0871db.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":311,"uid":null,"description":"Our Winston Set plus our new razor stand (with option to engrave). Give Dad a gift he'll use for shaves and shaves to come.","is_subscribable":false,"name":"Father's Day Shave Set","price":"40.0","properties":{"is_engravable":"false","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/ae45b2e4a1d212abb14d5a40646910d948dfaef0.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/7ac0a35a726c10c9af75b842573bfd810560778f.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":2,"uid":"HPRB0008","description":"The Truman's zinc alloy core and polymer coating provide substance, comfort, and control.","is_subscribable":false,"name":"The Truman","price":"10.0","properties":{"is_engravable":"false","color":"Ivory","is_digital":"false"},"price_text":"(Includes handle \u0026 1 blade)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/269f8eb088039ceb52b821604a80bca9a13a9548.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/9a5b129913bc8f3450a51ce1827f2f51390e5997.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory"},{"id":134,"uid":"KKRB0048","description":"An engraved Winston handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box. (Please allow up to 3 days for engraving).","is_subscribable":false,"name":"Engraved Winston Set","price":"40.0","properties":{"color":"Chrome","is_engravable":"true","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/c229802b2d3887dca97eb7774314a94ae8dcf868.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/98aaac6244b9ccdc7076fc4b626b83c584c17632.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome","soft_product_type":"foaming_shave_gel"},{"id":313,"uid":null,"description":"Our Winston Set plus our new razor stand (with option to engrave). Give Dad a gift he'll use for shaves and shaves to come.","is_subscribable":false,"name":"Engraved Father's Day Set","price":"50.0","properties":{"is_engravable":"true","soft_product_type":"foaming_shave_gel","is_secondary_engravable":"same_value_as_engraving"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/8dbe70b0ed0d8588be981abd41199cee8062507a.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/2113ce56d76931b0fba4f9a5a997f8bccc5fd227.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"foaming_shave_gel"},{"id":14,"uid":"HPRB0004","description":"Engineered in Germany for sharpness and strength and designed for custom fit with Harry's handles.","is_subscribable":true,"name":"Harry's Blades","price":"20.0","properties":{"is_engravable":"false","pack_size":"12","is_digital":"false"},"price_text":"($1.67 per blade cartridge)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/708143432d1f217d96495633b4ab118455ea4f57.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/df48a3b6ce8ef67ec32598bb209d7233770055c0.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/ab143a5d23eceb03aace76d84fc9580795f45bb5.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/613c52ea037571252dd934fafd6db2521779178c.jpg","pack_size":"12"},{"id":314,"uid":null,"description":"Our Winston Set plus our new razor stand (with option to engrave). Give Dad a gift he'll use for shaves and shaves to come.","is_subscribable":false,"name":"Engraved Father's Day Set","price":"50.0","properties":{"is_engravable":"true","soft_product_type":"shave_cream","is_secondary_engravable":"same_value_as_engraving"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/862956c1fd14261e119e4a75a7c05436fb90a273.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/ddbf465465c4c2abadb968491df8a2f37f9c5633.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":316,"uid":null,"description":"Whether it\u2019s in your dopp kit or medicine cabinet, our Travel Blade Cover is designed to keep your razor protected between shaves. The clamshell enclosure shields your blades, while a ventilation system keeps them dry. One size fits all Harry\u2019s razors.","is_subscribable":false,"name":"Travel Blade Cover","price":"1.0","properties":{"is_engravable":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/3798200b706c4993650ab2f83234533b099a9635.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/a8ce058997bd4cbfac7156a92da19c48f07f6ef0.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":7,"uid":"HPRB0015","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Olive 107","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/d458c5705049dfc09e9889d6b25b8e21a96f71a3.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/e1c2426eb4079240720f51a67a030ecc3925b35d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107","soft_product_type":"shave_cream"},{"id":13,"uid":"HPRB0003","description":"Engineered in Germany for sharpness and strength and designed for custom fit with Harry's handles.","is_subscribable":true,"name":"Harry's Blades","price":"15.0","properties":{"is_engravable":"false","pack_size":"8","is_digital":"false"},"price_text":"($1.88 per blade cartridge)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/bdb5557ae1bdf195a19a9e982bb6ae038d3090b8.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/6d05682441c08bfb5c63a355ba429fb65aa41d2e.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/5c60cbd4a8d8d7a593cd36721c1abd650457a28e.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/6b21ab7356645cb914cf3e338b4c398d5455f311.jpg","pack_size":"8"},{"id":10,"uid":"HPRB0012","description":"A Winston handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Winston Set","price":"25.0","properties":{"is_engravable":"false","color":"Chrome","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/5dab0aab69e8c3bfbb25042fcc9d2c76e5e1ed0f.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/366e59e74b50f78b09d24d2f762ed50bda515cd7.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome","soft_product_type":"shave_cream"},{"id":133,"uid":"KKRB0041","description":"A Winston handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Winston Set","price":"25.0","properties":{"is_engravable":"false","color":"Chrome","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/8a479981486cbefb6eaac63df4a0808009772f13.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/6e25b0c65178aa0c6e7e0ec6a49c10e8788dc75a.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome","soft_product_type":"foaming_shave_gel"},{"id":317,"uid":null,"description":"All-black shave set, created exclusively by Harry's + Uncrate. Limited edition.","is_subscribable":false,"name":"Limited Edition Uncrate Shave Set","price":"35.0","properties":{"is_engravable":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":true,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/043baa36587c2113011e71ba751f2955249ac8dc.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/82aca3d9dd3b25dfa2f47318c806c33ca2ceae75.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":6,"uid":"HPRB0014","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Ivory","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/3cd0e5a81134cba577dd0f9fa04e131e4fbd67e0.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/7d6caf9adb0a7fda227aaa65c9b6fb3cd3fe26bc.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory","soft_product_type":"shave_cream"},{"id":321,"uid":null,"description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"1-Month Trial","price":"15.0","properties":{"color":"Olive 107","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/7500cc7ce47874c01f9920b5f29f45255cdf85d7.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/75283029903f22b034d3e99ecc251eef8daa2fc6.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107","soft_product_type":"foaming_shave_gel"},{"id":319,"uid":null,"description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"1-Month Trial","price":"15.0","properties":{"color":"Total Orange","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/d0a7d27f7402ed50cb0dae2d75a1070e6a1b2c7f.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/91e678df79f7391f5a7043168fbc16a0132719db.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Total Orange","soft_product_type":"foaming_shave_gel"},{"id":88,"uid":"KKRB0024","description":"A convenient refill set of Harry\u2019s German engineered blades and naturally soothing shave cream. Includes 8 blades and 2 shave creams.","is_subscribable":false,"name":"Blades \u0026 Shave Gel","price":"31.0","properties":{"is_engravable":"false","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrys-a.akamaihd.net/assets/products/cart/refill-pack-b74d19893f19c7827e0aff5609cf9dcb.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/2ff02df2edc4e8c97230fe32bc2f268b738107ec.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"soft_product_type":"shave_cream"},{"id":322,"uid":null,"description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"1-Month Trial","price":"15.0","properties":{"color":"Ivory","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/27ecf44f8dbc5af58ed4254c2a9fa6d6e1d8b9c7.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/7c492a9884902fe8840569e40c1b830eb6f1a43d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory","soft_product_type":"foaming_shave_gel"},{"id":320,"uid":null,"description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"1-Month Trial","price":"15.0","properties":{"color":"Nautilus Blue","soft_product_type":"foaming_shave_gel"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/0715b7d75e0ecbe6cd4dbeff99a0f1d4fa32ad2b.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/4abd7d1d85be1ac7c1514671430dcc9ee1d9a066.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue","soft_product_type":"foaming_shave_gel"},{"id":323,"uid":null,"description":"A limited edition Movember Truman handle, 3 blade cartridges, foaming shave gel and travel blade cover. $5 from each set is donated to The Movember Foundation. Give back and shave well.","is_subscribable":false,"name":"Harry's x Movember Shave Set","price":"20.0","properties":{"is_engravable":"false"},"price_text":"($5 donated to Movember)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/c8ccebdb4912fa924bcce7ebc602e195d3cdfbea.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/2728bc67b35d812c7d75f46ff2d3cd9555e04bfe.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":130,"uid":"KKRB0044","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Olive 107","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/ef5239db0a57953dad31ec6a483419a8fe4e410b.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/b6317de4e76e693c59c1b5cd2d793d219db0712d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Olive 107","soft_product_type":"foaming_shave_gel"},{"id":132,"uid":"KKRB0043","description":"A Truman handle, 3 blades and a foaming shave gel. A month of shaving in a tidy box.","is_subscribable":false,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Ivory","soft_product_type":"foaming_shave_gel","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/79cfe291429decebd69402cbaa58134283711df5.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/7a13ba432e6ed8e8439c9965277372f9552d922d.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Ivory","soft_product_type":"foaming_shave_gel"},{"id":5,"uid":"HPRB0013","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":true,"name":"The Truman Set","price":"15.0","properties":{"is_engravable":"false","color":"Nautilus Blue","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/edf7ad3818fb703806d4a50bb7e8cab6001b5fc9.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/808f75e439d5f486f988c109a7362d0a5bff2f9f.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Nautilus Blue","soft_product_type":"shave_cream"},{"id":279,"uid":"KKRB0089","description":"A Truman handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box.","is_subscribable":false,"name":"Jimmy Chin Shave Set","price":"20.0","properties":{"is_engravable":"false","color":"Meru Blue","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":false,"CA":false},"in_stock_for_any_country":false,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/115c8b5be1e37bef624e380a1bd969fb7e4408b3.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/973c294f743dec0fd5f30b7878e8605b2f4ba487.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Meru Blue","soft_product_type":"shave_cream"},{"id":12,"uid":"HPRB0002","description":"Engineered in Germany for sharpness and strength and designed for custom fit with Harry's handles.","is_subscribable":true,"name":"Harry's Blades","price":"8.0","properties":{"is_engravable":"false","pack_size":"4","is_digital":"false"},"price_text":"($2.00 per blade cartridge)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/6f7909423ed0b194effa4423ac3c48c1cbe65ccc.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/b4dd7d885d3ab0a320f1c7e69d3a4ef7556277f7.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/7efff8efe317c4dbe0325412698aeeb2eecf2abe.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/8b3eddf2b223340a7bb3d4c7639fe25e99de326c.jpg","pack_size":"4"},{"id":15,"uid":"HPRB0005","description":"Engineered in Germany for sharpness and strength and designed for custom fit with Harry's handles.","is_subscribable":true,"name":"Harry's Blades","price":"25.0","properties":{"is_engravable":"false","pack_size":"16","is_digital":"false"},"price_text":"($1.56 per blade cartridge)","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/e6cc45396e4dbdf62230fb36bab9afa40b12e419.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/53d46b8091efdc811e70ae8fe3e4dbf7fe69a141.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/e93a7f634b613c89b08a0508eb584cd23c6d5999.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/7a2b608ae203c7aa46905c164f478fb662912739.jpg","pack_size":"16"},{"id":29,"uid":"HPRB0041","description":"An engraved Winston handle, 3 blades and a tube of shave cream. A month of shaving in a tidy box. (Please allow up to 3 days for engraving).","is_subscribable":false,"name":"Engraved Winston Set","price":"40.0","properties":{"color":"Chrome","is_engravable":"true","soft_product_type":"shave_cream","is_digital":"false"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/c6d20b1cc4a0a80c5127edfccc072c8c54c90309.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/b2c7267a941915f47589cc03b9a73cc97b3fe07f.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null,"color":"Chrome","soft_product_type":"shave_cream"},{"id":310,"uid":null,"description":"Designed to keep your blades dry and on display, this anodized aluminum stand has a minimal feel with a lot of function (there's even a built-in grip at the base to prevent slipping). One size fits all Harry\u2019s razors.","is_subscribable":false,"name":"Engraved Razor Stand","price":"30.0","properties":{"is_engravable":"true"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":true,"is_engravable":true,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/34d5a2a599c1301a2b47c508e7b3887baac9145e.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/f4444c217717a9aaa96fa1cf99c3db285bba3085.jpg","shave_plan_white_image":null,"shave_plan_grey_image":null},{"id":318,"uid":null,"description":"A non-drying, gentle exfoliator that\u2019s perfect for daily use\u2014whether you\u2019re shaving or not. It lathers up for a deep clean, leaving your skin feeling fresh.","is_subscribable":true,"name":"Daily Face Wash","price":"7.0","properties":{"is_engravable":"false","tube_size":"5.1oz"},"price_text":"","in_stock":{"US":true,"CA":true},"in_stock_for_any_country":true,"sold_out":false,"is_waitlistable":false,"is_engravable":false,"is_digital":false,"dropdown_cart_image":"https://harrysx-a.akamaihd.net/assets/images/products/cart/9635fb4345cfd65a17dfcd8253a8c56270af5581.jpg","checkout_image":"https://harrysx-a.akamaihd.net/assets/images/products/checkout/d5fe15dbf067a4fae04aa4c9fe84a1932cf34a06.jpg","shave_plan_white_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_white_images/attachments/ab33b8987eb1e87a7363037ddb6bf7e063ccf2cf.jpg","shave_plan_grey_image":"https://harrysx-a.akamaihd.net/assets/images/shave_plan_grey_images/attachments/f2ab63200386d22efbaa33af44668b751956d4da.jpg","tube_size":"5.1oz"}];
    Harrys.productIds = {"TWO_PACK":"HPRB0001","FOUR_PACK":"HPRB0002","EIGHT_PACK":"HPRB0003","TWELVE_PACK":"HPRB0004","SIXTEEN_PACK":"HPRB0005","YOB_MEGAPACK":"HPRB0069","FOUR_COUNT_BLADE_BOX":"MSPK0007","TRUMAN_NAUTILUS":"HPRB0007","TRUMAN_IVORY":"HPRB0008","TRUMAN_OLIVE":"HPRB0009","TRUMAN_ORANGE":"HPRB0010","TRUMAN_ASH_FOX":"HPRB0019","TRUMAN_HEADLEY_GRANGE":"HPRB0020","TRUMAN_NAUTILUS_CAPT":"HPRB0021","TRUMAN_WOODSMAN":"HPRB0022","TRUMAN_SS14_GRAY":"HPRB0072","TRUMAN_SS14_YELLOW":"HPRB0073","TRUMAN_SS14_GREEN":"HPRB0074","TRUMAN_SS14_ORANGE":"HPRB0071","WINSTON_NO_BOX":"HPRB0038","WINSTON":"HPRB0006","WINSTON_ENGRAVED":"HPRB0047","TRUMAN_NSD":"HPRB0039","TRUMAN_FUND_A_FELLOW":"KKRB0006","VALENTINES_DAY":"HPRB0070","MOVEMBER_2014":"HPRB0102","TRUMAN_FW14_BLUE":"HPRB0095","TRUMAN_FW14_RED":"HPRB0096","TRUMAN_FW14_GREEN":"HPRB0097","TRUMAN_FW14_YELLOW":"HPRB0098","TRUMAN_SET_NAUTILUS":"HPRB0013","TRUMAN_SET_IVORY":"HPRB0014","TRUMAN_SET_OLIVE":"HPRB0015","TRUMAN_SET_ORANGE":"HPRB0016","TRUMAN_SET_GEL_NAUTILUS":"KKRB0042","TRUMAN_SET_GEL_IVORY":"KKRB0043","TRUMAN_SET_GEL_OLIVE":"KKRB0044","TRUMAN_SET_GEL_ORANGE":"KKRB0045","TRUMAN_SET_ASH_FOX":"HPRB0029","TRUMAN_SET_HEADLEY_GRANGE":"HPRB0030","TRUMAN_SET_NAUTILUS_CAPT":"HPRB0031","TRUMAN_SET_WOODSMAN":"HPRB0032","TRUMAN_MAPLE":"HPRB0068","TRUMAN_SET_MAPLE":"HPRB0079","TRUMAN_STORYBOOK_NAUTILUS":"HPRB0042","TRUMAN_STORYBOOK_IVORY":"HPRB0043","TRUMAN_STORYBOOK_OLIVE":"HPRB0044","TRUMAN_STORYBOOK_ORANGE":"HPRB0045","TRUMAN_SET_SS14_GRAY":"HPRB0076","TRUMAN_SET_SS14_YELLOW":"HPRB0077","TRUMAN_SET_SS14_GREEN":"HPRB0078","TRUMAN_SET_SS14_ORANGE":"HPRB0075","WINSTON_SET":"HPRB0012","WINSTON_SET_ENGRAVED":"HPRB0041","MAMMOTH_SET":"KKRB0007","WINSTON_SET_GEL":"KKRB0041","WINSTON_SET_GEL_ENGRAVED":"KKRB0048","FATHERS_DAY_SET_RAW":"HPRB0086","FATHERS_DAY_SET":"KKRB0023","FATHERS_DAY_SET_ENGRAVED":"KKRB0025","UNCRATE_SET":"KKRB0040","UNCRATE_HANDLE":"HPRB0084","MOVEMBER_2014_SET":"KKRB0050","TRUMAN_SET_CREAM_FW14_BLUE":"KKRB0089","TRUMAN_SET_CREAM_FW14_RED":"KKRB0090","TRUMAN_SET_CREAM_FW14_GREEN":"KKRB0091","TRUMAN_SET_CREAM_FW14_YELLOW":"KKRB0092","TRUMAN_SET_GEL_FW14_BLUE":"KKRB0093","TRUMAN_SET_GEL_FW14_RED":"KKRB0094","TRUMAN_SET_GEL_FW14_GREEN":"KKRB0095","TRUMAN_SET_GEL_FW14_YELLOW":"KKRB0096","WINSTON_ICE_BLUE_NO_BOX":"HPRB0092","WINSTON_CHARCOAL_NO_BOX":"HPRB0093","WINSTON_ICE_BLUE":"HPRB0089","WINSTON_CHARCOAL":"HPRB0090","WINSTON_ICE_BLUE_ENGRAVED":"HPRB0106","WINSTON_CHARCOAL_ENGRAVED":"HPRB0107","WINSTON_SET_ICE_BLUE_CREAM":"KKRB0053","WINSTON_SET_CHARCOAL_CREAM":"KKRB0054","WINSTON_SET_ICE_BLUE_ENGRAVED_CREAM":"KKRB0055","WINSTON_SET_CHARCOAL_ENGRAVED_CREAM":"KKRB0056","WINSTON_SET_ICE_BLUE_GEL":"KKRB0057","WINSTON_SET_CHARCOAL_GEL":"KKRB0058","WINSTON_SET_ICE_BLUE_ENGRAVED_GEL":"KKRB0059","WINSTON_SET_CHARCOAL_ENGRAVED_GEL":"KKRB0060","WINTER_ESSENTIALS_KIT_BOX_TOP":"MSPK0105","WINTER_ESSENTIALS_KIT_BOX_TRAY":"MSPK0104","WINTER_ESSENTIALS_KIT_BOX_BOTTOM":"MSPK0103","WINTER_ESSENTIALS_KIT":"KKRB0063","WINSTON_ICE_BLUE_CREAM_ESSENTIALS_KIT":"DPRB0055","WINSTON_CHARCOAL_CREAM_ESSENTIALS_KIT":"DPRB0056","WINSTON_ICE_BLUE_GEL_ESSENTIALS_KIT":"DPRB0057","WINSTON_CHARCOAL_GEL_ESSENTIALS_KIT":"DPRB0058","WINSTON_ICE_BLUE_CREAM_ESSENTIALS_KIT_ENGRAVED":"DPRB0059","WINSTON_CHARCOAL_CREAM_ESSENTIALS_KIT_ENGRAVED":"DPRB0060","WINSTON_ICE_BLUE_GEL_ESSENTIALS_KIT_ENGRAVED":"DPRB0061","WINSTON_CHARCOAL_GEL_ESSENTIALS_KIT_ENGRAVED":"DPRB0062","ONE_MONTH_KIT_CREAM_CARD":"MSMM001C","ONE_MONTH_KIT_GEL_CARD":"MSMM001G","ONE_MONTH_OF_SHAVING_CREAM":"KKRB0064","ONE_MONTH_OF_SHAVING_GEL":"KKRB0072","THREE_MONTHS_KIT_CREAM_CARD":"MSMM003C","THREE_MONTHS_KIT_GEL_CARD":"MSMM003G","THREE_MONTHS_OF_SHAVING_TRUMAN_BLUE_CREAM":"KKRB0065","THREE_MONTHS_OF_SHAVING_TRUMAN_IVORY_CREAM":"KKRB0066","THREE_MONTHS_OF_SHAVING_TRUMAN_OLIVE_CREAM":"KKRB0067","THREE_MONTHS_OF_SHAVING_TRUMAN_ORANGE_CREAM":"KKRB0068","THREE_MONTHS_OF_SHAVING_TRUMAN_BLUE_GEL":"KKRB0073","THREE_MONTHS_OF_SHAVING_TRUMAN_IVORY_GEL":"KKRB0074","THREE_MONTHS_OF_SHAVING_TRUMAN_OLIVE_GEL":"KKRB0075","THREE_MONTHS_OF_SHAVING_TRUMAN_ORANGE_GEL":"KKRB0076","SIX_MONTHS_KIT_CREAM_CARD":"MSMM006C","SIX_MONTHS_KIT_GEL_CARD":"MSMM006G","SIX_MONTHS_OF_SHAVING_WINSTON_CREAM":"KKRB0069","SIX_MONTHS_OF_SHAVING_WINSTON_GEL":"KKRB0077","TWELVE_MONTH_KIT_CREAM_CARD":"MSMM012C","TWELVE_MONTH_KIT_GEL_CARD":"MSMM012G","TWELVE_MONTH_KIT_WINSTON_ICE_BLUE_CREAM":"KKRB0070","TWELVE_MONTH_KIT_WINSTON_CHARCOAL_CREAM":"KKRB0071","TWELVE_MONTH_KIT_WINSTON_ICE_BLUE_GEL":"KKRB0078","TWELVE_MONTH_KIT_WINSTON_CHARCOAL_GEL":"KKRB0079","BLADES_ONLY_SHAVE_PLAN":"KKRB0097","BLADES_AND_GEL_SHAVE_PLAN":"KKRB0098","BLADES_GEL_AFTER_SHAVE_PLAN":"KKRB0099","YEAR_OF_SHAVING_EGIFT_CHARCOAL_GEL":"ECAR0003","YEAR_OF_SHAVING_EGIFT_ICE_BLUE_GEL":"ECAR0004","LIP_BALM":"SPSV0016","LIP_BALM_BOX":"MSPK0070","PACKAGED_LIP_BALM":"SPSV0020","YEAR_OF_BLADES":"HPRB0052","YEAR_OF_BLADES_MEGAPACK_REDEEMABLE":"HPBR0080","YEAR_OF_BLADES_ECARD":"HPRB0066","RETURN_ADDR_STICKER_E16":"MSMM0018","H_APOSTROPHE_GOLD_CIRCLE_STICKER":"MSMM0019","YEAR_OF_BLADES_CARD":"MSMM0021","YEAR_OF_BLADES_FOLDER":"MSMM0022","ENVELOPE_A6_GREY":"MSMM0023","ENVELOPE_WHITE_6X8":"MSPK0039","SHAVE_CREAM_THREE_OZ":"SPSV0002","SHAVE_CREAM_TWO_OZ":"SPSV0005","SHAVE_CREAM_SIX_OZ_BLUE":"SPSV0012","SHAVE_CREAM_THREE_OZ_BLUE":"SPSV0013","SHAVE_CREAM_TWO_OZ_BLUE":"SPSV0014","SHAVE_GEL_TWO_OZ":"SPSV0007","SHAVE_GEL_FOUR_OZ":"SPSV0008","SHAVE_GEL_SIX_OZ":"SPSV0009","AFTER_SHAVE_ONE_OZ":"SPSV0011","AFTER_SHAVE_FOUR_OZ":"SPSV0010","PACKAGED_AFTER_SHAVE_ONE_OZ":"SPSV0019","PACKAGED_AFTER_SHAVE_FOUR_OZ":"SPSV0018","RAZORCUT_LAWNMOWER":"KKRB0022","REFILL_PACK":"KKRB0024","REFILL_PACK_GEL":"KKRB0049","REFILL_PACK_SENSITIVE":"KKRB0046","REFILL_PACK_GEL_SENSITIVE":"KKRB0047","TWO_PACK_CANADA":"HPRB1001","FOUR_PACK_CANADA":"HPRB1002","EIGHT_PACK_CANADA":"HPRB1003","TWELVE_PACK_CANADA":"HPRB1004","SIXTEEN_PACK_CANADA":"HPRB1005","YOB_MEGAPACK_CANADA":"HPRB1069","FOUR_COUNT_BLADE_BOX_CANADA":"MSPK1007","TRUMAN_NAUTILUS_CANADA":"HPRB1007","TRUMAN_IVORY_CANADA":"HPRB1008","TRUMAN_OLIVE_CANADA":"HPRB1009","TRUMAN_ORANGE_CANADA":"HPRB1010","TRUMAN_MAPLE_CANADA":"HPRB1068","TRUMAN_SET_MAPLE_CANADA":"HPRB1079","WINSTON_NO_BOX_CANADA":"HPRB1038","WINSTON_CANADA":"HPRB1006","WINSTON_ENGRAVED_CANADA":"HPRB1047","TRUMAN_SET_NAUTILUS_CANADA":"HPRB1013","TRUMAN_SET_IVORY_CANADA":"HPRB1014","TRUMAN_SET_OLIVE_CANADA":"HPRB1015","TRUMAN_SET_ORANGE_CANADA":"HPRB1016","TRUMAN_SET_GEL_NAUTILUS_CANADA":"KKRB1042","TRUMAN_SET_GEL_IVORY_CANADA":"KKRB1043","TRUMAN_SET_GEL_OLIVE_CANADA":"KKRB1044","TRUMAN_SET_GEL_ORANGE_CANADA":"KKRB1045","TRUMAN_STORYBOOK_NAUTILUS_CANADA":"HPRB1042","TRUMAN_STORYBOOK_IVORY_CANADA":"HPRB1043","TRUMAN_STORYBOOK_OLIVE_CANADA":"HPRB1044","TRUMAN_STORYBOOK_ORANGE_CANADA":"HPRB1045","TRUMAN_SS14_GRAY_CANADA":"HPRB1072","TRUMAN_SS14_YELLOW_CANADA":"HPRB1073","TRUMAN_SS14_GREEN_CANADA":"HPRB1074","TRUMAN_SS14_ORANGE_CANADA":"HPRB1071","TRUMAN_SET_SS14_GRAY_CANADA":"HPRB1076","TRUMAN_SET_SS14_YELLOW_CANADA":"HPRB1077","TRUMAN_SET_SS14_GREEN_CANADA":"HPRB1078","TRUMAN_SET_SS14_ORANGE_CANADA":"HPRB1075","TRUMAN_SET_CREAM_FW14_BLUE_CANADA":"KKRB1089","TRUMAN_SET_CREAM_FW14_RED_CANADA":"KKRB1090","TRUMAN_SET_CREAM_FW14_GREEN_CANADA":"KKRB1091","TRUMAN_SET_CREAM_FW14_YELLOW_CANADA":"KKRB1092","TRUMAN_SET_GEL_FW14_BLUE_CANADA":"KKRB1093","TRUMAN_SET_GEL_FW14_RED_CANADA":"KKRB1094","TRUMAN_SET_GEL_FW14_GREEN_CANADA":"KKRB1095","TRUMAN_SET_GEL_FW14_YELLOW_CANADA":"KKRB1096","WINSTON_SET_CANADA":"HPRB1012","WINSTON_SET_ENGRAVED_CANADA":"HPRB1041","WINSTON_SET_GEL_CANADA":"KKRB1041","WINSTON_SET_GEL_ENGRAVED_CANADA":"KKRB1048","SHAVE_CREAM_THREE_OZ_CANADA":"SPSV1002","SHAVE_CREAM_TWO_OZ_CANADA":"SPSV1005","SHAVE_CREAM_SIX_OZ_BLUE_CANADA":"SPSV1012","SHAVE_CREAM_THREE_OZ_BLUE_CANADA":"SPSV1013","SHAVE_CREAM_TWO_OZ_BLUE_CANADA":"SPSV1014","SHAVE_GEL_TWO_OZ_CANADA":"SPSV1007","SHAVE_GEL_FOUR_OZ_CANADA":"SPSV1008","SHAVE_GEL_SIX_OZ_CANADA":"SPSV1009","AFTER_SHAVE_ONE_OZ_CANADA":"SPSV1011","AFTER_SHAVE_FOUR_OZ_CANADA":"SPSV1010","PACKAGED_AFTER_SHAVE_ONE_OZ_CANADA":"SPSV1019","PACKAGED_AFTER_SHAVE_FOUR_OZ_CANADA":"SPSV1018","RAZORCUT_LAWNMOWER_CANADA":"KKRB1022","REFILL_PACK_CANADA":"KKRB1024","REFILL_PACK_GEL_CANADA":"KKRB1049","REFILL_PACK_SENSITIVE_CANADA":"KKRB1046","REFILL_PACK_GEL_SENSITIVE_CANADA":"KKRB1047","FATHERS_DAY_SET_RAW_CANADA":"HPRB1086","FATHERS_DAY_SET_CANADA":"KKRB1023","FATHERS_DAY_SET_ENGRAVED_CANADA":"KKRB1025","UNCRATE_SET_CANADA":"KKRB1040","UNCRATE_HANDLE_CANADA":"HPRB1084","MOVEMBER_2014_CANADA":"HPRB1102","MOVEMBER_2014_SET_CANADA":"KKRB1050","TRUMAN_FW14_BLUE_CANADA":"HPRB1095","TRUMAN_FW14_RED_CANADA":"HPRB1096","TRUMAN_FW14_GREEN_CANADA":"HPRB1097","TRUMAN_FW14_YELLOW_CANADA":"HPRB1098","WINSTON_ICE_BLUE_NO_BOX_CANADA":"HPRB1092","WINSTON_CHARCOAL_NO_BOX_CANADA":"HPRB1093","WINSTON_ICE_BLUE_CANADA":"HPRB1089","WINSTON_CHARCOAL_CANADA":"HPRB1090","WINSTON_ICE_BLUE_ENGRAVED_CANADA":"HPRB1106","WINSTON_CHARCOAL_ENGRAVED_CANADA":"HPRB1107","WINSTON_SET_ICE_BLUE_CREAM_CANADA":"KKRB1053","WINSTON_SET_CHARCOAL_CREAM_CANADA":"KKRB1054","WINSTON_SET_ICE_BLUE_ENGRAVED_CREAM_CANADA":"KKRB1055","WINSTON_SET_CHARCOAL_ENGRAVED_CREAM_CANADA":"KKRB1056","WINSTON_SET_ICE_BLUE_GEL_CANADA":"KKRB1057","WINSTON_SET_CHARCOAL_GEL_CANADA":"KKRB1058","WINSTON_SET_ICE_BLUE_ENGRAVED_GEL_CANADA":"KKRB1059","WINSTON_SET_CHARCOAL_ENGRAVED_GEL_CANADA":"KKRB1060","WINTER_ESSENTIALS_KIT_BOX_TOP_CANADA":"MSPK1105","WINTER_ESSENTIALS_KIT_BOX_TRAY_CANADA":"MSPK1104","WINTER_ESSENTIALS_KIT_BOX_BOTTOM_CANADA":"MSPK1103","WINTER_ESSENTIALS_KIT_CANADA":"KKRB1063","WINSTON_ICE_BLUE_CREAM_ESSENTIALS_KIT_CANADA":"DPRB1055","WINSTON_CHARCOAL_CREAM_ESSENTIALS_KIT_CANADA":"DPRB1056","WINSTON_ICE_BLUE_GEL_ESSENTIALS_KIT_CANADA":"DPRB1057","WINSTON_CHARCOAL_GEL_ESSENTIALS_KIT_CANADA":"DPRB1058","WINSTON_ICE_BLUE_CREAM_ESSENTIALS_KIT_ENGRAVED_CANADA":"DPRB1059","WINSTON_CHARCOAL_CREAM_ESSENTIALS_KIT_ENGRAVED_CANADA":"DPRB1060","WINSTON_ICE_BLUE_GEL_ESSENTIALS_KIT_ENGRAVED_CANADA":"DPRB1061","WINSTON_CHARCOAL_GEL_ESSENTIALS_KIT_ENGRAVED_CANADA":"DPRB1062","BLADES_ONLY_SHAVE_PLAN_CANADA":"KKRB1097","BLADES_AND_GEL_SHAVE_PLAN_CANADA":"KKRB1098","BLADES_GEL_AFTER_SHAVE_PLAN_CANADA":"KKRB1099","LIP_BALM_CANADA":"SPSV1016","LIP_BALM_BOX_CANADA":"MSPK1070","PACKAGED_LIP_BALM_CANADA":"SPSV1020","ONE_MONTH_KIT_CREAM_CARD_CANADA":"MSMM101C","ONE_MONTH_KIT_GEL_CARD_CANADA":"MSMM101G","ONE_MONTH_OF_SHAVING_CREAM_CANADA":"KKRB1064","ONE_MONTH_OF_SHAVING_GEL_CANADA":"KKRB1072","THREE_MONTHS_KIT_CREAM_CARD_CANADA":"MSMM103C","THREE_MONTHS_KIT_GEL_CARD_CANADA":"MSMM103G","THREE_MONTHS_OF_SHAVING_TRUMAN_BLUE_CREAM_CANADA":"KKRB1065","THREE_MONTHS_OF_SHAVING_TRUMAN_IVORY_CREAM_CANADA":"KKRB1066","THREE_MONTHS_OF_SHAVING_TRUMAN_OLIVE_CREAM_CANADA":"KKRB1067","THREE_MONTHS_OF_SHAVING_TRUMAN_ORANGE_CREAM_CANADA":"KKRB1068","THREE_MONTHS_OF_SHAVING_TRUMAN_BLUE_GEL_CANADA":"KKRB1073","THREE_MONTHS_OF_SHAVING_TRUMAN_IVORY_GEL_CANADA":"KKRB1074","THREE_MONTHS_OF_SHAVING_TRUMAN_OLIVE_GEL_CANADA":"KKRB1075","THREE_MONTHS_OF_SHAVING_TRUMAN_ORANGE_GEL_CANADA":"KKRB1076","SIX_MONTHS_KIT_CREAM_CARD_CANADA":"MSMM106C","SIX_MONTHS_KIT_GEL_CARD_CANADA":"MSMM106G","SIX_MONTHS_OF_SHAVING_WINSTON_CREAM_CANADA":"KKRB1069","SIX_MONTHS_OF_SHAVING_WINSTON_GEL_CANADA":"KKRB1077","TWELVE_MONTH_KIT_CREAM_CARD_CANADA":"MSMM112C","TWELVE_MONTH_KIT_GEL_CARD_CANADA":"MSMM112G","TWELVE_MONTH_KIT_WINSTON_ICE_BLUE_CREAM_CANADA":"KKRB1070","TWELVE_MONTH_KIT_WINSTON_CHARCOAL_CREAM_CANADA":"KKRB1071","TWELVE_MONTH_KIT_WINSTON_ICE_BLUE_GEL_CANADA":"KKRB1078","TWELVE_MONTH_KIT_WINSTON_CHARCOAL_GEL_CANADA":"KKRB1079","REFILL_PACK_DISCOUNTED":"DPRB0024","H5_FOUR_PACK":"DPRB0002","H5_EIGHT_PACK":"DPRB0003","H5_TWELVE_PACK":"DPRB0004","H5_SIXTEEN_PACK":"DPRB0005","REFILL_PACK_DISCOUNTED_CANADA":"DPRB1024","H5_FOUR_PACK_CANADA":"DPRB1002","H5_EIGHT_PACK_CANADA":"DPRB1003","H5_TWELVE_PACK_CANADA":"DPRB1004","H5_SIXTEEN_PACK_CANADA":"DPRB1005","REFILL_PACK_ONE":"DPRB0051","REFILL_PACK_ONE_GEL":"DPRB0052","REFILL_PACK_ONE_SENSITIVE":"DPRB0053","REFILL_PACK_ONE_GEL_SENSITIVE":"DPRB0054","REFILL_PACK_ONE_CANADA":"DPRB1051","REFILL_PACK_ONE_GEL_CANADA":"DPRB1052","REFILL_PACK_ONE_SENSITIVE_CANADA":"DPRB1053","REFILL_PACK_ONE_GEL_SENSITIVE_CANADA":"DPRB1054","SHAVE_PLAN_8_BLADE_2_CREAM_EVERYDAY":"DPRB0222","SHAVE_PLAN_8_BLADE_2_CREAM_OCCASIONAL":"DPRB0224","SHAVE_PLAN_8_BLADE_2_CREAM_INFREQUENT":"DPRB0226","SHAVE_PLAN_8_BLADE_2_CREAM_EVERYDAY_CANADA":"DPRB1222","SHAVE_PLAN_8_BLADE_2_CREAM_OCCASIONAL_CANADA":"DPRB1224","SHAVE_PLAN_8_BLADE_2_CREAM_INFREQUENT_CANADA":"DPRB1226"};
    Harrys.ACTIVE_TESTS = ["20150908_tv_test"];
    Harrys.PO_BOX_REGEX = /(P(ost)?[.\s/-]*O(ffice)?[.\s-]*(box).*|^(post[.\s]*)?box[.\s]*[#0-9]+|\bP[.\s]*O[.\s]*B[.\s]*[#0-9]*|P[.\s]*O[.\s]*[#0-9]+)/i;
    Harrys.APO_FPO_CODES = ["AA","AE","AP"];
</script>

    <script src="../../assets/mobile/global/init-25f66993529c1d1c5d7f96f120476699.js" type="text/javascript"></script>
    
        <script src="../../assets/shared/auto_refill_build/init-cf29d24bd9f607a3f7584a00fb318bbf.js" type="text/javascript"></script>
    <script>
        var ACCORDION_DATA = ACCORDION_DATA || {};
        ACCORDION_DATA['timing'] = [{"name":"everyday","shaves":"5-7 days\u003Cbr\u003E per week","value":"60","interval":2},{"name":"occasional","shaves":"2-4 days\u003Cbr\u003E per week","value":"90","interval":3},{"name":"infrequent","shaves":"1 day per\u003Cbr\u003E week or less","value":"150","interval":5}];
    </script>
    <script>
        var ACCORDION_DATA = ACCORDION_DATA || {};
        ACCORDION_DATA['bundle'] = [{"value":"blades","title":"Blades Only","overlay_text":"","cost":15,"non_bundle_cost":null,"includes":["8 Harry's Blades"],"image":"https://harrys-a.akamaihd.net/assets/auto-refill/small-blades-2563b94070cf97e92a1a1bcd1100c3bb.jpg","uid":"KKRB0097"},{"value":"blades-gel","title":"Blades \u0026 Gel","overlay_text":"Most Popular","cost":30,"non_bundle_cost":31,"includes":["8 Harry's Blades","2 Foaming Shave Gels"],"image":"https://harrys-a.akamaihd.net/assets/auto-refill/small-blades-gel-973a620088fc942cee5123288e8a5b06.jpg","uid":"KKRB0098"},{"value":"blades-gel-aftershave","title":"Blades, Gel \u0026 Aftershave","overlay_text":"","cost":38,"non_bundle_cost":39,"includes":["8 Harry's Blades","2 Foaming Shave Gels","1 After Shave Moisturizer"],"image":"https://harrys-a.akamaihd.net/assets/auto-refill/small-blades-gel-aftershave-ddf901eb887f7d0308c02401e6dfcfb8.jpg","uid":"KKRB0099"}];
    </script>
    <script>
        var ACCORDION_DATA = ACCORDION_DATA || {};
        ACCORDION_DATA['handle'] = [{"value":"Olive 107","image":"https://harrys-a.akamaihd.net/assets/auto-refill/olive-107-review-d26cac316b50814157482f2f35ba5bd1.jpg","uid":"HPRB0009"},{"value":"Nautilus Blue","image":"https://harrys-a.akamaihd.net/assets/auto-refill/nautilus-blue-review-7c83cb5bf8c025873b6cd94fb9e0fedf.jpg","uid":"HPRB0007"},{"value":"Total Orange","image":"https://harrys-a.akamaihd.net/assets/auto-refill/total-orange-review-b7f5ae4ea8559ce8c744c78dbb9ce332.jpg","uid":"HPRB0010"},{"value":"Ivory","image":"https://harrys-a.akamaihd.net/assets/auto-refill/ivory-review-32b1910b511b63cfaf914f0da1354469.jpg","uid":"HPRB0008"}];
    </script>

    <script type="text/javascript">
        Harrys.smart_app_banner = new SmartAppBanner();
    </script>
</body>
</html>
