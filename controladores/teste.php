<?php 

    define('__INCLUDED_BY_OTHER_FILE__', true);
    include 'classes.php';


    $id = '1';
    $dados_host = ChamaEmailHost($conexao, $id);

    

    // $conexao = new Conexao();
    // $conn = $conexao->Conectar();

    // $query = "SELECT * FROM email_host WHERE id = :id";

    // $stmt = $conn->prepare($query);
    // $stmt->bindParam(":id", $id);

    // $stmt->execute();

    // $dados_host =  $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<pre>';
        print_r($dados_host);
    echo '</pre>';

?>