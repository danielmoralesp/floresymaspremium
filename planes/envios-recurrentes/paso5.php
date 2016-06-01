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
    <title>Paso 5 | FloresyMas Premium</title>
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
		window.location = "paso5-m.php?id_pedidos_plan_continuidad=<?php echo $id_pedidos_plan_continuidad?>&id_usuario=<?php echo $id_usuario?>";
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
			<section class="bundle-section complete closed" data-section="Input" data-name="bundle" data-default-value="blades-gel">
				<a href="paso4.php?id_pedidos_plan_continuidad=<?php echo $reg['id_pedidos_plan_continuidad'];?>">
				<div class="header">
					<h2>
						<span class="num">4.</span>
						<span class="incomplete-headline active">
							Pedido lo Recibe <?php echo $reg['nombre_de_quien_recibe'];?>		
						</span>						
						<span class="complete-headline">
							You chose <em data-name="title"></em>.
						</span>
					</h2>
				</div>
				</a>
			</section>
			<section class="review-section " data-section="Review" data-name="review" style="height: 632px;">
				<div class="header">
					<h2>
						<span class="num">5.</span>
						<span class="headline">Carrito de Compras</span><br>
					</h2>
				</div><br>
				<form name="form" accept-charset="UTF-8" action="https://gateway.payulatam.com/ppp-web-gateway/" method="post" >
				<div class="content">
					<table class="table">
						<thead>
							<tr>
								<th class="item" colspan="2">
									Item
								</th>
								<th class="frequency">
									Frecuencia
								</th>
								<th class="frequency">
									<?php echo chao_tilde('No. Entregas')?>
								</th>
								<th class="month-price">
									Precio / Descuento
								</th>
								<th class="ship-price">
									Total
								</th>
							</tr>
						</thead>
						<tbody class="tbody">
							<tr>         
								<td class="image">             
									<img src="../../panel/img/colores/<?php echo $reg['color_de_rosas'];?>.png">         
								</td>   
								<td class="item">             
									<p class="name">
										<?php echo $reg['unidades_de_rosas'];?>            
									</p>             
									<p class="more-info">                                      
										<?php echo $reg['color_de_rosas'];?><br> 
									</p> 
									<p class="more-info">                                      
										<?php echo chao_tilde('Plan a 1 Año<br> ')?>
									</p> 
								</td>         
								<td class="frequency">             
									<?php echo $reg['frecuencia_de_entrega'];?>  / <br><?php echo $reg['numero_productos'];?>       
								</td>
								<td class="frequency">
									<?php echo $num_entregas?>  / <?php echo chao_tilde('Año ')?>    <br/>	
								</td>  
								<td class="month-price">
									<?php
									$sin_descuento=($valor_unidades_rosas*$num_entregas*$numero_productos)/12;	
									?>
									<?php echo number_format($sin_descuento);  ?> /   <?php echo $descuento ?>%
								</td>         
								<td class="ship-price">
									<?php 
										$porcentaje=$descuento/100;
										$valor_descuento=$porcentaje*$sin_descuento;
										$valor_descuento2=$sin_descuento-$valor_descuento;
										$total=$valor_descuento2;
										
										$iva=16/100;
										$valor_iva=$iva*$total;
										$valor_iva2=$total-$valor_iva;

									?>
									$<?php echo number_format($total); ?>    
								</td>  
							</tr>
						</tbody>
						<tfoot>
								<tr>
									<td class="today" colspan="6">
										Total <span class="total">$<?php echo number_format($total);  ?></span>/ Mes   <br>
										<span class="saving"><?php echo chao_tilde('Usted Está Ahorrando')?> <span class="save-amount">$<?php echo number_format($valor_descuento);?></span>/ Mes</span>
									</td>
								</tr>
						</tfoot>
					</table>
					<?php			
						$ApiKey = "20c7scfcmr6qrj4uto3s28t6o4";
						$merchant_id = "504830";
						$referenceCode = $reg['id_pedidos_plan_continuidad'];
						$total = $total;
						$amount= number_format($total,1,'.','');
						$currency = "COP";
						$firma_cadena= "$ApiKey~$merchant_id~$referenceCode~$amount~$currency";
						$firmacreada = md5($firma_cadena);					
					?>
						<center>
							<input type="submit" class="button blue medium bottom" value="Comprar">
						</center>						
						<input type="hidden" name="merchantId" value="504830"/>
						<input type="hidden" name="ApiKey" value="20c7scfcmr6qrj4uto3s28t6o4"/>
						<input type="hidden" name="referenceCode" value="<?php echo $reg["id_pedidos_plan_continuidad"];?>"/>
						<input type="hidden" name="accountId" value="505794"/>
						<input type="hidden" name="description" value="<?php echo $reg["unidades_de_rosas"];?>"/>
						<input type="hidden" name="amount" value="<?php echo $total?>"/>
						<input type="hidden" name="tax" value="<?php echo $valor_iva?>"/>
						<input type="hidden" name="taxReturnBase" value="<?php echo $valor_iva2?>"/>
						<input type="hidden" name="currency" value="COP"/>
						<input type="hidden" name="signature" value="<?php echo $firmacreada;?>"/> 
						<input type="hidden" name="test" value="0"/>
						<?php
							$sql2="select * from usuarios where id_usuario='".$_GET["id_usuario"]."'";			
							$res2 = mysql_query($sql2,$con);	
							if($reg2 = mysql_fetch_array($res2)){
						?>
						<input type="hidden" name="buyerEmail" value="<?php echo $reg2["user"];?>"/>
						<?php
							}
						?> 						 
						<input type="hidden" name="id_usuario" value="<?php echo $_GET["id_usuario"];?>"/>
						<input type="hidden" name="id_pedidos_plan_continuidad" value="<?php echo $_GET["id_pedidos_plan_continuidad"];?>"/>						
				</form>
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
