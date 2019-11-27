<?php
	include "conexao.php";
	session_start();
				$id_user = $_SESSION['idUser'];
				$nome_user = $_SESSION['nomeUser'];
				if($id_user == NULL)
				{
				// Usuário não logado! Redireciona para a página de login
				header("Location: login.php");
			}

	$html = '';
	$html = '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Email</th>';
	$html .= '<th>RG</th>';
	$html .= '<th>Acessibilidade</th>';
	$html .= '<th>Matricula</th>';
	$html .= '<th>Celular</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$sqly = " SELECT * FROM registro WHERE minicurso4='1'and pagamento='1' ";
	$resultado = mysqli_query($con, $sqly);
	while($dado = mysqli_fetch_assoc($resultado)){
		$html .= '<tr><td>'.$dado['id'] . "</td>";
		$html .= '<td>'.$dado['nome'] . "</td>";
		$html .= '<td>'.$dado['email'] . "</td>";
		$html .= '<td>'.$dado['rg'] . "</td>";
		$html .= '<td>'.$dado['acessibilidade'] . "</td>";
		$html .= '<td>'.$dado['matricula'] . "</td>";
		$html .= '<td>'.$dado['celular'] . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table';


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require "dompdf/autoload.inc.php";

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Relatório MiniCurso 4 </h1>
			<h1 style="text-align: center;"> Técnicas de observação do Céu  </h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_minicurso4.pdf",
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>
