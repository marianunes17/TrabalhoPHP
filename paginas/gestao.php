<!DOCTYPE html>
<html>

<?php
require 'head.php';
require_once('../basedados/basedados.h');

$sqlUtilizadores = mysqli_query($conn, "SELECT * FROM utilizadores");

if (($_SESSION['tipo'] == "admin")) {
    $sqlReservas = mysqli_query($conn, "SELECT * FROM reservas r
    	                         INNER JOIN servicos s
                                 ON r.idServico = s.id 
                                 INNER JOIN animais a
                                 ON r.idAnimal = a.id");
} else {
    $sqlReservas = mysqli_query($conn, "SELECT * FROM reservas r
                                    INNER JOIN servicos s
                                    ON r.idServico = s.id 
                                    INNER JOIN animais a
                                    ON r.idAnimal = a.id
                                    JOIN servicosfuncionarios sf
                                    ON s.id = sf.idServico AND
                                    sf.idFuncionario='" . $_SESSION["id"] . "'");
}

if (!isset($_SESSION["nomeUtilizador"]) || ($_SESSION['tipo'] == 'cliente')) {
    echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>

<title> PetShop | Gerir </title>

<body>
    <?php require 'header.php'; ?>

    <div class="container-fluid bg-light pt-5">
        <div class="container">

            <!--Navbar-->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="reservas-tab" data-bs-toggle="tab" data-bs-target="#reservas" type="button" role="tab" aria-controls="reservas-tab" aria-selected="true">Gerir
                        Reservas</button>
                </li>

                <?php if (($_SESSION['tipo'] == "admin")) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="utilizadores-tab" data-bs-toggle="tab" href="#utilizadores" type="button" role="tab" aria-controls="utilizadores" aria-selected="false"> Gerir Utilizadores
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- -------------------------- RESERVAS -------------------------- -->
                <div class="tab-pane fade show active opacity-100 py-4" id="reservas" role="tabpanel" aria-labelledby="reservas-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Animal</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Fim</th>
                                <th scope="col">Serviço</th>
                                
                                <?php if (($_SESSION['tipo'] == "funcionario")) { ?>
                                <th scope="col">Atender</th>
                                <?php } ?>

                                <?php if (($_SESSION['tipo'] == "admin")) { ?>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar Reserva</th>
                                <?php } ?>

                                <!-- 
                                <th scope="col">Funcionário</th>
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
                                        <label class='text-capitalize font-weight-normal'>
                                            <?php echo $sqlReservasInfo['nomeAnimal']; ?>
                                        </label>
                                    </td>
                                    <td scope="row">
                                        <?php echo "<label class='text-capitalize font-weight-normal'>" . $sqlReservasInfo['dataInicio'] . " </label>"; ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo "<label class='text-capitalize font-weight-normal'>" . $sqlReservasInfo['dataFim'] . " </label>"; ?>
                                    </td>
                                    <td scope="row">
                                        <?php echo "<label class='text-capitalize font-weight-normal'>" . $sqlReservasInfo['nomeServico'] . " </label>"; ?>
                                    </td>

                                    <?php if ($sqlReservasInfo['atendido'] == 0) { ?>
                                        <?php if (($_SESSION['tipo'] == "funcionario")) { ?>
                                            <td scope="row">
                                                <a type="button" class="btn btn-primary" href="atenderReserva.php?id=<?php echo $sqlReservasInfo['id']; ?>">Atender</a>
                                            </td>
                                        <?php }
                                        if (($_SESSION['tipo'] == "admin")) { ?>
                                            <td scope="row"> Por atender </td>

                                            <td scope="row">
                                                <a type="button" class="btn btn-primary" href="editarReserva.php?id=<?php echo $sqlReservasInfo['id']; ?>">Editar</a>
                                            </td>

                                            <td scope="row">
                                                <a type="button" class="btn btn-primary" href="eliminarReserva.php?id=<?php echo $sqlReservasInfo['id']; ?>">Eliminar</a>
                                            </td>
                                        <?php } ?>

                                    <?php } else { ?>
                                        <?php if (($_SESSION['tipo'] == "funcionario")) { ?>
                                            <td scope="row">
                                                <input type="button" disabled class="btn btn-primary" value="Atendido">
                                            </td>
                                        <?php
                                        }
                                        if (($_SESSION['tipo'] == "admin")) { ?>
                                            <td scope="row"> Atendido </td>

                                            <td scope="row">
                                                <input type="button" disabled class="btn btn-primary" value="Editar">
                                            </td>
                                            <td scope="row">
                                                <input type="button" disabled class="btn btn-primary" value="Eliminar">
                                            </td>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <!-- -------------------------- UTILIZADORES -------------------------- -->
                <?php if (($_SESSION['tipo'] == "admin")) { ?>
                    <div class="tab-pane fade opacity-100 py-4" id="utilizadores" role="tabpanel" aria-labelledby="utilizadores-tab">
                        <a type="button" class="btn btn-primary float-right" href="adicionarutilizador.php">Adicionar</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telemovel</th>
                                    <th scope="col">Tipo</th>

                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($sqlUtilizadoresInfo = mysqli_fetch_array($sqlUtilizadores)) {
                                ?>

                                    <tr>
                                        <td scope="row ">
                                            <?php echo "<label class=' text-capitalize font-weight-normal'>" . $sqlUtilizadoresInfo['nomeUtilizador'] . " </label>"; ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo "<label class=' text-capitalize font-weight-normal'>" . $sqlUtilizadoresInfo['email'] . " </label>"; ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo "<label class=' text-capitalize font-weight-normal'>" . $sqlUtilizadoresInfo['telemovel'] . " </label>"; ?>
                                        </td>
                                        <td scope="row">
                                            <?php echo "<label class='text-capitalize font-weight-normal'>" . $sqlUtilizadoresInfo['tipo'] . " </label>"; ?>
                                        </td>
                                        <td scope="row">
                                            <a type="button" class="btn btn-primary" href="editarutilizador.php?id=<?php echo $sqlUtilizadoresInfo['id']; ?>">Editar</a>
                                        </td>
                                        <td scope="row">
                                            <a type="button" class="btn btn-primary" href="eliminarutilizador.php?id=<?php echo $sqlUtilizadoresInfo['id']; ?>">Eliminar</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>