<?php
include('conexao.php');

$cliente = $_POST['cliente'];
$endereco = $_POST['endereco'];
$produto = $_POST['produto'];
$pagamento = $_POST['pagamento'];
$prazo = $_POST['prazo'];
$vezes = isset($_POST['vezes']) ? $_POST['vezes'] : '';
$produtoValor = $_POST['produtoValor'];
$valorComDesconto = $_POST['valorComDesconto'];
$codigoDesconto = $_POST['codigoDesconto'];
$descontoFinal = $_POST['descontoFinal'];
$dataInsercao = $_POST['dataInsercao'];

// Insere os valores no banco de dados
$sqlInserirPedido = "INSERT INTO dadospedidos (cliente, endereco, produto, pagamento, prazo, vezes, valor, valorComDesconto, codigoCupom, dataInsercao) VALUES ('$cliente', '$endereco', '$produto', '$pagamento', '$prazo', '$vezes', '$produtoValor', '$valorComDesconto', '$codigoDesconto', '$dataInsercao')";
$resultadoInserir = $conexao->query($sqlInserirPedido);

if ($resultadoInserir) {
    echo "<script>alert('Pedido inserido com sucesso.');
    window.location.href = 'index.php';
    </script>";
} else {
    echo "Erro ao inserir o pedido no banco de dados: " . $conexao->error;
}

$conexao->close();
?>
