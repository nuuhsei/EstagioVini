<?
include "conexao.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Semana da Física UNESP 2019">
  <meta name="author" content="Unesp">
  <title>Semana da Física | Cadastro</title>
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
  function habilitacao(){
    if(document.getElementById('feminino').checked == true){
      document.getElementById('minicurso').disabled = false;

    }
  else{
      document.getElementById('minicurso').disabled = true;

    }
  }
  function habilitacaoo(){
    if(document.getElementById('sim').checked = true){
      document.getElementById('acessibilidade').disabled = false;

    }
  else{
      document.getElementById('acessibilidade').disabled = true;

    }
  }
  </script>
  <script type="text/javascript">
  var CheckMaximo = 3;



  function verificar() {
  var Marcados = 1;
  var objCheck = document.forms['form'].elements['minicurso'];

  //Percorrendo os checks para ver quantos foram selecionados:
  for (var iLoop = 0; iLoop<objCheck.length; iLoop++) {
  //Se o número máximo de checkboxes ainda não tiver sido atingido, continua a verificação:
  if (Marcados <= CheckMaximo) {
    if (objCheck[iLoop].checked) {
      Marcados++;
    }
      //Habilitando todos os checkboxes, pois o máximo ainda não foi alcançado.
      for (var i=0; i<objCheck.length; i++) {
        objCheck[i].disabled = false;
        if(document.getElementById('masculino').checked == true){
          document.getElementById('minicurso').disabled = true;

        }
      }
  //Caso contrário, desabilitar o checkbox;
  //Nesse caso, é necessário percorrer todas as opções novamente, desabilitando as não checadas;
  } else {
    for (var i=0; i<objCheck.length; i++) {
      if(objCheck[i].checked == false) {
        objCheck[i].disabled = true;
      }
    }
  }
  }
  }
  </script>
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
              <h1 class="text-white">Cadastro Semana da Física <i class="em em-rocket"></i></h1>
              <p class="text-lead text-light">Os dados coletados vão ficar a disponibilidade da Unesp.</p>
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
            <div class="card-header bg-transparent pb-5"> <h1 align="center"><code>Taxa de R$ 20,00 </code> </h1> <code>Esta forma de inscrição te dá direitos aos seguintes itens:
