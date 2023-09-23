<?php

if(!empty($_GET['id'])){


include_once('conexao.php');

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM dadospedidos WHERE id=$id";

$result = $conexao->query($sqlSelect);

if($result->num_rows > 0){
        $sqlDelete = "DELETE FROM dadospedidos WHERE id=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
    header('Location: listagemPedidos.php');
}
?>