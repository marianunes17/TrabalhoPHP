<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

if (isset($_POST['atualizar'])) {
    $nomeutilizador = $_POST['nome'];
    $emailutilizador = $_POST['email'];
    $telemovelutilizador = $_POST['telemovel'];
    $tipoutilizador = $_POST['tipo'];
    $idutilizador = $_POST['id'];


    $alteraUtilizador = ("UPDATE utilizadores SET nome = '$nomeutilizador',
        email='$emailutilizador', telemovel=$telemovelutilizador,
        tipo='$tipoutilizador' WHERE id=$idutilizador"
    );
    $result = $conn->query($alteraUtilizador);
}

if (isset($_GET['id'])) {
    $idutilizador = $_GET['id'];

    $sql = ("SELECT * FROM utilizadores WHERE id='$idutilizador'");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idutilizador = $row['id'];
            $nomeutilizador = $row['nome'];
            $emailutilizador = $row['email'];
            $telemovelutilizador = $row['telemovel'];
            $tipoutilizador = $row['tipo'];
        }
    }
}
?>

<title> PetShop | Editar utilizador
    <?php echo $nomeutilizador ?>
</title>

<body>
    <?php require 'header.php'; ?>


    <div class="container-fluid bg-light pt-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="gestao.php">Gestão de Utilizadores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Utilizador</li>
                </ol>
            </nav>


            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 mb-5">
                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">

                            <input type="text" class="invisible" name="id" class="form-control p-4 text-capitalize"
                                placeholder="id" />

                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Nome: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="text" name="nome" class="form-control p-4 text-capitalize"
                                            placeholder="Nome" required="required"
                                            data-validation-required-message="Nome" <?php echo "value='" . $nomeutilizador . "'"; ?> />
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
                                        <input type="email" name="email" class="form-control p-4" placeholder="Email"
                                            required="required" data-validation-required-message="Email" <?php echo "value='" . $emailutilizador . "'"; ?> />
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
                                        <input type="telemovel" name="telemovel" class="form-control p-4"
                                            placeholder="Telemovel" required="required"
                                            data-validation-required-message="Telemóvel" <?php echo "value='" . $telemovelutilizador . "'"; ?> />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="row justify-content-center  ">
                                    <div class="col-1 align-self-center">
                                        <label> Tipo: </label>
                                    </div>
                                    <div class="col-11">
                                        <input type="tipo" name="tipo" class="form-control p-4" placeholder="Telemovel"
                                            required="required" data-validation-required-message="Tipo" <?php echo "value='" . $tipoutilizador . "'"; ?> />
                                        <p class="help-block text-danger"> </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton"
                                    name='atualizar'>Guardar</button>
                                <a class="btn btn-primary py-3 px-5" id="sendMessageButton"
                                    href="gestao.php">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>