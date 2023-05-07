<?php
require 'head.php';
require_once('../basedados/basedados.h');


if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}


if (isset($_GET['id'])) {
    $idAnimal = $_GET['id'];

    $eliminarAnimal =  mysqli_query($conn, "DELETE FROM animais WHERE id=$idAnimal");
    $eliminarReservas =  mysqli_query($conn, "DELETE r FROM reservas r
                                              JOIN animais a
                                              ON r.idAnimal = a.id 
                                              WHERE r.idAnimal=$idAnimal");


    //Verifica se há erros na consulta
    if (!$eliminarAnimal) {
        echo ("Erro: " . $eliminarAnimal($con));
    } else if (!$eliminarReservas) {
        echo ("Erro: " . $eliminarReservas($con));
    } else {
        echo '<meta http-equiv="refresh" content="0; url=dadosPessoais.php">';
    }
}