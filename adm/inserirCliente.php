<?php

include('conexao.php');


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$result = mysqli_query ($conexao, "INSERT INTO servico (nome_cliente,descricao_servico,telefone_cliente) VALUES ('$nome','$email','$telefone')");


            echo "<script>alert('Cadastro realizado com sucesso.');
            window.location.href = 'index.php';
            </script>";

?>