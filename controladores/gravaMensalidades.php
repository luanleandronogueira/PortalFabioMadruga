<?php 

include 'conexao.php';
$conexao = new Conexao();
$conn = $conexao->Conectar();


class Mensalidade {

    private $conexao;
    private $id_mensalidade;
    private $id_aluno;
    private $MesesSelecionados;
    private $ano;
    private $valor;
    private $status_pagamento;
    private $comprovante_pagamento;

    public function __construct($conexao, $id_aluno, $MesesSelecionados, $ano, $valor, $status_pagamento, $comprovante_pagamento) {
        $this->conexao = $conexao;
        $this->id_aluno = $id_aluno;
        $this->MesesSelecionados = $MesesSelecionados;
        $this->ano = $ano;
        $this->valor = $valor;
        $this->status_pagamento = $status_pagamento;
        $this->comprovante_pagamento = $comprovante_pagamento;
    }

    public function CadastraMensalidades($id_aluno, $MesesSelecionados, $ano, $valor, $status_pagamento, $comprovante_pagamento) {

        if ((empty($id_aluno)) || (empty($MesesSelecionados)) || (empty($ano)) || (empty($valor)) || (empty($status_pagamento))) {

            header("Location: ../InserirMensalidades.php?id=$this->id_aluno");


        } else {

            foreach ($MesesSelecionados as $mes) {

                    $query = "INSERT INTO Mensalidades (id_aluno, mes, ano, valor, status_pagamento, comprovante_pagamento) VALUES (:id_aluno, :mes, :ano, :valor, :status_pagamento, :comprovante_pagamento)";

                    $stmt = $this->conexao->prepare($query);

                    $stmt->bindValue(':id_aluno', $this->id_aluno);
                    $stmt->bindValue(':mes', $mes);
                    $stmt->bindValue(':ano', $this->ano);
                    $stmt->bindValue(':valor', $this->valor);
                    $stmt->bindValue(':status_pagamento', $this->status_pagamento);
                    $stmt->bindValue(':comprovante_pagamento', $this->comprovante_pagamento);

                    $stmt->execute();

            }

        }
        
    }
}