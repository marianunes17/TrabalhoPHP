<!DOCTYPE html>
<html>

<?php 

require 'head.php'; 

require_once('basedados.php');
require_once('../basedados/basedados.h');


session_start();
	
	$utilizador = $_POST["utilizador"];
	$password = $_POST["password"];


    $sql = 'SELECT * FROM user WHERE utilizador LIKE \'' . $utilizador . '\' AND password = \'' . $password . '\'';
	
	$retval = mysqli_query( $conn, $sql );
	if(! $retval ){
		die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
	}

    if (($row = mysqli_fetch_array($retval)) != null) {
		$_SESSION['utilizador'] = $utilizador;
		$_SESSION['tipo'] = $row['tipo'];
    }
?>
<title> PetShop </title>

<body>
    <?php require 'header.php'; ?>


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h1 class="display-4 m-0">Login</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="login" id="loginForm"  action="" method="POST">
                        <div class="control-group">
                            <input type="email" class="form-control p-4" id="email" placeholder="Email" required="required" data-validation-required-message="Por favor, introduza o email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control p-4" id="password" placeholder="Password" required="required" data-validation-required-message="Por favor, introduza a password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Login</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-8 mb-5 ">
                <a href="registo.php">
                    <h6 class="text-secondary mb-3 text-right">Registar</h6>
                </a>
            </div>


        </div>
    </div>
    <!-- Contact End -->



    <?php require 'footer.php'; ?>
</body>

</html>