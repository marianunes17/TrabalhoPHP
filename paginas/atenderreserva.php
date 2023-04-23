<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_GET['id'])) {
    $idreserva = $_GET['id'];

    $sql = mysqli_query($conn, "UPDATE reservas SET atendido=1 WHERE id = '$idreserva'");
}

if ( !isset($_SESSION["nomeUtilizador"]) || ($_SESSION['tipo'] != 'funcionario') ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>