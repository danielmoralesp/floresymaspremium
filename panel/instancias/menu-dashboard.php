<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==2){
		require_once("../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>

	<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li>
                <a href="http://floresymaspremium.com/panel/pedidos/pedidos">
                    <i class="icon-group"></i>
                    <span>Pedidos</span>
                </a>
            </li>
			<!--<li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="http://www.floresymas.co/panel">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>-->
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Suscripción</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="http://www.floresymaspremium.com/panel/pedidos/pedidos-recurrentes">Regular Delivery</a></li>
                    <!--<li><a href="">Special Ocasions</a></li>
                    <li><a href="">Jus Because</a></li>
					<li><a href="">Personalizado</a></li>
					<li><a href="">Bloom of The Month</a></li>
					<li><a href="">Paquete Decoracion</a></li>-->
                </ul>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>Pedido Nuevo</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="http://floresymaspremium.com/panel/pedidos/nuevo-pedido">Normal</a></li>
                    <li><a href="http://floresymaspremium.com/panel/pedidos/nuevo-pedido-recurrente">Recurrente</a></li>
                </ul>
            </li>
			<li>
                <a href="http://floresymaspremium.com/panel/clientes/">
                    <i class="icon-group"></i>
                    <span>Clientes</span>
                </a>
            </li>
			
			<!--<li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Catalogo</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
					<li><a href="catalogo/listado-productos">Productos</a></li>
                </ul>
            </li> 	
			<li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Inventarios</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
					<li><a href="inventario/listado-inventario">Inventario</a></li>
                </ul>
            </li>  	
			<li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Datos</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="funnels">Ingresar Funnel</a></li>
                    <li><a href="gastos">Ingresar Gastos</a></li>
                </ul>
            </li>            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-signal"></i>
                    <span>Reportes</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="reporte-ingresos-y-gastos">Ingresos y Gastos</a></li>
                    <li><a href="reporte-funnels">Funnel</a></li>
					<li><a href="reporte-estado-de-resultados">Estado Resultados</a></li>
					<li><a href="reporte-pedidos">Reporte Pedidos</a></li>
                </ul>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-cog"></i>
                    <span>Emails</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="emails-pendientes">de Pendientes</a></li>
                    <li><a href="emails-realizados">de Realizados</a></li>
					<li><a href="emails-abortados">de Abortados</a></li>
                </ul>
            </li>
			<!--<li>
                <a href="gallery.html">
                    <i class="icon-code-fork"></i>
                    <span>Estadísticas</span>
                </a>
            </li>
			<!--
			<li>
                <a class="dropdown-toggle ui-elements" href="#">
                    <i class="icon-code-fork"></i>
                    <span>Estadísticas</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="ui-elements.html">UI Elements</a></li>
                    <li><a href="icons.html">Icons</a></li>
                </ul>
            </li>
            
            <li>
                <a href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>            
            
            <li>
                <a href="personal-info.html">
                    <i class="icon-cog"></i>
                    <span>My Info</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-share-alt"></i>
                    <span>Extras</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="code-editor.html">Code editor</a></li>
                    <li><a href="grids.html">Grids</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
	
	<?php
		}
	}else{
			?>
	<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li>
                <a href="http://floresymaspremium.com/panel/pedidos/pedidos">
                    <i class="icon-group"></i>
                    <span>Pedidos</span>
                </a>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Suscripción</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="http://www.floresymaspremium.com/panel/pedidos/pedidos-recurrentes">Regular Delivery</a></li>
                    <!--<li><a href="">Special Ocasions</a></li>
                    <li><a href="">Jus Because</a></li>
					<li><a href="">Personalizado</a></li>
					<li><a href="">Bloom of The Month</a></li>
					<li><a href="">Paquete Decoracion</a></li>-->
                </ul>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>Pedido Nuevo</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="http://floresymaspremium.com/panel/pedidos/nuevo-pedido">Normal</a></li>
                    <li><a href="http://floresymaspremium.com/panel/pedidos/nuevo-pedido-recurrente">Recurrente</a></li>
                </ul>
            </li>
			<li>
                <a href="http://floresymaspremium.com/panel/clientes/">
                    <i class="icon-group"></i>
                    <span>Clientes</span>
                </a>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span>Catalogo</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
					<li><a href="http://floresymaspremium.com/panel/catalogo/listado-productos">Productos</a></li>
                </ul>
            </li> 
			<li>
                <a class="dropdown-toggle" href="http://floresymaspremium.com/panel/reportes/pedidos">
                    <i class="icon-group"></i>
                    <span>Reportes</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">					
					<li><a href="http://floresymaspremium.com/panel/reportes/pedidos">Pedidos</a></li>
                    <li><a href="http://floresymaspremium.com/panel/reportes/ventas">Ventas</a></li>
                    <li><a href="http://floresymaspremium.com/panel/clientes">Clientes</a></li>
                    <li><a href="http://floresymaspremium.com/panel/reportes/mensuales">Mensuales</a></li>
                    <li><a href="http://floresymaspremium.com/panel/reportes/proyecciones.php">Proyecciones</a></li>
					<!--<li><a href="../catalogo/floresymaspremium/listado-productos">Premium</a></li>-->
                </ul>
            </li>
			<!--<li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Inventarios</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
					<li><a href="../inventario/listado-inventario">Inventario</a></li>
                </ul>
            </li> 
			
			
			<li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="http://www.floresymas.co/panel">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
			<li>
                <a href="nuevo-pedido">
                    <i class="icon-edit"></i>
                    <span>Pedido Nuevo</span>
                </a>
            </li>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Suscripción</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="pedidos/pedidos-recurrentes">Regular Delivery</a></li>
                    <!--<li><a href="">Special Ocasions</a></li>
                    <li><a href="">Jus Because</a></li>
					<li><a href="">Personalizado</a></li>
					<li><a href="">Bloom of The Month</a></li>
					<li><a href="">Paquete Decoracion</a></li>
                </ul>
            </li>
				
			<li>
                <a class="dropdown-toggle" href="tables.html">
                    <i class="icon-th-large"></i>
                    <span>Datos</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="funnels">Ingresar Funnel</a></li>
                    <li><a href="gastos">Ingresar Gastos</a></li>
                </ul>
            </li> 
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-cog"></i>
                    <span>Emails</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="emails-pendientes">de Pendientes</a></li>
                    <li><a href="emails-realizados">de Realizados</a></li>
					<li><a href="emails-abortados">de Abortados</a></li>
                </ul>
            </li>
			<!--<li>
                <a href="gallery.html">
                    <i class="icon-code-fork"></i>
                    <span>Estadísticas</span>
                </a>
            </li>
			<!--
			<li>
                <a class="dropdown-toggle ui-elements" href="#">
                    <i class="icon-code-fork"></i>
                    <span>Estadísticas</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="ui-elements.html">UI Elements</a></li>
                    <li><a href="icons.html">Icons</a></li>
                </ul>
            </li>
            
            <li>
                <a href="calendar.html">
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>            
            
            <li>
                <a href="personal-info.html">
                    <i class="icon-cog"></i>
                    <span>My Info</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-share-alt"></i>
                    <span>Extras</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="code-editor.html">Code editor</a></li>
                    <li><a href="grids.html">Grids</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                </ul>
            </li>-->
        </ul>
    </div>		
			
			
	<?php
		}	
?>