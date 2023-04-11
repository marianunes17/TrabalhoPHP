<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$result = mysqli_query($conn, "SELECT * FROM utilizadores");

while ($row = mysqli_fetch_array($result)) {
    echo "ID: " .  $row["id"] .". Nome: " . $row["nome"] . ". Email: " . $row["email"] . ". Telefone: " . $row["telemovel"] .". Tipo: " . $row["tipo"] . " <br>";
}

echo $row["id"] ;

mysqli_free_result($result);


echo "<br> <br> <br> <br> ";


$result1 = mysqli_query($conn, "SELECT * FROM utilizadores where id=5");
if (!$result1) {
    echo 'Could not run query: ' . mysqli_error();
    exit;
}
$row = mysqli_fetch_row($result1);
echo "ID: " .  $row[0] .". Nome: " . $row[1] . ". Email: " . $row[2] . ". Telefone: " . $row[3] .". Tipo: " . $row[4] . " <br>";


?>
