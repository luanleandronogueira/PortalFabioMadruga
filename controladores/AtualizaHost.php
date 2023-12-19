<?php 

    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);
    
    // include 'conexao.php';
    include 'classes.php';

    $id = '1';
    
    $dados = $_POST;

    print_r($dados);
    
    extract($dados);

    if(isset($dados) and isset($dados) == '') {

        header("Location: index.php");
        die();

    } else {

        AtualizaEmailHost($conexao, $host, $username, $senhapassword, $smtpsecure, $port, $setfromemail, $setfromtitulo, $setaddaddress, $id);
        header("Location: ../Configuracoes.php?host=Atualizado");
        // print_r($post);

    }
    
?>