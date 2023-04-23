<?php
require 'head.php';
require_once('../basedados/basedados.h');


if (isset($_GET['id'])) {
    $idReserva = $_GET['id'];

    $sql =  mysqli_query($conn, "DELETE FROM reservas WHERE id='$idReserva'");
}

if (!isset($_SESSION["nomeUtilizador"]) ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

//echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
?>