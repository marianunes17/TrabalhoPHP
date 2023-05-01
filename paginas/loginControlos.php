<?php
require 'head.php';
require_once('../basedados/basedados.h');

$utilizador = $_POST['nome'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM utilizadores WHERE 
        nomeUtilizador='$utilizador' AND password='$password' ");

if (!$login) {
  echo ("Erro: " . $login($con));
}

if (($row = mysqli_fetch_array($login)) != null) {
  if( ($_SESSION['tipo'] = $row['tipo']) != null)  {
  $_SESSION['nomeUtilizador'] = $utilizador;
  $_SESSION['password'] = $row['password'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['telemovel'] = $row['telemovel'];
  $_SESSION['tipo'] = $row['tipo'];
  $_SESSION['id'] = $row['id'];

  echo '<meta http-equiv="refresh" content="0; url=index.php">';

} else {
  echo '<meta http-equiv="refresh" content="0; url=login.php">';
}

} else {
  echo '<meta http-equiv="refresh" content="0; url=login.php">';
}