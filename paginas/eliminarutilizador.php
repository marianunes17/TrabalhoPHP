<?php
require 'head.php';
require_once('../basedados/basedados.h');

//se a variavel nao foi iniciada vai para o index
if (!isset($_SESSION["nomeUtilizador"]) || $_SESSION["nomeUtilizador"] != 'admin' ) {
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
        echo ("Erro ao eliminar todas as reservas do utilizador: " . $eliminarReservas($con));
    } else if (!$eliminarAnimal) {
        echo ("Erro ao eliminar todos os animais do utilizador: " . $eliminarAnimal($con));
    } else if (!$aeliminarUtilizador) {
        echo ("Erro ao eliminar o utilizador: " . $aeliminarUtilizador($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
    }
}
