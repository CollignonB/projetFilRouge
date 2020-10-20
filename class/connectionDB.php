<?php 

class ConnectionDB {
    const HOST = "localhost";
    const DBNAME = "banque_php";
    const LOGIN = "root";

    public function PDOConnection (string $host, string $DBName, string $login){
        $db = new PDO('mysql:host='..';dbname=banque_php','root')
    }
}