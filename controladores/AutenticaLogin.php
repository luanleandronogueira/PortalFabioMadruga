<?php 
session_start();

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include "conexao.php";
$conexao = new Conexao;
$conn = $conexao->Conectar();

$login = $_POST['usuario_aluno'];
$senha = $_POST['senha_aluno'];


if (!empty($login) and !empty($senha)) {

    $query = "SELECT * FROM usuarios WHERE cpf_usuario = :login AND senha_usuario = :senha LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // echo '<pre>';
    // var_dump($usuario);
    // echo '</pre>';
    if (empty($_POST['enviar_requisicao'])) {

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        $login_salvo = $usuario['cpf_usuario'];
        $senha_salva = $usuario['senha_usuario'];

        if ($login === $login_salvo && $senha === $senha_salva) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
            header('Location: ../home.php');
            
            // echo '<pre>';
            //     print_r($usuario);
            // echo '</pre>';

        } else {

            header('Location: ../index.php?erro=1');
            exit();

        }

    } else {

        header('Location: ../index.php?erro=1');
        exit();


    }


} else {

    header('Location: ../index.php?erro=1');
    exit();

}





?>