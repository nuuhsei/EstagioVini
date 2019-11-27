<?
include "conexao2.php";
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Semana da Física UNESP 2019">
  <meta name="author" content="Unesp">
  <title>Departamento de Física </title>
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
   <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
              <h1 class="text-white">Cronograma Física <i class="em em-rocket"></i></h1>
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
    <div class="container mt--8 pb-5" width="100%">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5"> </div>
            <div class="card-body px-lg-5 py-lg-5">
              <?php
              session_start();
              $id_user = $_SESSION['idUser'];
              $nome_user = $_SESSION['nomeUser'];
              $id_adm = $_SESSION['idAdm'];
              $nome_adm = $_SESSION['nomeAdm'];
              $digito = $_SESSION['digito'];
              include "conexao2.php";


            if($digito == 1){
              echo"<h1 align='center'><code> Bem-Vindo &nbsp; ".$nome_user." </code></h1>";
            }
            if($digito == 2){
              echo"<h1 align='center'><code> Bem-Vindo &nbsp; ".$nome_adm." </code></h1>";
            }
            if($digito != 2 && $digito != 1){
              echo"<h1 align='center'><code> Bem-Vindo </code></h1>";
            }


              $idVisu = $_POST['idVisu'];
              $nomeVisu = $_POST['nomeVisu'];

              $sqly = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result = mysqli_query($con, $sqly);

              $sqly1 = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result1 = mysqli_query($con, $sqly1);

              $sqly3 = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result3 = mysqli_query($con, $sqly3);

              $sqly2 = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result2 = mysqli_query($con, $sqly2);

              $sqly2 = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result2 = mysqli_query($con, $sqly2);
              $dados2 = mysqli_fetch_assoc($result2);

              echo"<h1 align='center'><code> Cronograma &nbsp; ".$nomeVisu." </code></h1>";


              ?>
              <li style="list-style-type: none;"><hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"/></li><br>
              <div class="table-responsive">
              <table  align="center" id="table-3">
                <tr>
                  <td>|Segunda Manhã |</td>
                  <td>Terça Manhã |</td>
                  <td>Quarta Manhã |</td>
                  <td>Quinta Manhã |</td>
                  <td>Sexta Manhã |</td>
                  <td>Sábado Manhã |</td>
                </tr>
                <?php while($dado = mysqli_fetch_assoc($result)){?>
                <tr>

                  <td><?php echo $dado["seg_manha"]; ?></td>
                  <td><?php echo $dado["ter_manha"]; ?></td>
                  <td><?php echo $dado["qua_manha"]; ?></td>
                  <td><?php echo $dado["qui_manha"]; ?></td>
                  <td><?php echo $dado["sex_manha"]; ?></td>
                  <td><?php echo $dado["sab_manha"]; ?></td>

                </tr>
              <?php } ?>
              </table>
            </div><br>
            <div class="table-responsive">
            <table align="center" data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
              <tr>
                <td>|Segunda Tarde |</td>
                <td>Terça Tarde |</td>
                <td>Quarta Tarde |</td>
                <td>Quinta Tarde |</td>
                <td>Sexta Tarde |</td>
                <td>Sábado Tarde |</td>
              </tr>
              <?php while($dado1 = mysqli_fetch_assoc($result1)){?>
              <tr>

                <td><?php echo $dado1["seg_tarde"]; ?></td>
                <td><?php echo $dado1["ter_tarde"]; ?></td>
                <td><?php echo $dado1["qua_tarde"]; ?></td>
                <td><?php echo $dado1["qui_tarde"]; ?></td>
                <td><?php echo $dado1["sex_tarde"]; ?></td>
                <td><?php echo $dado1["sab_tarde"]; ?></td>

              </tr>
            <?php } ?>
            </table>
          </div><br>
          <div class="table-responsive">
          <table align="center" data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
            <tr>
              <td>|Segunda Noite |</td>
              <td>Terça Noite |</td>
              <td>Quarta Noite |</td>
              <td>Quinta Noite |</td>
              <td>Sexta Noite |</td>
              <td>Sábado Noite |</td>
            </tr>
            <?php while($dado3 = mysqli_fetch_assoc($result3)){?>
            <tr>

              <td><?php echo $dado3["seg_noite"]; ?></td>
              <td><?php echo $dado3["ter_noite"]; ?></td>
              <td><?php echo $dado3["qua_noite"]; ?></td>
              <td><?php echo $dado3["qui_noite"]; ?></td>
              <td><?php echo $dado3["sex_noite"]; ?></td>
              <td><?php echo $dado3["sab_noite"]; ?></td>

            </tr>
          <?php } ?>
          </table>
        </div><br>
        <form action="http://df.fc.unesp.br/cronograma/lista.php" method="POST">
          <button  class="btn btn-secondary mt-4">Voltar
          </button>
        </form>
        <form action="http://df.fc.unesp.br/cronograma/edit_horario.php" method="POST">
          <input type="hidden" name="idVisu" value="<?php echo $dados2['id'];?>" />
          <input type="hidden" name="nomeVisu" value="<?php echo $dados2['nome'];?>" />
          <button  class="btn btn-secondary mt-4" >Editar
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
