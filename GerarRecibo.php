<?php 

require 'controladores/lib/vendor/autoload.php';

// echo '<pre>';
//     print_r($_GET);
// echo '</pre>';

$nome = $_GET['nome'];
$valorMensalidade = $_GET['valorMensalidade'];
$mesPago = $_GET['mesPago'];
$ano = $_GET['ano'];

// reference the Dompdf namespace
use Dompdf\Dompdf;

if ($nome == "" or $valorMensalidade == "" or $mesPago == "" or $ano == "") {

    header("Location: alunos.php");
    die;

} else {

    if ($mesPago == '01') {

        $mesPago = 'Janeiro';
    }
    if ($mesPago == '02') {

        $mesPago = 'Fevereiro';
    }
    if ($mesPago == '03') {

        $mesPago = 'Março';
    }
    if ($mesPago == '04') {

        $mesPago = 'Abril';
    }
    if ($mesPago == '05') {

        $mesPago = 'Maio';
    }
    if ($mesPago == '06') {

        $mesPago = 'Junho';
    }
    if ($mesPago == '07') {

        $mesPago = 'Julho';
    }
    if ($mesPago == '08') {

        $mesPago = 'Agosto';
    }
    if ($mesPago == '09') {

        $mesPago = 'Setembro';
    }
    if ($mesPago == '10') {

        $mesPago = 'Outubro';
    }
    if ($mesPago == '11') {

        $mesPago = 'Novembro';
    }
    if ($mesPago == '12') {

        $mesPago = 'Dezembro';
    }

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
    $dadosImpressao .= "<p>     Declaramos que recebemos do aluno(a) <strong>{$nome}</strong>, o valor de <strong>R$ {$valorMensalidade}</strong> referente ao pagamento da mensalidade do mês <strong>{$mesPago}</strong> de <strong>{$ano}</strong>, pago por meio de transferência eletrônica. Por meio deste recibo comprovamos o pagamento.</p>";
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
    $dompdf->stream();

}
?>