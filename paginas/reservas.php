<!DOCTYPE html>
<html>

<?php require 'head.php';
 require_once('basedados.php');
    require_once('../basedados/basedados.h');

    $sqlServico = "SELECT * FROM servicos";
    $retval = mysqli_query( $conn, $sqlServico );
    if(! $retval ){
    die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
    }

?>



<title> PetShop | Reservas </title>

<body>
    <?php require 'header.php'; ?>

<!-- Booking Start -->
<div class="container-fluid bg-light">
        <div class="container py-5 px-4 px-sm-5">
        <div class="d-flex flex-column text-center">
            <h1 class="display-4 m-0"><span class="text-primary">Reservar Serviço</span> </h1>
        </div>

            <div class="row align-items-center">
                <div class="col-lg-12">
                        <form class="py-5">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Nome" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Email" required="required" />
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Data da Reserva" data-target="#date" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Hora da Reserva" data-target="#time" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Selecione um Serviço</option>

                                    <?php
                                    while($row = mysqli_fetch_array($retval)){
                                        echo '<option value="' .$row['id'] . '"> ' . $row['nome'] . '</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Selecionar animal</option>
                                    <option value="1">animal 1</option>
                                    <option value="2">animal 1</option>
                                    <option value="3">animal 1</option>
                                </select>
                            </div>
                            <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Reservar</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <?php require 'footer.php'; ?>

</body>

</html>