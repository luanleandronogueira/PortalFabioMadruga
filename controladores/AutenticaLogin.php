<?php 

$login = $_POST['usuario_aluno'];
$senha = $_POST['senha_aluno'];

$login_salvo = "117.698.684-88";
$senha_salva = "Senh@96272266";

if (empty($_POST['enviar_requisicao'])) {

    if ($login === $login_salvo && $senha === $senha_salva) {

       echo 'Login aceito'; 
       echo $login;
       echo $senha;

    } else {

        header('Location: ../index.php?erro=1');
        exit();

    }

} else {

    header('Location: ../index.php?erro=1');
    exit();


}



?>