<?php 

if (!defined('__INCLUDED_BY_OTHER_FILE__')) {
    // Se a constante não estiver definida, encerre a execução
    header('HTTP/1.0 403 Forbidden');
    header("Location: ../index.php");
    exit('Acesso proibido');
}

   class Conexao {

    private $host = "localhost";
    private $dbnome = "db_fabio_madruga";
    private $usuariodb = "root";
    private $senha = "";

    public function Conectar(){

        try {
            $conexao = new PDO(

                "mysql:host=$this->host;dbname=$this->dbnome", 
                "$this->usuariodb", 
                "$this->senha"

            );
            return $conexao;
            
        } 
        catch (PDOException $e){

            echo '<p>' .$e->getMessage() . ' </p>';
            
        }
    }

}



?>