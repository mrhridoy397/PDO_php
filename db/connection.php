<?php 

class curd2{
    public $conn;
    public function __construct($host,$user,$pass,$dbname){
        $dsn="mysql:host=$host;dbname=$dbname";
        try{
            $this->conn = new PDO($dsn,$user,$pass);
            // echo "connection success";
        }catch(PDOException $e){
            die("Erro!:". $e->getMessage());
        }
    }
}

?>