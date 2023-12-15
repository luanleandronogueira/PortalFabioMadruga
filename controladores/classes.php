<?php 

if (!defined('__INCLUDED_BY_OTHER_FILE__')) {
    // Se a constante não estiver definida, encerre a execução
    header('HTTP/1.0 403 Forbidden');
    header("Location: ./index.php");
    exit('Acesso proibido');
};

include 'conexao.php';

$conexao = new Conexao();

class Aluno {

    private $conexao;
    private $id;
    private $nome_aluno;
    private $cpf_aluno;
    private $contato_aluno;
    private $data_nascimento_aluno;
    private $email_aluno;
    private $endereco_aluno;
    private $senha_portal_aluno;
    private $status_aluno;

    public function __construct($conexao, $nome_completo, $cpf_aluno, $contato_aluno, $data_nascimento_aluno, $email_aluno, $endereco_aluno, $senha_portal_aluno, $status_aluno)
    {
        $this->conexao = $conexao->conectar();
        $this->nome_aluno = $nome_completo;
        $this->cpf_aluno = $cpf_aluno;
        $this->contato_aluno = $contato_aluno;
        $this->data_nascimento_aluno = $data_nascimento_aluno;
        $this->email_aluno = $email_aluno;
        $this->endereco_aluno = $endereco_aluno;
        $this->senha_portal_aluno = $senha_portal_aluno;
        $this->status_aluno = $status_aluno;
        
    }   

    public function CadastraNovoAluno($nome_aluno, $cpf_aluno, $contato_aluno, $data_nascimento_aluno, $email_aluno, $endereco_aluno, $senha_portal_aluno, $status_aluno) {

        if ((empty($nome_aluno)) and (empty($cpf_aluno)) and (empty($contato_aluno)) and (empty($data_nascimento_aluno)) and (empty($email_aluno)) and empty($endereco_aluno) and (empty($senha_portal_aluno)) and (empty($status_aluno))){

            header("Location: ../CadastraNovoAluno.php?inclusao=1");

        } else {

            $query = "INSERT INTO alunos (nome_aluno, cpf_aluno, contato_aluno, data_nascimento_aluno, email_aluno, endereco_aluno, senha_portal_aluno, status_aluno) VALUES (:nome_aluno, :cpf_aluno, :contato_aluno, :data_nascimento_aluno, :email_aluno, :endereco_aluno, :senha_portal_aluno, :status_aluno)";

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':nome_aluno', $this->nome_aluno);
            $stmt->bindValue(':cpf_aluno', $this->cpf_aluno);
            $stmt->bindValue(':contato_aluno', $this->contato_aluno);
            $stmt->bindValue(':data_nascimento_aluno', $this->data_nascimento_aluno);
            $stmt->bindValue(':email_aluno', $this->email_aluno);
            $stmt->bindValue(':endereco_aluno', $this->endereco_aluno);
            $stmt->bindValue(':senha_portal_aluno', $this->senha_portal_aluno);
            $stmt->bindValue(':status_aluno', $this->status_aluno);

            $stmt->execute();

            header('Location: ../alunos.php?inclusao=0');

        }

    }

    public function AtualizaDadosAluno($conexao, $id_aluno, $nome_completo, $cpf_aluno, $contato_aluno, $data_nascimento_aluno, $email_aluno, $endereco_aluno, $senha_portal_aluno, $status_aluno) {
        if (empty($nome_completo) || empty($cpf_aluno) || empty($contato_aluno) || empty($data_nascimento_aluno) || empty($email_aluno) || empty($endereco_aluno) || empty($senha_portal_aluno) || empty($status_aluno)) {
            header("Location: ../CadastraNovoAluno.php?inclusao=1");
        } else {
           
            $query = "UPDATE alunos
            SET nome_aluno = :nome_completo, cpf_aluno = :cpf_aluno, contato_aluno = :contato_aluno, data_nascimento_aluno = :data_nascimento_aluno, email_aluno = :email_aluno, endereco_aluno = :endereco_aluno, senha_portal_aluno = :senha_portal_aluno, status_aluno = :status_aluno  WHERE id_aluno = :id_aluno";
    
            $stmt = $this->conexao->prepare($query);
    
            $stmt->bindValue(':nome_completo', $nome_completo);
            $stmt->bindValue(':cpf_aluno', $cpf_aluno);
            $stmt->bindValue(':contato_aluno', $contato_aluno);
            $stmt->bindValue(':data_nascimento_aluno', $data_nascimento_aluno);
            $stmt->bindValue(':email_aluno', $email_aluno);
            $stmt->bindValue(':endereco_aluno', $endereco_aluno);
            $stmt->bindValue(':senha_portal_aluno', $senha_portal_aluno);
            $stmt->bindValue(':status_aluno', $status_aluno);
    
            $stmt->execute();
    
            header('Location: ../alunos.php?inclusao=0');
        }
    }
    
}

// Função para verificar se há uma sessão aberta
function verificarSessao() {
    session_start();
    // ob_start(); // Se necessário, descomente esta linha

    if ((!isset($_SESSION['id_usuario'])) AND (!isset($_SESSION['nome_usuario']))) {
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página! </p>";
        header("Location: index.php?usuario=negado");
        exit(); // Importante para evitar execução adicional após o redirecionamento
    }
}

// Função para selecionar no banco de dados todos os alunos
function contaAlunos() {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

	$query = 'SELECT * FROM alunos';

	$stmt = $conn->prepare($query);

	$stmt->execute();

    $contagemAlunos = $stmt->rowCount();

    return $contagemAlunos;

}

// Função para selecionar no banco de dados os alunos ativos
function contaAlunosAtivos() {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

	$query = 'SELECT * FROM alunos WHERE status_aluno = 0';

	$stmt = $conn->prepare($query);

	$stmt->execute();

    $contagemAlunosAtivos = $stmt->rowCount();

    return $contagemAlunosAtivos;

}

// Função para selecionar no banco de dados os alunos inativos
function contaAlunosInativos() {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

	$query = 'SELECT * FROM alunos WHERE status_aluno = 1';

	$stmt = $conn->prepare($query);

	$stmt->execute();

    $contagemAlunosInativos = $stmt->rowCount();

    return $contagemAlunosInativos;

}

function mensalidadesAtrasadas() {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

	$query = "SELECT * FROM mensalidades 
              WHERE status_pagamento = 'aberto'";

	$stmt = $conn->prepare($query);

	$stmt->execute();

    $contagemMensalidadeAtrasadas = $stmt->rowCount();

    return $contagemMensalidadeAtrasadas;

}

function listaUltimosAlunos() {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

	$query = "SELECT * FROM alunos ORDER BY id_aluno DESC
    LIMIT 10";

	$stmt = $conn->prepare($query);

	$stmt->execute();

    while ($Alunos = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $ultimosAlunos[] = $Alunos;

    }

    return $ultimosAlunos;

}

function cadastraNovoUsuario($conexao, $nome_usuario, $cpf_usuario, $senha_usuario, $tipo_usuario) {

    $conexao = new Conexao();

    $conn = $conexao->Conectar();

    $query = "INSERT INTO usuarios (nome_usuario , cpf_usuario , senha_usuario, tipo_usuario) VALUES (:nome_usuario, :cpf_usuario, :senha_usuario, :tipo_usuario)";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':nome_usuario', $nome_usuario);
    $stmt->bindValue(':cpf_usuario', $cpf_usuario);
    $stmt->bindValue(':senha_usuario', $senha_usuario);
    $stmt->bindValue(':tipo_usuario', $tipo_usuario);

    $stmt->execute();
}




