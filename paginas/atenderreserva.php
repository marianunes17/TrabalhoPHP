<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');


if (isset($_GET['id'])) {
    $idreserva = $_GET['id'];


    $sql = ("UPDATE reservas SET atendido=1 WHERE id = '$idreserva'");


    $result = $conn->query($sql);

}
?>