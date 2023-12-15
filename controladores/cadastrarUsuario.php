<?php 

    //Permite o include de arquivos que não podem ser abertos no navegador
	define('__INCLUDED_BY_OTHER_FILE__', true);
    include 'classes.php';

    $conexao = new Conexao();
    $conn = $conexao->Conectar();

    // Recebe os dados por POST
    $dados = $_POST;

    // Faz a extração dos Arrays e separa os dados
    extract($dados);

    $nome_uppercase = ucwords($nome_usuario);

    $ConsultaBanco = "SELECT cpf_usuario FROM usuarios WHERE cpf_usuario = :cpf_usuario LIMIT 1";
    $stmt = $conn->prepare($ConsultaBanco);
    $stmt->bindParam(':cpf_usuario', $cpf_usuario);
    $stmt->execute();

    $resultadoConsulta = $stmt->rowCount();

    if($resultadoConsulta == 1) {

        // echo 'Já existe o usuario ';
        header('Location: ../Configuracoes.php?usuario=Ja_Cadastrado');
        die();

    } else {

        // Deixa a senha criptogravada para salvar no BD
        $senha_hash = password_hash($senha_usuario , PASSWORD_DEFAULT);

        // $hash é o hash previamente armazenado no banco de dados
        if (password_verify($senha_usuario, $senha_hash)) {
            
            // echo "Senha correta! " . $senha_hash;
            //função para salvar no banco de dados
            cadastraNovoUsuario($conexao, $nome_uppercase, $cpf_usuario, $senha_hash, $tipo_usuario);

            header('Location: ../Configuracoes.php?usuarioCadastrado=Sucesso');

        } else {

            header('Location: ../Configuracoes.php?erro=Erro_Senha');
            die(); 
            
        }


    }

?>