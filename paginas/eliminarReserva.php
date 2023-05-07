<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

if (isset($_GET['id'])) {
    $idReserva = $_GET['id'];

    $eliminarReserva =  mysqli_query($conn, "DELETE FROM reservas WHERE id=$idReserva");

    if (!$eliminarReserva) {
        echo ("Erro: " . $eliminarAnimal($con));
    } else {
        if ($_SESSION['tipo'] == 'admin') {
            echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=reservas.php">';
        }
    }
}