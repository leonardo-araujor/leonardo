<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy(); // Destrói a sessão
    header('Location: login.php'); // Redireciona para a página de login
    exit(); // Encerra o script
}
?>