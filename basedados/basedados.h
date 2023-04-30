<?php
	//Conexão à base de dados
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
	$bdname = 'criar_bd';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $bdname);

    if ($conn->connect_errno) {
	   echo "Erro ao conectar ao MySQL.";
	   exit;
	}

	if(!($con = mysqli_select_db($conn, $bdname )))  {
		echo "Erro ao selecionar ao MySQL.";
		exit;
	}

	mysqli_set_charset($conn, "utf8");
    return $conn;

?>
