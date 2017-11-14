<?php

namespace dao;

use PDO;
use PDOException;

class ConnectionFactory
{
    private $con = null;
    private $dbType = "mysql"; //nesta linha podemos escolher o tipo de BD.
    private $host = "localhost";
    private $user = "root";
    private $senha = "";
    private $db = "selectdelivery";

    public function getConnection(){
        try{
            $this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha);
            $this->con-> exec("SET CHARACTER SET utf8");
            return $this->con;
        }catch ( PDOException $ex ){ echo "Erro: ".$ex->getMessage(); }
    }

    public function Close(){
        if( $this->con != null )
            $this->con = null;
    }
}
