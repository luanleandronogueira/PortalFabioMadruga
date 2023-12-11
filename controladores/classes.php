<?php 

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


            // dispado para email usando a biblioteca PHPMailer

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
