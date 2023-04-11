<!DOCTYPE html>
<html>

<?php
require 'head.php';

?>
<title> PetShop | Sobre </title>

<body>
    <?php require 'header.php'; ?>

    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Sobre Nós</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Lavagem</span> & <span class="text-secondary">Tosquia</span></h1>
                <h5 class="text-muted mb-3">Tratamos da lavagem e tosquia do seu animal de estimação.</h5>
                <p class="mb-4"> Somos uma empresa criada em 2003 e com sede em algumas cidades de Portugal</p>
                <p class="mb-4"> Preservamos os animais de estimação e o seu bem estar, focamo-nos no amor e dedicação para com eles. </p>
                <p class="mb-4"> Temos em conta o tipo de animal, pelo, raça. Atendemos as diferentes necessidades de cada um</p>
                <p class="mb-4"> Para alem de cuidarmos dos animais como se fossem nossos apoiamos os nossos clientes para que nas suas casas possam cuidar dos seus animais de estimação da melhor maneira.</p>
                
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="sobre1.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="sobre2.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="sobre3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid w-50" src="feature.jpg" alt="">
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h1 class="display-4 mb-4"><span class="text-primary">Porque escolher os nossos </span>serviços?</h1>
                    <ul class="list-inline">
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Melhor Serviço</h5>
                    </li> <br>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergências</h5>
                    </li> <br>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Suporte 24 horas por dia</h5>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Team Start -->
    <div class="container mt-5 pt-5 pb-3">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Equipa</h4>
            <h1 class="display-4 m-0">Conheça a nossa <span class="text-primary">Equipa</span></h1>
        </div>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($sqlFuncionarios1)) {
                echo '
            <div class="col-lg-4 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" src="' . $row['imagem'] . '" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5 class="text-capitalize"> ' . $row['nome'] . ' </h5>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
        
    </div>
    <!-- Team End -->









    


    <?php require 'footer.php'; ?>
</body>

</html>