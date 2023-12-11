<?php 

include 'controladores/gravaMensalidades.php';
$conexao = new Conexao();
$conn = $conexao->Conectar();

    $id_aluno = $_POST['id_aluno'];
    $MesesSelecionados = $_POST['mes'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $status_pagamento = $_POST['status_pagamento'];
    $comprovante_pagamento = $_POST['comprovante_pagamento'];

// validação dos campos

if ((empty($conexao)) || (empty($id_aluno)) || (empty($MesesSelecionados)) || (empty($ano)) || (empty($valor)) || (empty($status_pagamento))) {

    header('Location: Alunos.php');


} else {


    foreach ($MesesSelecionados as $mes ) {

       // Query para gravar cada mensalidade selecionada no Foreach

       $query = "INSERT INTO Mensalidades (id_aluno, mes, ano, valor, status_pagamento, comprovante_pagamento) VALUES (:id_aluno, :mes, :ano, :valor, :status_pagamento, :comprovante_pagamento)";

            $stmt = $conn->prepare($query);

            $stmt->bindValue(':id_aluno', $id_aluno);
            $stmt->bindValue(':mes', $mes);
            $stmt->bindValue(':ano', $ano);
            $stmt->bindValue(':valor', $valor);
            $stmt->bindValue(':status_pagamento', $status_pagamento);
            $stmt->bindValue(':comprovante_pagamento', $comprovante_pagamento);

            $stmt->execute();

            header("Location: FinancasAluno.php?id=" . $id_aluno);

        // para fins de debug  
        // echo '<pre>';
        //     echo $id_aluno . " "; 
        //     echo $mes . " ";
        //     echo $ano . " ";
        //     echo $valor . " ";
        //     echo $status_pagamento . " ";
        //     echo $comprovante_pagamento . " ";
        // echo '</pre>';
    
        
    }

}






?>