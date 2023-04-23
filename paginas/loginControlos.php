<?php
require 'head.php';
require_once('../basedados/basedados.h');

$utilizador = $_POST['nome'];
$password = $_POST['password'];

$sqlLogin = "SELECT * FROM utilizadores WHERE 
        nomeUtilizador='$utilizador' AND password='$password' ";
$sqlLoginInfo = mysqli_query($conn, $sqlLogin);

if (!$sqlLoginInfo) {
  die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

if (($row = mysqli_fetch_array($sqlLoginInfo)) != null) {
  $_SESSION['nomeUtilizador'] = $utilizador;
  $_SESSION['password'] = $row['password'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['telemovel'] = $row['telemovel'];
  $_SESSION['tipo'] = $row['tipo'];
  $_SESSION['id'] = $row['id'];

  echo '<meta http-equiv="refresh" content="2; url=index.php">';
} else {
  header("Refresh:0.1; Login.php");
}
