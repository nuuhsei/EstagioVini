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
              echo"<h1 align='center'><code> Você está editando &nbsp; ".$nomeVisu." </code></h1>";

              $sqly = "SELECT * FROM professor WHERE id='".$idVisu."'";
              $result = mysqli_query($con, $sqly);
              $dados = mysqli_fetch_assoc($result);

              if($digito < 2){
                if($id_user != $idVisu)
                {
                  echo '<div class="alert alert-danger">
                        <strong><i class="em em-exclamation"></i> Opa!</strong> Você não pode editar esses dados!.
                      </div>';
                // Usuário não logado! Redireciona para a página de login
                header("Refresh: 1;url=lista.php");
              }
              }




              date_default_timezone_set('America/Sao_Paulo');
                      if (isset($_POST['update'])) {
                          $idVisu = $_POST['idVisu'];
                          $seg_manha = $_POST['seg_manha'];
                          $ter_manha = $_POST['ter_manha'];
                        $qua_manha = $_POST['qua_manha'];
                          $qui_manha = $_POST['qui_manha'];
                          $sex_manha = $_POST['sex_manha'];
                          $sab_manha = $_POST['sab_manha'];

                          $seg_tarde = $_POST['seg_tarde'];
                          $ter_tarde = $_POST['ter_tarde'];
                          $qua_tarde = $_POST['qua_tarde'];
                          $qui_tarde = $_POST['qui_tarde'];
                          $sex_tarde = $_POST['sex_tarde'];
                          $sab_tarde = $_POST['sab_tarde'];

                          $seg_noite = $_POST['seg_noite'];
                          $ter_noite = $_POST['ter_noite'];
                          $qua_noite = $_POST['qua_noite'];
                          $qui_noite = $_POST['qui_noite'];
                          $sex_noite = $_POST['sex_noite'];
                          $sab_noite = $_POST['sab_noite'];


                          //$conn = mysqli_connect($servername, $username, $password, $database);
                              $sqly6 = "UPDATE professor SET seg_manha='$seg_manha', ter_manha='$ter_manha', qua_manha='$qua_manha', qui_manha='$qui_manha', sex_manha='$sex_manha', sab_manha='$sab_manha',seg_tarde='$seg_tarde', ter_tarde='$ter_tarde', qua_tarde='$qua_tarde', qui_tarde='$qui_tarde', sex_tarde='$sex_tarde', sab_tarde='$sab_tarde'
                              ,seg_noite='$seg_noite', ter_noite='$ter_noite', qua_noite='$qua_noite', qui_noite='$qui_noite', sex_noite='$sex_noite', sab_noite='$sab_noite' WHERE  id='".$idVisu."' ";
                                if (mysqli_query($con, $sqly6)) {
                                    echo '<div class="alert alert-success">
                                          <strong><i class="em em-checkered_flag"></i> Sucesso!</strong>Edição efetuada com sucesso! <i class="em em-moneybag"></i>
                                        </div>';
                                        header("Refresh: 2;url=lista.php");

                                } else {
                                    echo '<div class="alert alert-danger">
                                          <strong><i class="em em-exclamation"></i> Opa!</strong> Tivemos um problema, contate o administrador!.
                                        </div>';
                                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                }

                              mysqli_close($con);
                        }

              ?>
              <form role="form" name="form" method="POST">
                <li style="list-style-type: none;"><hr style="height:2px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"/></li><br>
                <div class="table-responsive">
                <table data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
                  <tr>
                    <td>Segunda | Manhã</td>
                    <td>Terça | Manhã</td>
                    <td>Quarta | Manhã</td>
                    <td>Quinta | Manhã</td>
                    <td>Sexta | Manhã</td>
                    <td>Sábado | Manhã</td>
                  </tr>
                  <tr>
                    <input type="hidden" name="idVisu" value="<?php echo $idVisu;?>" />
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="seg_manha"  type="text" value=<?php echo $dados['seg_manha'];?>  >
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="ter_manha"  type="text" value=<?php  echo $dados['ter_manha'];?>  >
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="qua_manha" type="text" value=<?php  echo $dados['qua_manha'];?>  >
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="qui_manha"  type="text" value=<?php  echo $dados['qui_manha'];?>  >
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="sex_manha"  type="text" value=<?php  echo $dados['sex_manha'];?>  >
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group" class="card-body px-2 py-2">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                          </div>
                          <input class="form-control" name="sab_manha"  type="text" value=<?php  echo $dados['sab_manha'];?>  >
                        </div>
                      </div>
                    </td>

                  </tr>
                </table>
              </div><br>
              <div class="table-responsive">
              <table data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
                <tr>
                  <td>Segunda | Tarde</td>
                  <td>Terça | Tarde</td>
                  <td>Quarta | Tarde</td>
                  <td>Quinta | Tarde</td>
                  <td>Sexta | Tarde</td>
                  <td>Sábado | Tarde</td>
                </tr>
                <tr>

                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" name="seg_tarde"  type="text" value=<?php  echo $dados['seg_tarde'];?>  >
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="ter_tarde" type="text" value=<?php  echo $dados['ter_tarde'];?>  >
                    </div>
                  </div>
                  </td>
                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="qua_tarde" type="text" value=<?php  echo $dados['qua_tarde'];?>  >
                    </div>
                  </div>
                </td>
                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" name="qui_tarde"  type="text" value=<?php  echo $dados['qui_tarde'];?>  >
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" name="sex_tarde"  type="text" value=<?php  echo $dados['sex_tarde'];?>  >
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group" class="card-body px-2 py-2">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" name="sab_tarde"  type="text" value=<?php  echo $dados['sab_tarde'];?>  >
                      </div>
                    </div>
                  </td>

                </tr>
              </table>
            </div><br>
            <div class="table-responsive">
            <table data-order="[[ 0, &quot;desc&quot; ]]" id="table-3">
              <tr>
                <td>Segunda | Noite</td>
                <td>Terça | Noite</td>
                <td>Quarta | Noite</td>
                <td>Quinta | Noite</td>
                <td>Sexta | Noite</td>
                <td>Sábado | Noite</td>
              </tr>
              <tr>

                <td>
                  <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="seg_noite" type="text" value=<?php  echo $dados['seg_noite'];?>  >
                    </div>
                  </div>
                </td>
                <td>
                  <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="ter_noite"  type="text" value=<?php  echo $dados['ter_noite'];?>  >
                    </div>
                  </div>
                </td>
                <td>
                  <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="qua_noite"  type="text" value=<?php  echo $dados['qua_noite'];?>  >
                    </div>
                  </div>
                </td>
                <td>
                  <div class="form-group" class="card-body px-2 py-2">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="qui_noite"  type="text" value=<?php  echo $dados['qui_noite'];?>  >
                    </div>
                  </div>
                </td>
                <td><div class="form-group" class="card-body px-2 py-2">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" name="sex_noite" type="text" value=<?php  echo $dados['sex_noite'];?>  >
                  </div>
                </div></td>
                <td>
                  <div class="form-group" class="card-body px-2 py-2">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" name="sab_noite" type="text" value=<?php echo $dados['sab_noite'];?> >
                  </div>
                </div>
              </td>

              </tr>
            </table>
          </div><br>

                <div class="text-center">
                  <input type="submit" name="update" class="btn btn-secondary mt-4" placeholder="Confirmar Edição">
                </div>
              </form>
              <form action="http://df.fc.unesp.br/cronograma/del_horario.php" method="POST">
                <input type="hidden"  class="btn btn-primary mt-4" name="idVisu" value="<?php echo $dados['id'];?>" />
                <input type="hidden"  class="btn btn-primary mt-4" name="nomeVisu" value="<?php echo $dados['nome'];?>" />
                <button  class="btn btn-danger mt-1" >DELETAR PROFESSOR
                </button>
              </form>

        <form action="http://df.fc.unesp.br/cronograma/horario.php" method="POST">
          <input type="hidden"  class="btn btn-primary mt-4" name="idVisu" value="<?php echo $dados['id'];?>" />
          <input type="hidden"  class="btn btn-primary mt-4" name="nomeVisu" value="<?php echo $dados['nome'];?>" />
          <button  class="btn btn-secondary mt-4" >Voltar
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
