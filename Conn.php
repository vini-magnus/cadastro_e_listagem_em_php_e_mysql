<?php

abstract class Conn 
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "celke";
    public int $port = 3306;
    public object $connect;

    public function connectDb()
    {
        try{

        $this->connect= new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . 
        ';dbname=' . $this->dbname, $this->user, $this->pass);

            echo "Conexão com o banco de dados realizada com sucesso!<br><br>";


            return $this->connect;

        }catch (Exception $err){

            echo "Erro: Conexão com o banco de dados não realizada!";

        }
    }
 }

?>