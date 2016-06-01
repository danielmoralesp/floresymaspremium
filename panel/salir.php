<?php
	session_start();
		unset($_SESSION["usuario"]);
		session_destroy();
		//devuelvo el usuario al formulario
		header("Location: login");



?>