<br>•Participação em até 3 minicursos(Estes deverão ser selecionados pelo participante)
<br>•Kit Vunesp
<br>•Crachá do evento
<br>•Coffe Break( Em mini-cursos e palestras)
<br>• Certificados em todas as atividades</code></div>
            <div class="card-body px-lg-5 py-lg-5">
              <?php
              include "conexao.php";
              date_default_timezone_set('America/Sao_Paulo');
                      if (isset($_POST['update'])) {
                          $nome = $_POST['nome'];
                          $nome = ucfirst(strtolower($nome));
                          $sexo = $_POST['sexo'];
                          $email = $_POST['email'];
                          $rg = $_POST['rg'];
                          $acessibilidade = $_POST['acessibilidade'];
                          if($acessibilidade == NULL){
                            $acessibilidade = "N possui";
                          }
                          $matricula = $_POST['matricula'];
                          if($matricula == NULL){
                            $matri = 0;
                          }else{
                            $matri = $matricula;
                          }
                          $cel = $_POST['cel'];

                          $minicurso1 = $_POST['minicurso1'];
                          if($minicurso1 == ""){
                            $minicurso1 = 0;
                          }
                          $minicurso2 = $_POST['minicurso2'];
                          if($minicurso2 == ""){
                            $minicurso2 = 0;
                          }
                          $minicurso3 = $_POST['minicurso3'];
                          if($minicurso3 == ""){
                            $minicurso3 = 0;
                          }
                          $minicurso4 = $_POST['minicurso4'];
                          if($minicurso4 == ""){
                            $minicurso4 = 0;
                          }
                          $minicurso5 = $_POST['minicurso5'];
                          if($minicurso5 == ""){
                            $minicurso5 = 0;
                          }
                          $minicurso6 = $_POST['minicurso6'];
                            if($minicurso6 == ""){
                              $minicurso6 = 0;
                            }
                          $pagamento = 0;

              // Conectar
                          $conn = mysqli_connect($servername, $username, $password, $database);
              // Checar conexao
                        //  if (!$conn) {
                          //    die("Connection failed: " . mysqli_connect_error());
                          //}
                          $invalido = 0;
                          $valido = 0;
                          $limit = 30;
                          $sqly1 = " SELECT * FROM registro WHERE minicurso1='1'and pagamento='1' ";
                          $sqly2 = " SELECT * FROM registro WHERE minicurso2='1'and pagamento='1' ";
                          $sqly3 = " SELECT * FROM registro WHERE minicurso3='1'and pagamento='1' ";
                          $sqly4 = " SELECT * FROM registro WHERE minicurso4='1'and pagamento='1' ";
                          $sqly5 = " SELECT * FROM registro WHERE minicurso5='1'and pagamento='1' ";
                          $sqly6 = " SELECT * FROM registro WHERE minicurso6='1'and pagamento='1' ";

                          $totalminicurso1 = mysqli_num_rows(mysqli_query($conn, $sqly1));
                          $totalminicurso2 = mysqli_num_rows(mysqli_query($conn, $sqly2));
                          $totalminicurso3 = mysqli_num_rows(mysqli_query($conn, $sqly3));
                          $totalminicurso4 = mysqli_num_rows(mysqli_query($conn, $sqly4));
                          $totalminicurso5 = mysqli_num_rows(mysqli_query($conn, $sqly5));
                          $totalminicurso6 = mysqli_num_rows(mysqli_query($conn, $sqly6));



                          if($minicurso1 == '1'){
                            if($totalminicurso1 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 1 foi preenchido!.
                                  </div>';
                                $invalido += 1;

                            }else{
                              $valido += 1;
                            }
                          }

                          if($minicurso2 == '1'){
                            if($totalminicurso2 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 2 foi preenchido!.
                                  </div>';
                                  $invalido += 1;
                            }else{
                              $valido += 1;
                            }
                          }

                          if($minicurso3 == '1'){
                            if($totalminicurso3 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 3 foi preenchido!.
                                  </div>';
                                  $invalido += 1;
                            }else{
                              $valido += 1;
                            }
                          }

                          if($minicurso4 == '1'){
                            if($totalminicurso4 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 4 foi preenchido!.
                                  </div>';
                                  $invalido += 1;
                            }else{
                              $valido += 1;
                            }
                          }

                          if($minicurso5 == '1'){
                            if($totalminicurso5 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 5 foi preenchido!.
                                  </div>';
                                  $invalido += 1;
                            }else{
                              $valido += 1;
                            }
                          }

                          if($minicurso6 == '1'){
                            if($totalminicurso6 >= $limit){
                              header("Refresh: 2");
                              echo '<div class="alert alert-danger">
                                    <strong><i class="em em-exclamation"></i> Opa!</strong> O minicurso 6 foi preenchido!.
                                  </div>';
                                  $invalido += 1;
                            }else{
                              $valido += 1;
                            }
                          }

                         if ($valido <= 3 && $invalido == 0){
                             $sqlyemail = " SELECT * FROM registro WHERE email = '$email'";
                             $totalemail = mysqli_num_rows(mysqli_query($conn, $sqlyemail));

                             if($totalemail >= 1){
                               echo '<div class="alert alert-danger">
                                     <strong><i class="em em-checkered_flag"></i>  E-mail já cadastrado.</strong> <i class="em em-moneybag"></i>
                                   </div>';
                             }
                             else{
                              $sqly = "INSERT INTO registro (nome, sexo,acessibilidade, email, rg, matricula, celular, minicurso1, minicurso2, minicurso3, minicurso4, minicurso5, minicurso6, pagamento)
                              VALUES ('$nome', '$sexo','$acessibilidade', '$email','$rg', '$matri', '$cel', '$minicurso1', '$minicurso2', '$minicurso3', '$minicurso4', '$minicurso5','$minicurso6', '$pagamento')";
                                if (mysqli_query($conn, $sqly)) {
                                    echo '<div class="alert alert-success">
                                          <strong><i class="em em-checkered_flag"></i> Sucesso!</strong> Cadastro efetuado com sucesso! Agora efetue seu pagamento. <i class="em em-moneybag"></i>
                                        </div>';

                                } else {
                                    echo '<div class="alert alert-danger">
                                          <strong><i class="em em-exclamation"></i> Opa!</strong> Tivemos um problema, contate o administrador!.
                                        </div>';
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                              mysqli_close($conn);
                        }
                      }
              ?>
              <form role="form" name="form" method="POST">
                <div class="form-group" class="card-body px-2 py-2">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" name="nome" required="required" placeholder="Nome completo" type="text">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-radio"><i class="collection"></i></span>
                    </div>
                    <div class="text-left">	<INPUT TYPE="radio" NAME="sexo" onClick="habilitacao()" id="masculino" value="1"> Masculino</div><br />
										<div class="text-left">	<INPUT TYPE="radio" NAME="sexo" onClick="habilitacao()" id="feminino" value="2"> Feminino</div>

                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-radio"><i class="collection"></i></span>
                    </div>
                    <span class="text-muted">Precisa de Acessibilidade? Preencha se julgar necessário.</span>
                  <div width="65%"><input class="form-control" name="acessibilidade" placeholder="" type="text" ></div>
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
                      <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                    </div>
                    <input class="form-control" name="rg" required="required" OnKeyPress="formatar(this,'##.###.###-#')" minlength="12" maxlength="12" placeholder="RG" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                    </div>
                    <input class="form-control" name="matricula" placeholder="Matricula (para Unespianos)." type="numbers">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-send"></i></span>
                    </div>
                    <input class="form-control" name="cel"  id="cel" required="required" minlength="13" maxlength="13" name="tel" OnKeyPress="formatar(this,'## #####-####')" placeholder="DDD + Celular">
                  </div>
                </div>
                <div class="form-group">

                    <div class="input-group-prepend">
                      <span class="input-group-checkbox"><i class=""></i></span>
                    </div>


                    <div class="text-left">Para maiores informações sobre os cursos <a href="http://df.fc.unesp.br/semana/semana19/programacao/">Clique Aqui</a></div><br>

                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso6" value="1" onclick="verificar()"> Minicurso "Introdução á Relatividade ( Exclusivo público feminino )" <span class="text-muted"><code>ESGOTADO !!</code> </span></div>
                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso1" value="1" onclick="verificar()"> Minicurso "Conhecendo a Física Médica" <span class="text-muted"><code>ESGOTADO !!</code> </span></div>
                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso2" value="1" onclick="verificar()"> Minicurso "Fundamentos e Aplicações das Microscopias Eletrônicas e de Força Atômica"  <span class="text-muted"><code>ESGOTADO !!</code> </span></div>
                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso3" value="1" onclick="verificar()"> Minicurso "Criando sua História em Quadrinhos (HQ) sobre conceitos da Física"</div><span class="text-muted"><code>ESGOTADO !!</code> </span></div>
                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso4" value="1" onclick="verificar()"> Minicurso "Técnicas de observação do Céu"  <span class="text-muted"><code>ESGOTADO !!</code> </span></div>
                    <div class="text-left"><input type="checkbox" id="minicurso" name="minicurso5" value="1" onclick="verificar()"> Minicurso "Wolfram Mathematica comandos, programação e exemplos"</div><span class="text-muted"><code>ESGOTADO !!</code> </span></div>

                    <input type="hidden" id="minicurso" onclick="verificar()">

                </div>

                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                    <!--   <input class="custom-control-input" id="customCheckRegister" type="checkbox"> -->

                        <span class="text-muted"><code>Ao enviar você concorda em pagar a taxa de R$ 20,00 !!</code> </span>
                        <span class="text-muted"><code><br><br>A efetivação da participação dos minicursos será por ordem de pagamento, este sendo efetuado junto à pessoas selecionadas da comissão, elas sendo Nicolas Ferreira (21 99343-0173), Yoná Scarmagnani (14 99822-6323), e Larissa Rocha (11 97071-2766), das 21h às 21h15min todos os dias em frente a sala 8. Qualquer coisa, é só marcar um encontro pelo whatsapp com um dos responsáveis !!!</code> </span>
                        <span class="text-muted"><code><br><br>Lembrando que o pagamento poderá ser em dinheiro ou via transferência bancária, está sendo realizada através dos dados abaixo:<br><br>

Banco do Brasil<br><br>

Conta corrente: 31980-5<br>

Agência: 3015-5<br>

Nicolas Ferreira Martins<br>
<br><br>
Após a transferência, por favor enviar o comprovante pelo whatsapp (21 99343-0173/Nicolas Ferreira)!!</code> </span>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <input type="submit" name="update" class="btn btn-primary mt-4" placeholder="Confirmar Cadastro">
                </div>
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
            &copy; <script>document.write(new Date().getFullYear());</script> <a href="" class="font-weight-bold ml-1" target="_blank">Semana da Física 2019</a>
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
