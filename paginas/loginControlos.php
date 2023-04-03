<?php
require 'head.php';
require_once('../basedados/basedados.h');

session_start();

//Verificar se o utilizador já fez login
if (isset($_SESSION['nome']) || isset($_SESSION['password'])) {
    header("Location: login.php");
}


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
    $_SESSION['tipo'] = $row['tipo'];
 			
    echo "A autenticar...";
    header("Location:index.php"); // Ir para a página do Home

}
