<header>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5 mb-0">
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
                </div>

                <?php
                if (isset($_SESSION['nomeUtilizador'])) {
                    echo '
                    <a  class="btn btn-lg btn-primary px-3 d-none d-lg-block nav-link dropdown-toggle" 
                    data-toggle="dropdown" href="#"   aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <label class="text-capitalize"> ' . $_SESSION['nomeUtilizador'] . ' </label>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-black mx-5"  aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item text-light" href="dadospessoais.php">Dados Pessoais</a>
                        <a class="dropdown-item text-light" href="reservas.php">Reservas</a>
                        ';


                    if (($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "funcionario")) {
                        echo '  <a class="dropdown-item text-light" href="gestao.php">Gestão</a>
                                ';
                    }

                    echo '
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-light" href="logout.php">Logout</a>
                        </div>';
                } else {
                    echo ' <a href="login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Login</a> ';
                }
                ?>
        </nav>
    </div>
    <!-- Navbar End -->

</header>