<?
include "conexao2.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Cadastro Professor">
  <meta name="author" content="Unesp">
  <title>Cadastro</title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">

  <script language="javascript">
  /*----------------------------------------------------------------------------
  Formatação para qualquer mascara
  -----------------------------------------------------------------------------*/
  function formatar(src, mask){
    var i = src.value.length;
    var saida = mask.substring(0,1);
    var texto = mask.substring(i)
  if (texto.substring(0,1) != saida)
    {
      src.value += texto.substring(0,1);
    }
  }
  </script>
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-8">
        <a class="navbar-brand" href="index.php">
          <img src="https://www2.unesp.br/images/unesp-full-center.svg" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="index.php">
                  <img src="https://www2.unesp.br/images/unesp-full-center.svg">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Cadastro Professor <i class="em em-rocket"></i></h1>
              <p class="text-lead text-light">O Nome, e o Email, ficaram a disponibilidade para qualquer usuário.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5"> <h1 align="center"><code></code></div>
            <div class="card-body px-lg-5 py-lg-5">
              <?php
              session_start();
              $id_adm = $_SESSION['idAdm'];
              $nome_adm = $_SESSION['nomeAdm'];
              $digito = $_SESSION['digito'];
              if($digito < 2)
              {
              // Usuário não logado! Redireciona para a página de login
              header("Location: login_adm.php");
            }
              echo"<h1 align='center'><code> Bem-Vindo &nbsp; ".$nome_adm." </code></h1>";
              include "conexao2.php";
              date_default_timezone_set('America/Sao_Paulo');
                      if (isset($_POST['update'])) {
                          $nome = $_POST['nome'];
                          $nome = ucfirst(strtolower($nome));
                          $email = $_POST['email'];
                          $senha = $_POST['senha'];
                          $digito = 1;
                          $conn = mysqli_connect($servername, $username, $password, $database);
                              $sqly = "INSERT INTO professor (nome, email, senha, digito)
                              VALUES ('$nome', '$email', '$senha', '$digito')";
                                if (mysqli_query($conn, $sqly)) {
                                    echo '<div class="alert alert-success">
                                          <strong><i class="em em-checkered_flag"></i> Sucesso!</strong> Cadastro efetuado com sucesso! <i class="em em-moneybag"></i>
                                        </div>';
                                        header("Refresh: 1;url=lista.php");
                                } else {
                                    echo '<div class="alert alert-danger">
                                          <strong><i class="em em-exclamation"></i> Opa!</strong> Tivemos um problema, contate o administrador!.
                                        </div>';
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }

                              mysqli_close($conn);
                        }

              ?>
              <form role="form" name="form" method="POST">
                <div class="form-group" class="card-body px-2 py-2">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" name="nome" required="required" placeholder="Nome " type="text">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" required="required" placeholder="Email" type="email">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="senha" required="required" placeholder="Senha" type="password">
                  </div>
                </div>

                <div class="text-center">
                  <input type="submit" name="update" class="btn btn-primary mt-4" placeholder="Confirmar Cadastro">
                </div>
              </form>
              <form action="http://df.fc.unesp.br/cronograma/lista.php" method="POST">
                <button  class="btn btn-secondary mt-4">Voltar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; <script>document.write(new Date().getFullYear());</script> <a href="" class="font-weight-bold ml-1" target="_blank">Departamento de Física 2019</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
   <script src="assets/js/jquery.mask.min.js"></script>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
