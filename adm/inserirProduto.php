<?php

include('conexao.php');

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION));

if (!empty($_FILES["imagem"]["tmp_name"])) {
    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    if ($_FILES["imagem"]["size"] > 500000) {
        echo "Desculpe, a imagem é muito grande.";
        $uploadOk = 0;
    }

    $allowedFormats = array("jpg", "jpeg", "png", "jfif", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Desculpe, apenas imagens nos formatos JPG, JPEG, PNG e GIF são permitidas.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Desculpe, a imagem não foi enviada.";
    } else {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
        
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
            $result = mysqli_query($conexao, "INSERT INTO dadosprodutos (nome, marca, codigo, preco, descricao, imagem) VALUES ('$nome', '$marca', '$codigo', '$preco', '$descricao', '$targetFile')");

            if ($result) {
                echo "<script>alert('Cadastro realizado com sucesso.');
                            window.location.href = 'index.php';
                            </script>";
            } else {
                echo "Erro ao cadastrar no banco de dados: " . mysqli_error($conexao);
            }
        } else {
            echo "Desculpe, ocorreu um erro ao enviar a imagem.";
        }
    }
} else {
    echo "Você não selecionou uma imagem.";
}

?>
