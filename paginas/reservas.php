<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlReservas = mysqli_query($conn, "SELECT * FROM reservas r
                                 JOIN animais a
                                 ON r.idAnimal = a.id AND 
                                 a.idDono='" . $_SESSION["id"] . "'");
                                 
if ( !isset($_SESSION["nomeUtilizador"]) ) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

?>
<title> PetShop | Reservas </title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">

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
                                <?php echo $sqlReservas['nomeAnimal'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservas['dataInicio'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservas['dataFim'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $sqlReservas['nomeServico'] ?>
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