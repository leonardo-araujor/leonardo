<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include('conexao.php'); // Conexão com o banco de dados

    // Verifique as credenciais do usuário
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $user_data = mysqli_fetch_assoc($result);

        if (password_verify($senha, $user_data['senha'])) {
            // Credenciais válidas, redirecione para a página após o login
            $_SESSION['user_id'] = $user_data['id'];
            header('Location: index.php'); // Página de destino após o login
            exit();
        }
    }

    // Credenciais inválidas, exiba uma mensagem de erro ou redirecione para a página de login
    $erro = "Credenciais inválidas";
}
?>