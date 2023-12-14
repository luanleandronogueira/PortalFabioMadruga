<?php 

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include 'classes.php';
$conexao = new Conexao();
$conn = $conexao->Conectar();

// validação do campo
if ((empty($nome_completo)) and (empty($cpf_aluno)) and (empty($contato_aluno)) and (empty($data_nascimento_aluno)) and (empty($email_aluno)) and empty($endereco_aluno) and (empty($senha_portal_aluno)) and (empty($status_aluno))) {

    header("Location: ../CadastraNovoAluno.php?inclusao=1");

}
        $cpf_aluno = $_POST['cpf_aluno'];

        $query = "SELECT * FROM alunos WHERE cpf_aluno = :cpf_aluno";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_aluno', $cpf_aluno);
        $stmt->execute();

        $verificacao = $stmt->rowCount();

        if ($verificacao >= 1){

            header('Location: ../CadastraNovoAluno.php?inclusao=3');

        } else {

            // dados recebidos por post
            $nome_aluno = ucwords($_POST['nome_aluno']);
            //$cpf_aluno = $_POST['cpf_aluno'];
            $contato_aluno = $_POST['contato_aluno'];
            $data_nascimento_aluno = $_POST['data_nascimento_aluno'];
            $email_aluno = $_POST['email_aluno'];
            $endereco_aluno = ucwords($_POST['endereco_aluno']);
            $senha_portal_aluno = $_POST['senha_portal_aluno'];
            $status_aluno = $_POST['status_aluno'];


            $Aluno = new Aluno($conexao, $nome_aluno, $cpf_aluno, $contato_aluno, $data_nascimento_aluno, $email_aluno, $endereco_aluno, $senha_portal_aluno, $status_aluno);

            $Aluno->CadastraNovoAluno($nome_aluno, $cpf_aluno, $contato_aluno, $data_nascimento_aluno, $email_aluno, $endereco_aluno, $senha_portal_aluno, $status_aluno);

        }

// echo $nome_aluno . '</br>';
// echo $cpf_aluno . '</br>';
// echo $contato_aluno . '</br>';
// echo $data_nascimento_aluno . '</br>';
// echo $email_aluno . '</br>';
// echo $endereco_aluno . '</br>';
// echo $senha_portal_aluno . '</br>';
// echo $status_aluno . '</br>';




?>