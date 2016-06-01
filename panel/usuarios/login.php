<?php	
	require_once("../../conexion.php");
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Login | Dashboard | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="../css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="../css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="../css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="../css/compiled/signup.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="header">
        <a href="../../">
            <img src="../img/logo.png" class="logo" alt="logo" />
        </a>
    </div>
    <form action="logueo-panel" method="post">
		<div class="login-wrapper">
			<div class="box">
				<div class="content-wrap">
					<h6>LogIn</h6>
					<input class="form-control" type="text" name="user" placeholder="E-mail">
					<input class="form-control" type="password" name="pass" placeholder="Password">
					<!--<input class="form-control" type="password" placeholder="Confirm Password">-->
					<div class="action">
						<input type="submit" class="btn-glow primary signup" value="Ingresar">
					</div>                
				</div>
			</div>
		</div>
	</form>
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>