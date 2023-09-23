<?php
// Certifique-se de ter o dompdf instalado e incluído no seu projeto
require_once './vendor/autoload.php';

// Conexão com o banco de dados (substitua pelas suas configurações)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kayk';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifique se o ID do pedido foi fornecido como parâmetro na URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idPedido = $_GET['id'];

        // Consulta para obter os dados específicos do pedido do banco de dados com base no ID fornecido
        $sql = "SELECT * FROM dadospedidos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idPedido);
        $stmt->execute();
        $dadosPedido = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Se o ID do pedido não foi fornecido, redirecione para a página de listagem de pedidos
        header("Location: listagemPedidos.php");
        exit();
    }

    // Criação do PDF usando o dompdf
    $html = '<html><head><style>h1{text-align:center;}table {border-collapse: collapse; width: 100%;} th, td {border: 1px solid black; padding: 8px;} th {background-color: #dddddd;}</style></head><body>';
    $html .= '<h1>Dados do Pedido N° ' . $dadosPedido[0]['id'] . '</h1>';
    $html .= '<table><tr><th>ID</th><th>Cliente</th><th>Produto</th><th>Endereço</th><th>Valor final</th></tr>';
    foreach ($dadosPedido as $dado) {
        $html .= '<tr><td>' . $dado['id'] . '</td><td>' . $dado['cliente'] . '</td><td>' . $dado['produto'] . '</td><td>' . $dado['endereco'] . '</td><td>' . $dado['valorComDesconto'] . '</td></tr>';
    }
    $html .= '</table></body></html>';

    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Defina o nome do arquivo PDF gerado
    $filename = 'pedido_' . $dadosPedido[0]['id'] . '.pdf';

    // Envie o PDF gerado para o navegador
    $dompdf->stream($filename, ['Attachment' => false]);

} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
