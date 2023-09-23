<?php

$dbHost = 'localhost';
$dbUsuario = 'root';
$dbSenha = '';
$dbNome = 'kayk';

$conexao = new mysqli($dbHost, $dbUsuario, $dbSenha, $dbNome);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

        <form action="confirmarPedido.php" method="POST">
        <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="produto" class="form-label">Selecionar produto</label>
            
            <select id="produto" name="produto" class="form-select" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
                <option selected >Produtos disponíveis</option>
                <br>
                <?php
                $sqlSelect = "SELECT id, nome FROM dadosprodutos";
                $result = $conexao->query($sqlSelect);
                foreach ($result as $option) {
                    ?>
                    <option value="<?php echo $option['nome'] ?>"><?php echo $option['nome'] ?></option>
                    <?php
                }
                ?>
            </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="cliente" class="form-label">Selecionar cliente</label>
            <br>
            <select id="cliente" name="cliente" class="form-select" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
                <option selected>Clientes cadastrados</option>
                <br>
                <?php
$sqlSelectCliente = "SELECT id, nome, endereco FROM dadosclientes";
$resultCliente = $conexao->query($sqlSelectCliente);
foreach ($resultCliente as $option2) {
    ?>
    <option value="<?php echo $option2['nome'] ?>" data-endereco="<?php echo $option2['endereco'] ?>"><?php echo $option2['nome'] ?></option>
    <?php
}
?>
            </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <br>
            <label for="pagamento" class="form-label">Selecionar pagamento</label>
            <br>
            <select id="pagamento" name="pagamento" class="form-select no-search" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
                <option selected>Pagamento</option>
                <option value="Boleto">Boleto</option>
                <option value="Cartão">Cartão</option>
            </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <br>
            <label for="prazo" class="form-label">Selecionar prazo</label>
            
            <select id="prazo" name="prazo" class="form-select no-search" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
                <option selected>Prazo</option>
                <option value="À vista">À vista</option>
                <option value="Parcelado">Parcelado</option>
            </select>
            </div>
            
            <div id="quantidade-vezes" class="hide">
                <br>
                <label for="vezes" class="form-label">Quantidade de vezes</label>
                <br>
                <select id="vezes" name="vezes" class="form-select form-control no-search" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
                    <option selected>Quantidade de vezes</option>
                    <option value="3x sem juros">3x sem juros</option>
                    <option value="6x sem juros">6x sem juros</option>
                </select>
                </div>
            </div>
            <br>
            <div class="inputBox">
            <label for="codigo_cupom" class="form-label">Código do Cupom:</label>
                <input type="text" name="codigo_cupom" id="codigo_cupom" style="width:100%;" style="width: 100%; background-color: transparent; padding:5px;border-radius:5px; font-family:'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';' aria-label= Default select example"> 
            </div>
            <br>
            <br>
            <input type="submit" value="Cadastrar" class="btn btn-primary btn-user btn-block">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.form-select').select2();

            $('#prazo').change(function () {
                if ($(this).val() === 'Parcelado') {
                    $('#quantidade-vezes').removeClass('hide');
                    $('#vezes').prop('disabled', false);
                    $('#vezes').prop('required', true);
                } else {
                    $('#quantidade-vezes').addClass('hide');
                    $('#vezes').prop('disabled', true);
                    $('#vezes').prop('required', false);
                }
            });
        });
    </script>
</body>
</html>
