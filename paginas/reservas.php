<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlReservas = mysqli_query($conn, "SELECT DISTINCT  * FROM reservas r
                                    INNER JOIN servicos s
                                    ON r.idServico = s.id 
                                    INNER JOIN animais a
                                    ON r.idAnimal = a.id
                                    WHERE a.idDono=" . $_SESSION["id"] . "
                                    GROUP BY a.id");

if ( !isset($_SESSION["nomeUtilizador"]) ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
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
                        <!-- 
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th> 
                        -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($sqlReservasInfo = mysqli_fetch_array($sqlReservas)) {
                    ?>

                        <tr>
                            <td scope="row">
                                <?php echo $sqlReservasInfo['nomeAnimal'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservasInfo['dataInicio'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservasInfo['dataFim'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservasInfo['nomeServico'] ?>
                            </td>

                            <!-- 
                            <td scope="row"> <a type="button" class="btn btn-primary" href="editarutilizador.php?id=<?php echo $sqlReserva['id']; ?>">Editar</a>
                            </td>
                            <td scope="row"> <a type="button" class="btn btn-primary" href="eliminarutilizador.php?id=<?php echo $reserva['id']; ?>">Eliminar</a>
                            </td>
                            -->

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