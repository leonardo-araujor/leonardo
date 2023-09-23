<?php
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    include('conexao.php');

    // Obter os valores do formulário
    $codigo = $_POST['codigo'];
    $desconto = $_POST['desconto'];

    // Inserir o cupom no banco de dados
    $sql = "INSERT INTO cupons (codigo, desconto, utilizado) VALUES ('$codigo', $desconto, 0)";
    if ($conexao->query($sql) === true) {
        echo "<script>alert('Cupom gerado com sucesso.');
            window.location.href = 'index.php';
            </script>";
    } else {
        echo 'Erro ao gerar o cupom: ' . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>