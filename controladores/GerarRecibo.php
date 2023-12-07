<?php 

require 'lib/vendor/autoload.php';

// echo '<pre>';
//     print_r($_GET);
// echo '</pre>';

$nome = $_GET['nome'];


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(['enable_remote' => true]);

$impressao = "<h1>Recibo de Pagamento</h1> </br>" . $nome;
$impressao .= "<img src='https://www.portalagresteviolento.com.br/wp-content/uploads/2021/11/IMG-20211118-WA0556.jpg'>";

$dompdf->loadHtml($impressao);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>