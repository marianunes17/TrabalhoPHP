<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');


if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $sql =  "DELETE FROM utilizadores WHERE id='$idutilizador'";


    $result = $conn->query ($sql);

}
?>