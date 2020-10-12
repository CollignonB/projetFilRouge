<?php 

try{
    $db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }catch(PDOException $e){
        print"Erreur !: " . $e->getMessage() . "</br>";
        die();
  }
?>