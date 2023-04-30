<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_GET['id'])) {
    $idReserva = $_GET['id'];

    $atenderReserva = mysqli_query($conn, "UPDATE reservas SET atendido=1 WHERE id =$idReserva");

    if (!$atenderReserva) {
        echo ("Erro: " . $atenderReserva($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
    }
}

if (!isset($_SESSION["nomeUtilizador"]) || ($_SESSION['tipo'] != 'funcionario')) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
