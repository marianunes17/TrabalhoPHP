<?php
require 'head.php';
require_once('../basedados/basedados.h');


if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $sql =  mysqli_query($conn, "DELETE FROM utilizadores WHERE id='$idutilizador'");
}

if (!isset($_SESSION["nomeUtilizador"]) ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
