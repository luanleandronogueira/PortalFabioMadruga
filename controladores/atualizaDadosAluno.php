<?php 

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

//  include 'classes.php';
include 'conexao.php';

    $conexao = new Conexao();
    $conn = $conexao->Conectar();

     $id_aluno = $_POST['id_aluno'];

     if (isset($_POST['id_aluno'])) {
        $id_aluno = $_POST['id_aluno'];

        $query = 'SELECT * FROM alunos WHERE id_aluno = :id_aluno';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":id_aluno", $id_aluno);
        $stmt->execute();
    
        $linhas = $stmt->rowCount();

        if ($linhas == 0) {

            header("Location: alunos.php");
            die;

        } 

    } else {

        header("Location: alunos.php");

    }

    if (empty($id_aluno)) {
            
        header('Location: ../alunos.php');

    } else {

        $nome_completo = ucwords($_POST['nome_aluno']);
        $cpf_aluno = $_POST['cpf_aluno'];
        $contato_aluno = $_POST['contato_aluno'];
        $data_nascimento_aluno = $_POST['data_nascimento_aluno'];
        $email_aluno = $_POST['email_aluno'];
        $endereco_aluno = ucwords($_POST['endereco_aluno']);
        $senha_portal_aluno = $_POST['senha_portal_aluno'];
        $status_aluno = $_POST['status_aluno'];

        $query = "UPDATE alunos
        SET nome_aluno = :nome_completo, cpf_aluno = :cpf_aluno, contato_aluno = :contato_aluno, data_nascimento_aluno = :data_nascimento_aluno, email_aluno = :email_aluno, endereco_aluno = :endereco_aluno, senha_portal_aluno = :senha_portal_aluno, status_aluno = :status_aluno  WHERE id_aluno = :id_aluno";

            $stmt = $conn->prepare($query);

            $stmt->bindValue(':nome_completo', $nome_completo);
            $stmt->bindValue(':cpf_aluno', $cpf_aluno);
            $stmt->bindValue(':contato_aluno', $contato_aluno);
            $stmt->bindValue(':data_nascimento_aluno', $data_nascimento_aluno);
            $stmt->bindValue(':email_aluno', $email_aluno);
            $stmt->bindValue(':endereco_aluno', $endereco_aluno);
            $stmt->bindValue(':senha_portal_aluno', $senha_portal_aluno);
            $stmt->bindValue(':status_aluno', $status_aluno);
            $stmt->bindValue(':id_aluno', $id_aluno);

            $stmt->execute();

            header("Location: ../alunos.php?id=$id_aluno");           

    }

    //  $Dados = $_POST;
    //  echo '<pre>';
    //     print_r($Dados);
    //  echo '</pre>';

?>