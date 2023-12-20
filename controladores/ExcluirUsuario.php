<?php 

// Função para excluir

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);
    
include 'classes.php';

$id_usuario = $_GET['id'];

if (!empty($id_usuario)){

    DeletaUsuario($conexao, $id_usuario);
    header("Location: ../ListarUsuariosCadastrados.php?deletadoUsuario=sucesso");


} else {

    header("Location: index.php");
    die();
}


?>