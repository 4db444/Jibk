<?php

class TransactionModal {

    private static $connection;

    static function Connect () {
        try {
            self::$connection = new PDO("mysql:host=localhost;dbname=jibk", "root", "Brahim@444");
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    static function CreateTransaction (string $type, string $title, float $amount, string $description, string $date){

        if(empty($date)){
            $sql = "insert into $type (title, amount, description) values ('$title', $amount, '$description')";
        }else {
            $sql = "insert into $type (title, amount, description, date) values ('$title', $amount, '$description', '$date')";
        }

        // echo "insert into $type (title, amount, description, date) values $date";

        $query = self::$connection->query($sql);

    }

}

// $Modal = new TransactionModal();

// $Modal::Connect();

TransactionModal::Connect();

// var_dump(TransactionModal->connection);