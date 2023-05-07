<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

$reservas = mysqli_query($conn, "SELECT DISTINCT 
                                 r.*, a.nomeAnimal, s.nomeServico
                                 FROM reservas r
                                 INNER JOIN servicos s
                                 ON r.idServico = s.id 
                                 INNER JOIN animais a
                                 ON r.idAnimal = a.id
                                 WHERE a.idDono=" . $_SESSION["id"] . "
                                 ORDER BY r.dataInicio DESC");


if (!$reservas) {
    echo ("Erro: " . $reservas($con));
} 
?>
<title> PetShop | Reservas Feitas </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary">Reservas</span> </h1>
            </div>
            <a type="button" class="btn btn-primary float-right" href="adicionarreserva.php">Adicionar</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Animal</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Fim</th>
                        <th scope="col">Serviço</th>
                        <th scope="col"></th>
                        <th scope="col"></th> 
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($reservasInfo = mysqli_fetch_array($reservas)) {
                    ?>

                        <tr>
                            <td scope="row">
                                <?php echo $reservasInfo['nomeAnimal'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $reservasInfo['dataInicio'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $reservasInfo['dataFim'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $reservasInfo['nomeServico'] ?>
                            </td>


                            <?php
                            if ($reservasInfo['atendido'] == 0) {
                                echo '
                            <td scope="row">
                            <a type="button" class="btn btn-primary" href="editarReserva.php?id=' . $reservasInfo['id'] . '">Editar</a>
                             </td>

                             
                            <td scope="row">
                            <a type="button" class="btn btn-primary" href="editarReserva.php?id=' . $reservasInfo['id'] . '">Eliminar</a>
                             </td>
                            ';
                            } else {
                                echo '
                                <td scope="row">
                                <a type="button" disabled class="btn btn-primary">Editar</a>
                                 </td>
    
                                 
                                <td scope="row">
                                <a type="button" disabled class="btn btn-primary">Eliminar</a>
                                 </td>
                                ';
                            }
                            ?>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>