<?php 

require 'lib/vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$nome = $_GET['aluno'];
$valor = $_GET['valor'];
$mes = $_GET['mes'];
$ano = date('Y');


// instantiate and use the dompdf class
$dompdf = new Dompdf(['enable_remote' => true]);

$dadosImpressao = "";


// Head e inicio da página html
$dadosImpressao .= "<!DOCTYPE html>";
$dadosImpressao .= "<html lang='pt-br'>";
$dadosImpressao .= "<head>";
$dadosImpressao .= "<meta charset='utf-8'>";
$dadosImpressao .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
$dadosImpressao .= "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
$dadosImpressao .= "<link rel='stylesheet' href='http://localhost/portal-madruga/css/recibo.css'>";
$dadosImpressao .= "</head>";


// Inicia o Body do HTML
$dadosImpressao .= "<body class='theme-blue'>";
$dadosImpressao .= "<div class='recibo-container'>";
$dadosImpressao .= " <div class='recibo'>";
$dadosImpressao .= "<div class='logo'>";
$dadosImpressao .= "<img src='http://localhost/portal-madruga/img/avatars/logo.jpeg'";
$dadosImpressao .= "</div>";
$dadosImpressao .= "<div class='titulo'>";
$dadosImpressao .= " <h2>Recibo de Pagamento</h2>";
$dadosImpressao .= "</div>";
$dadosImpressao .= "<div class='dados-recibo'>";
$dadosImpressao .= "<p>     Declaramos que recebemos do aluno(a) <strong>{$nome}</strong>, o valor de <strong>R$ {$valor}</strong> referente ao pagamento da mensalidade do mês de <strong>{$mes}</strong> de <strong>{$ano}</strong>, pago em mãos. Por meio deste recibo comprovamos o pagamento.</p>";
$dadosImpressao .= "</div>";
$dadosImpressao .= "<div class='assinatura'>";
$dadosImpressao .= "<p>___________________________________________</p></br>";
$dadosImpressao .= "<span>Financeiro Fábio Madruga Concursos</span>";
$dadosImpressao .= "</div>";
$dadosImpressao .= "</div>";
$dadosImpressao .= "</div>";
$dadosImpressao .= "</body>";
$dadosImpressao .= "</html>";
// Fim do HTML

$dompdf->loadHtml($dadosImpressao);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Recibo de " . $nome . " do mês de " . $mes);


?>