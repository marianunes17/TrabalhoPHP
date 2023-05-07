<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $eliminarReservas =  mysqli_query($conn, "DELETE r FROM reservas r
                                              JOIN animais a
                                              ON r.idAnimal = a.id 
                                              WHERE a.idDono=$idutilizador");

    $eliminarAnimal =  mysqli_query($conn, "DELETE a FROM animais a WHERE a.idDono=$idutilizador");

    $aeliminarUtilizador =  mysqli_query($conn, "DELETE u FROM utilizadores u WHERE u.id=$idutilizador");

    if (!$eliminarReservas) {
        echo ("Erro: " . $eliminarReservas($con));
    } else if (!$eliminarAnimal) {
        echo ("Erro: " . $eliminarAnimal($con));
    } else if (!$aeliminarUtilizador) {
        echo ("Erro: " . $aeliminarUtilizador($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
    }
}
