<?php
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$banco = "blog";

	define("SALT", '$2a$08$Cf1f11ePArKlBJomM0F6aJ$');
	define("RECAPTCHA_SECRET", "6LfaXwAqAAAAANk6SAZL8L1enmEP48o_03Cv-3vV");
		
		
	$conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	or die ("Problemas com a conexão do Banco de Dados");
	$conexao -> set_charset("utf8");
?>
