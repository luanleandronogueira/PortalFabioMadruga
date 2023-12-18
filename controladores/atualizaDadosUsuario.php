<?php 

    //Permite o include de arquivos que não podem ser abertos no navegador
	//define('__INCLUDED_BY_OTHER_FILE__', true);
	include 'classes.php';

    if (!empty($_POST)) {

        // Verifica se há sessão aberta.
	    //verificarSessao();
        $usuario = $_POST;

        extract($usuario);
        // var_dump($usuario);

        if(empty($nome_usuario) or empty($cpf_usuario) or empty($senha_usuario)) {

            header("Location: index.php?a=1");
            die();

        } else {

            // criptografar a senha atualizada
            $senha_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);
            $nome_uppercase = ucwords($nome_usuario);
            
            //chama função de atualizar os dados
            AtualizaDadosUsuario($conexao, $nome_uppercase, $cpf_usuario, $senha_hash, $tipo_usuario, $id_usuario);
            header("Location: ../ListarUsuariosCadastrados.php?cadastro=sucesso");

        }

    } else {

        header("Location: index.php?a=senha");
        die();

    }

?>