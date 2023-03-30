<?php
//Conexão à base de dados
function coneccaoBD(){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if ($conn->connect_errno) {
            printf("<p>Erro na conecção: %d %s</p>", $conn->connect_errno);
            return false;
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

function obterServicos(){
    $conn = null;
    if (!($conn = coneccaoBD())) {
        exit();
    }

    $query = "SELECT * FROM servico";
    /*Obter os resultados dos produtos*/
    $result_set = $conn->query($query);

        
}

?>
