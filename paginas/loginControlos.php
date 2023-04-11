<?php
require 'head.php';
require_once('../basedados/basedados.h');



$utilizador = $_POST['nome'];
$password = $_POST['password'];


$sql = "SELECT * FROM utilizadores WHERE 
        nome='$utilizador' AND password='$password' ";
$retval = mysqli_query($conn, $sql);

if (!$retval) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}


if (($row = mysqli_fetch_array($retval)) != null) {
    $_SESSION['nome'] = $utilizador;
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['telemovel'] = $row['telemovel'];
    $_SESSION['tipo'] = $row['tipo'];
    $_SESSION['id'] = $row['id'];
    
    //header("Location:index.php"); // Ir para a página do Home
    
		echo '<meta http-equiv="refresh" content="2; url=index.php">';
} else {
    header("Refresh:0.1; Login.php");
		}
