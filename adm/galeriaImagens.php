<?php
include('conexao.php');

$query = "SELECT * FROM dadosprodutos";
$result = mysqli_query($conexao, $query);
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
<style>
    .card-img-top{
        align-items: center;
        justify-content: center;
        width: 250px;
        height: 250px;
        }
</style>
</head>

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
                        <a class="collapse-item" href="cadastrarCliente.php">Serviço</a>
                        <a class="collapse-item" href="cadastrarProduto.php">Produto</a>
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
                        <a class="collapse-item" href="listagemClientes.php">Serviços</a>
                        <a class="collapse-item" href="listagemProdutos.php">Produtos</a>            
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                VER
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="galeriaImagens.php" >
                <i class="fas regular fa-image"></i>
                    <span>Galeria de produtos</span>
                </a>
                
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Insert Digital ADM</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <form method="post">
        <button class="dropdown-item" type="submit" name="logout">
            <i class="fa fa-arrow-left fa-sm fa-fw mr-2 text-gray-400"></i>
            Sair
        </button>
    </form>
</div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Galeria de produtos</h1>
                    </div>


                    <div class="row" style=" justify-content: center; align-items: center;">

                        <div class="col-lg-6" style=" justify-content: center; align-items: center;">

                            <!-- Basic Card Example -->
                            <div class="row" style=" justify-content: center; align-items: center;">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="card shadow mb-4">
        <div class="card-header py-3" style="text-align: center;">
        <img class="card-img-top img-fluid" src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>">
                <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['nome']; ?></h6>
                <h6 class="m-0 font-weight-bold text-primary">R$ <?php echo $row['preco']; ?></h6>
                    <p class="card-text"><?php echo $row['descricao']; ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

                        </div>

                       
                                </div>
                            </div>

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



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>