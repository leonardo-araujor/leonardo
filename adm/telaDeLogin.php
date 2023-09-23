<?php
session_start();

$error_message = ""; // Variável para armazenar a mensagem de erro

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    include_once('conexao.php');
    
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: index.php');
        exit();
    } else {
        $error_message = "Email ou senha incorretos."; // Define a mensagem de erro
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Insert Digital | Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('loginImagem.jpg');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                    <div class="sidebar-brand-icon">
                <i class="fa fa-power-off fa-2x 300"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 18px;">Insert Digital<sup></sup></div>
                <br>
                <hr>
                <br>
                                        <h1 class="h4 text-gray-900 mb-4" style="margin-bottom: -20px;">Entrar</h1>
                                    </div>
                                    <?php if (!empty($error_message)) : ?>
                                        <div class="error-message" style="text-align: center; color: red;">
                                    <?php echo $error_message; ?><br><br>
                                    </div>
                            <?php endif; ?>
        <form class="user" action="telaDeLogin.php" method="POST">
            <div class="form-group">
                <input type="email"  id="email" name="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password"class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Senha" require>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" value="Entrar" class="btn btn-primary btn-user btn-block">
            </div>
        </form>
    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
