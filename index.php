
<!DOCTYPE html>
<html>


<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/icone.png" type="image/x-icon">

  <title>
    Insert Digital
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
  .slider_section .detail-box a {
  display: inline-block;
  padding: 10px 40px;
  background-color: #458bdb;
  color: #ffffff;
  border: 1px solid #458bdb;
  border-radius: 5px;
  -webkit-transition: all .3s;
  transition: all .3s;
  margin-top: 25px;
  text-transform: uppercase;
}
.slider_section .detail-box a:hover {
  background-color: transparent;
  color: #458bdb;
}


</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container " >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: rgb(195, 210, 231)">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://api.whatsapp.com/send/?phone=557499993307">
                Contato
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.google.com.br/maps/place/Insert+Digital/@-9.8400463,-39.4843116,17z/data=!3m1!4b1!4m6!3m5!1s0x70cfb5ec979c7bb:0x2fc580a2f35fcdf5!8m2!3d-9.8400516!4d-39.4817367!16s%2Fg%2F11j2wmqgkg?entry=tts&shorturl=1">
                Localização
              </a>
            </li>
          </ul>
          <div class="user_option">
            <a href="adm/index.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->

    <section class="slider_section" >
      <div class="slider_container" style="background-color: rgb(154, 186, 226)">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                       Bem vindo à <br>
                        Insert Digital
                      </h1>
                      <p>
                        Quando se trata de eletrônicos e serviços de conserto de celulares, a Insert Digital é a sua escolha número um. 
                      </p>
                      <a href="https://www.instagram.com/insert_digital_oficial/">
                        Rede social
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/pn.png" alt="" style="width:420px;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nossos produtos
        </h2>
      </div>
  <!-- CATALOGO -->
      
  <div class="row">
        <?php
        // Inclua o arquivo de conexão
        include 'adm/conexao.php';

        // Consulta SQL para buscar os produtos
        $sql = "SELECT * FROM dadosprodutos";
        $result = $conexao->query($sql);

        // Loop através dos resultados e exiba os produtos
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="box">';
            echo '<a href="https://wa.me/557499993307?text=Ol%C3%A1%2C+fiquei+interessado+em+um+dos+produtos+da+loja%21">';
            echo '<div class="img-box">';
            echo '<img class="img-catallogo" src="adm/' . $row["imagem"] . '" alt="' . $row["marca"] . '">';
            echo '</div>';
            echo '<div class="detail-box">';
            echo '<h6>' . $row["nome"] . '</h6>';
            echo '<h6>Marca: '. $row["marca"] . '<span><br><br>R$' . $row["preco"] . '</span></h6>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // Feche a conexão com o banco de dados
        $conexao->close();
        ?>
    </div>

      <!-- CATALOGO -->
  </section>

  <!-- end shop section -->

  <!-- saving section -->

  <section class="saving_section ">
    <div class="box">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="img-box">
              <img src="images/baixo.png" alt="" style="width:450px;">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Por que escolher a <br>
                  Insert Digital?
                </h2>
              </div>
              <p>
                Na Insert Digital, estamos empenhados em fornecer soluções confiáveis para todas as suas necessidades de eletrônicos e conserto de celulares. Escolher-nos é escolher qualidade, conhecimento e excelência em atendimento ao cliente. Venha nos visitar e descubra por que somos a escolha preferida de tantos clientes satisfeitos. 
              </p>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end saving section -->


  <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="" style="text-align: center; margin-top:50px;">
        LOCALIZAÇÃO
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.1228095303127!2d-39.4817367!3d-9.840051599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x70cfb5ec979c7bb%3A0x2fc580a2f35fcdf5!2sInsert%20Digital!5e0!3m2!1spt-BR!2sbr!4v1695207179718!5m2!1spt-BR!2sbr" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <h1 style="text-align:center; margin-top:150px; font-size:30px;">Clique e veja mais detalhes.</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

 
    <footer>
        <p style="text-align:center; margin-top:100px;">
          &copy; <span id="displayYear"></span> Todos os direitos pora
          Insert Digital
        </p>
     
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>