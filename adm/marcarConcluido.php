<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
include('conexao.php');

    // Executar a consulta SQL para atualizar o status
    $sql = "UPDATE servico SET status='Concluído' WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        // Redirecionar de volta para a página anterior ou para a página que lista os serviços concluídos
        echo "<script>alert('Serviço marcado como concluído.');
            window.location.href = 'listagemClientes.php';
            </script>";
    } else {
        echo "Erro ao atualizar o status: " . $conn->error;
    }

    // Fechar a conexão
    $conexao->close();
} else {
    // Trate o caso em que o ID não é fornecido
    echo "ID do serviço não fornecido.";
}
?>
