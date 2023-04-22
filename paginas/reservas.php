<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$reservas = mysqli_query($conn, "SELECT * FROM reservas r
                                 JOIN animais a
                                 ON r.idAnimal = a.id AND 
                                 a.idDono='" . $_SESSION["id"] . "'");
$reservasInfo = mysqli_fetch_array($reservas);



$animais = mysqli_query($conn, "SELECT * FROM animais a
                                JOIN utilizadores u    
                                WHERE a.idDono='" . $_SESSION["id"] . "'");
$animaisInfo = mysqli_fetch_array($animais);


$servico = mysqli_query($conn, "SELECT * FROM servicos s
                                JOIN reservas r
                                ON  s.id = r.idServico
                                JOIN animais a
                                ON r.idAnimal = a.id AND
                                a.idDono ='" . $_SESSION["id"] . "'");
$servicoInfo = mysqli_fetch_array($servico);
?>
<title> PetShop | Reservas </title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">
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
                    while ($reservasInfo = mysqli_fetch_array($reservas)) {
                    ?>

                        <tr>
                            <td scope="row">
                                <?php echo $animaisInfo['nomeAnimal'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $reservasInfo['dataInicio'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $reservasInfo['dataFim'] ?>
                            </td>
                            <td scope="row">
                                <?php echo $servicoInfo['nomeServico'] ?>
                            </td>

                            <!-- 
                            <td scope="row"> <a type="button" class="btn btn-primary" href="editarutilizador.php?id=<?php echo $reserva['id']; ?>">Editar</a>
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