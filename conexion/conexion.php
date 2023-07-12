<?php
    $servidor = "mysql:dbname=crudphp;host=127.0.0.1";
    $usuario = "root";
    $password = "";


    try{
        $pdo= new PDO($servidor,$usuario,$password);
    }catch(PDOException $e){
        echo "no se conecto". $e->getMessage();
    }
?>