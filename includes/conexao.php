<?php

	$mysqli = new mysqli('localhost','user','pass','banco' );
	
	if (mysqli_connect_errno()) {
    	die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
	    exit();
	}
	
?>