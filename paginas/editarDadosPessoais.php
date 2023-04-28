<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['atualizar'])) {
    $nomeutilizador = $_POST['nomeutilizador'];
    $emailutilizador = $_POST['email'];
    $passwordutilizador = $_POST['password'];
    $telemovelutilizador = $_POST['telemovel'];
    $idutilizador = $_POST['id'];

    $alteraUtilizador = ("UPDATE utilizadores SET nomeUtilizador = '$nomeutilizador', password = '$passwordutilizador',
    email='$emailutilizador', telemovel=$telemovelutilizador WHERE id=$idutilizador"
    );
    $result = $conn->query($alteraUtilizador);


    echo '<meta http-equiv="refresh" content="0; url=dadospessoais.php">';
}

if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $sql = ("SELECT * FROM utilizadores WHERE id='$idutilizador'");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idutilizador = $row['id'];
            $nomeutilizador = $row['nomeUtilizador'];
            $emailutilizador = $row['email'];
            $passwordutilizador = $row['password'];
            $telemovelutilizador = $row['telemovel'];
        }
    }
}

$utilizadores = mysqli_query($conn, "SELECT * FROM utilizadores");

if (!isset($_SESSION["nomeUtilizador"])) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Editar dados pessoais </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container py-5 px-4 px-sm-5">
            <div class="d-flex flex-column text-center">
                <h1 class="display-4 m-0"><span class="text-primary">Editar Dados Pessoais</span> </h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mb-5">
                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">

                            <input type="text" class="invisible" name="id" class="form-control p-4 text-capitalize" placeholder="id" <?php echo "value='" . $idutilizador . "'"; ?> />

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Nome: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="text" name="nomeutilizador" class="form-control p-4 text-capitalize" placeholder="Nome" required="required" data-validation-required-message="Nome" <?php echo "value='" . $nomeutilizador . "'"; ?> />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Email: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="email" name="email" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" <?php echo "value='" . $emailutilizador . "'"; ?> />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Password: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="password" name="password" class="form-control p-4" placeholder="Email" required="required" data-validation-required-message="Email" <?php echo "value='" . $emailutilizador . "'"; ?> />
                                    </div>
                                    <p class="help-block text-danger"> </p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Telemovel: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="telemovel" name="telemovel" class="form-control p-4" placeholder="Telemovel" required="required" data-validation-required-message="Telemóvel" <?php echo "value='" . $telemovelutilizador . "'"; ?> />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton" name='atualizar'>Guardar</button>
                                <a class="btn btn-primary py-3 px-5" id="sendMessageButton" href="dadospessoais.php">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>