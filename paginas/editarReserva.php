<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}


if (isset($_POST['atualizar'])) {
    $idReserva = $_POST['idReserva'];
    $dataInicio = $_POST['dataInicio'];
    $idServico = $_POST['idServico'];

    if ($idServico == 1 ||  $idServico == 3) {
        $alteraReserva = mysqli_query($conn, "UPDATE reservas SET id = $idReserva, dataInicio='$dataInicio', dataFim=date_add(dataInicio, INTERVAL 30 MINUTE), idServico='$idServico' WHERE id=$idReserva");
    } else {
        $alteraReserva = mysqli_query($conn, "UPDATE reservas SET id = $idReserva, dataInicio='$dataInicio', dataFim=date_add(dataInicio, INTERVAL 1 HOUR), idServico='$idServico' WHERE id=$idReserva");
    }


    if (!$alteraReserva) {
        echo ("Erro ao editar a reserva: " . $alteraReserva($con));
    } else {

        if ($_SESSION["tipo"] == 'admin') {
            echo '<meta http-equiv="refresh" content="0; url=gestao.php">';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=reservas.php">';
        }
    }
}

if (isset($_GET['id'])) {
    $idReserva = $_GET['id'];
    $idUtilizador = $_SESSION['id'];

    if ($_SESSION["tipo"] != 'admin') {
        $reservasUtilizador = mysqli_query($conn, "SELECT * FROM animais a INNER JOIN reservas r ON r.idAnimal = a.id WHERE a.idDono='$idUtilizador' AND atendido=0 ");

        $verifica = false;

        while ($reservasInfo = mysqli_fetch_array($reservasUtilizador)) {
            if ($reservasInfo['id'] == $idReserva) {
                $verifica = true;
                break;
            }
        }

        if ($verifica == false) {
            echo '<meta http-equiv="refresh" content="0; url=reservas.php">';
        }
    }
    $reservas = mysqli_query($conn, "SELECT * FROM reservas WHERE id='$idReserva'");

    if ($reservas->num_rows > 0) {
        while ($row = $reservas->fetch_assoc()) {
            $idReserva = $row['id'];
            $dataInicio = $row['dataInicio'];
            $idServico = $row['idServico'];
        }
    }
}
?>

<title> PetShop | Editar Reserva
</title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary text-capitalize">Editar Reserva </span> </h1>
            </div>

            <div class="contact-form">
                <form method="POST">

                    <input type="text" class="invisible" name="idReserva" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idReserva . "'"; ?> />

                    <div class="control-group pb-3">
                        <div class="row justify-content-center">
                            <div class="col-1 align-self-center">
                                <label> Data: </label>
                            </div>
                            <div class="col-11">
                                <input type="datetime-local" min="12:00" max="18:00" name="dataInicio" class="form-control border-0 p-4 text-capitalize" placeholder="Data" <?php echo "value='" . $dataInicio . "'"; ?> required />
                            </div>
                        </div>
                    </div>

                    <input type="text" class="invisible" name="idServico" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idServico . "'"; ?> />

                    <div class="control-group">
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='atualizar'>Guardar</button>
                        <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="reservas.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>