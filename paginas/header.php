<header>
    <?php session_start(); ?>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="sobre.php" class="nav-item nav-link">Sobre</a>
                    <a href="servicos.php" class="nav-item nav-link">Serviços</a>
                    <a href="contactos.php" class="nav-item nav-link">Contactos</a>

                    <?php
                    if (isset($_SESSION['utilizadores'])) {
                        if (($_SESSION['tipo'] == "cliente") && ($_SESSION['tipo'] == 'funcionario') && ($_SESSION['tipo'] == "admin")) {
                            echo '  <a href="dadospessoais.php" class="nav-item nav-link">Dados Pessoais</a> 
                                    <a href="verreservas.php" class="nav-item nav-link">Reservas</a>
                                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                                ';
                        }


                        if (($_SESSION['tipo'] == "admin")) {
                            echo '  <a href="gestaoutilizadores.php" class="nav-item nav-link">Gestão de utilizadores</a>
                                    <a href="gestaoanimais.php" class="nav-item nav-link">Gestão de animais</a>
                                ';
                        }
                    }
                    ?>

                </div>
                <a href="login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Login</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

</header>