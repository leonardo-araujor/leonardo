<?php
include('conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Aqui você deve usar a biblioteca apropriada para evitar SQL injection, como PDO ou mysqli
    // Suponhamos que você está usando mysqli:

    // Consulta o banco de dados para verificar as credenciais
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conexao->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["senha"]; // Supondo que a senha esteja armazenada no banco de dados

        if (password_verify($senha, $hashed_password)) {
            // Autenticação bem-sucedida
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Credenciais inválidas. Tente novamente.";
        }
    } else {
        $error_message = "Credenciais inválidas. Tente novamente.";
    }

    $conexao->close();
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Entrar</h1>
                                    </div>
                                    <form class="user" action="login.php" method="post">
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" name="senha" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Senha">
    </div>
    <input type="submit" name="submit" value="Entrar" class="btn btn-primary btn-user btn-block">
</form>
   
                            
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