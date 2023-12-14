<?php 

include 'conexao.php';

$conexao = new Conexao();
$conn = $conexao->Conectar();

$id_mensalidade = $_GET['id'];
$id_aluno = $_GET['id_aluno'];

if (empty($id_mensalidade)) {

    unset($id_mensalidade);
    header("Location: ../Alunos.php");

} else {

    $query = "DELETE FROM mensalidades WHERE id_mensalidade = :id_mensalidade";

    $stmt = $conn->prepare($query);
    $stmt->bindValue('id_mensalidade', $id_mensalidade);
    $stmt->execute();

    header('Location: ../FinancasAluno.php?id=' . $id_aluno);
    
}




?>