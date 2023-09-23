<?php
ob_start(); // Inicia o buffer de saída
include('conexao.php');

$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
$codigoDesconto = isset($_POST['codigo_cupom']) ? $_POST['codigo_cupom'] : '';
$sqlSelectCliente = "SELECT endereco FROM dadosclientes WHERE nome='$cliente'";
$resultCliente = $conexao->query($sqlSelectCliente);
$dadosCliente = $resultCliente->fetch_assoc();
$endereco = $dadosCliente ? $dadosCliente['endereco'] : '';
$sqlSelectDesconto = "SELECT desconto FROM cupons WHERE codigo='$codigoDesconto'";
$resultDesconto = $conexao->query($sqlSelectDesconto);
$dadosDesconto = $resultDesconto->fetch_assoc();
$descontoFinal = $dadosDesconto ? $dadosDesconto['desconto'] : '';
$produto = isset($_POST['produto']) ? $_POST['produto'] : '';
$prazo = isset($_POST['prazo']) ? $_POST['prazo'] : '';
$pagamento = isset($_POST['pagamento']) ? $_POST['pagamento'] : '';
$vezes = isset($_POST['vezes']) ? $_POST['vezes'] : '';
$dataInsercao = date('Y-m-d H:i:s');

// Processar os valores do formulário e calcular os descontos, se necessário

$sqlSelectProduto = "SELECT preco FROM dadosprodutos WHERE nome = '$produto'";
$resultadoProduto = $conexao->query($sqlSelectProduto);
$produtoValor = $resultadoProduto ? $resultadoProduto->fetch_assoc()['preco'] : '';

$codigoCupom = $_POST['codigo_cupom'];
$sqlSelectCupom = "SELECT desconto FROM cupons WHERE codigo = '$codigoCupom' AND utilizado = 0";
$resultadoCupom = $conexao->query($sqlSelectCupom);

$valorComDesconto = $produtoValor;

if ($resultadoCupom->num_rows === 1) {
    // Cupom válido, aplicar o desconto
    $cupomDesconto = $resultadoCupom->fetch_assoc()['desconto'];
    $valorComDesconto = $produtoValor - $cupomDesconto;

    // Atualizar o status do cupom para utilizado
    $sqlUpdateCupom = "UPDATE cupons SET utilizado = 1 WHERE codigo = '$codigoCupom'";
    $conexao->query($sqlUpdateCupom);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Insert Digital | Área Administrativa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
        .hide {
            display: none;
        }
    </style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <i class="fa fa-power-off"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 14px;">Insert Digital<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel de Controle</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                AÇÕES
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Cadastrar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opções</h6>
                        <a class="collapse-item" href="cadastrarCliente.php">Cliente</a>
                        <a class="collapse-item" href="cadastrarProduto.php">Produto</a>
                        <a class="collapse-item" href="cadastrarPedido.php">Pedido</a>
                        <a class="collapse-item" href="cadastrarCupom.php">Cupom</a>
                    </div>
                </div>
            </li>


            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Listar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listar</h6>
                        <a class="collapse-item" href="listagemClientes.php">Clientes</a>
                        <a class="collapse-item" href="listagemProdutos.php">Produtos</a>
                        <a class="collapse-item" href="listagemPedidos.php">Pedidos</a>
                        <a class="collapse-item" href="listagemCupons.php">Cupons</a>             
                    </div>
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: auto">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Insert Digital ADM</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800" style="text-align: center; margin: 50px;">Confirmar Pedido</h1>

<div class="card" style="background-color: transparent;">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row" style="display: flex; justify-content: center;">
    <div class="col-lg-7">
        <div class="p-5">
            <form class="user" action="inserirPedido.php" method="POST">
                <div class="form-group row" style="display: flex; justify-content: center;">
                    <table class="table table-bordered" id="dataTable" style="width: 80%; font-size: 14px;">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Endereço</th>
                                <th>Produto</th>
                                <th>Pagamento</th>
                                <th>Prazo</th>
                                <th>Vezes</th>
                                <th>Valor</th>
                                <th>Valor com desconto</th>
                                <th>Código do cupom</th>
                                <th>Desconto do cupom</th>
                                <th>Data do Pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                    echo "<td>".$cliente."</td>";
                                    echo "<td>".$endereco."</td>";
                                    echo "<td>".$produto."</td>";
                                    echo "<td>".$pagamento."</td>"; 
                                    echo "<td>".$prazo."</td>";
                                    echo "<td>".$vezes."</td>";
                                    echo "<td>R$".$produtoValor.",00</td>";
                                    echo "<td>R$".$valorComDesconto.",00</td>";
                                    echo "<td>".$codigoDesconto."</td>";
                                    echo "<td>R$ -".$descontoFinal."</td>";
                                    echo "<td>".$dataInsercao."</td>";
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Place the Submit button here, after the table -->
                <input type="hidden" name="cliente" value="<?php echo $cliente; ?>">
<input type="hidden" name="endereco" value="<?php echo $endereco; ?>">
<input type="hidden" name="produto" value="<?php echo $produto; ?>">
<input type="hidden" name="pagamento" value="<?php echo $pagamento; ?>">
<input type="hidden" name="prazo" value="<?php echo $prazo; ?>">
<input type="hidden" name="vezes" value="<?php echo $vezes; ?>">
<input type="hidden" name="produtoValor" value="<?php echo $produtoValor; ?>">
<input type="hidden" name="valorComDesconto" value="<?php echo $valorComDesconto; ?>">
<input type="hidden" name="codigoDesconto" value="<?php echo $codigoDesconto; ?>">
<input type="hidden" name="descontoFinal" value="<?php echo $descontoFinal; ?>">
<input type="hidden" name="dataInsercao" value="<?php echo $dataInsercao; ?>">
                <input type="submit" value="Cadastrar" class="btn btn-primary btn-user btn-block">
            </form>
        </div>
    </div>
</div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</body>
            
</html>
