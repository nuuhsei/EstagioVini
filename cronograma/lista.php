<?
//require "verifica.php";
include "conexao2.php";
session_start();
$id_user = $_SESSION['idUser'];
$nome_user = $_SESSION['nomeUser'];
$id_adm = $_SESSION['idAdm'];
$nome_adm = $_SESSION['nomeAdm'];
$digito = 0;
$digito = $_SESSION['digito'];

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
            //echo"<h1 align='center'><code> Bem-Vindo &nbsp; ".$digito." </code></h1>";

              $pesquisa = $_POST['pesquisa'] ?? 0;
              if($pesquisa == NULL){
                $sqly = "SELECT * FROM professor";
                $result = mysqli_query($con, $sqly);
              }
              else{
                $sqly = "SELECT * FROM professor WHERE nome='".$pesquisa."'";
                $result = mysqli_query($con, $sqly);
              }

      ?>

              <li style="list-style-type: none;"><hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"/></li>
              <br><br><form action="http://df.fc.unesp.br/cronograma/lista.php" method="POST">
              <input type="text" name="pesquisa" placeholder="Pesquisa por nome " />
              <button  class="btn btn-primary mt-1">Deve ser idêntico ao cadastrado (Pesquisar)
              </button>
              </form>
              <br><br>
              <div class="table-responsive">
              <table data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
                <tr>
                  <td>Nome</td>
                  <td>Email</td>
                  <td>Horário</td>
                </tr>
                <?php while($dado = mysqli_fetch_assoc($result)){?>
                <tr>
                  <td><?php echo $dado["nome"]; ?></td>
                  <td><?php echo $dado["email"]; ?></td>
                  <td>
                    <form action="http://df.fc.unesp.br/cronograma/horario.php" method="POST">
                    <input type="hidden" name="idVisu" value="<?php echo $dado['id'];?>" />
                    <input type="hidden" name="nomeVisu" value="<?php echo $dado['nome'];?>" />
                    <button  class="btn btn-primary mt-1">Visualizar
                    </button>
                    </form>
                </td>
                </tr>
              <?php } ?>
              </table>
              <form action="http://df.fc.unesp.br/cronograma/login_prof.php" method="POST">
              <input type="hidden" name="loginprof" value="prof"/>
              <button  class="btn btn-secondary mt-4">Login como professor
              </button>
              </form>
              <form action="http://df.fc.unesp.br/cronograma/login_adm.php" method="POST">
              <input type="hidden" name="loginadm" value="adm"/>
              <button   class="btn btn-secondary mt-4">Departamento de FÍSICA
              </button>
              </form>
              <form action="http://df.fc.unesp.br/cronograma/cadastro_prof.php" method="POST">
              <input type="hidden" name="cadastro_prof" value="cadastro_prof"/>
              <button   class="btn btn-secondary mt-4">Cadastro de Usuário
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
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src= "//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
   <script src="assets/js/jquery.mask.min.js"></script>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</div>
 <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
      jQuery( document ).ready( function( $ ) {
        var $table3 = jQuery("#table-3");
        var table3 = $table3.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todas"]]
        } );

        // Initalize Select Dropdown after DataTables is created
        $table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
        });

        // Setup - add a text input to each footer cell
        $( '#table-3 tfoot th' ).each( function () {
        var title = $('#table-3 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Procurar ' + title + '" />' );
        } );

        // Apply the search
        table3.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
        that
        .search( this.value )
        .draw();
        }
        } );
        } );
        } );
</script>
</body>

</html>
