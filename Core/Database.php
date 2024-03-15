<?php
namespace Core;
use PDO;

class Database{

    public $connection;
    public $statement;

    function __construct($config, $username = "root", $password = ""){

        $dsn = "mysql:" . http_build_query($config,"", ";");

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }

    function query($query, $params = []){


    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

     return $this;

    }

    function find(){


        return $this->statement->fetch();

    }

    function findAll(){


        return $this->statement->fetchAll();

    }


    function findOrFail(){

        $result = $this->find();

        if(! $result){

            abort();

        }

        return $result;
    }


}




