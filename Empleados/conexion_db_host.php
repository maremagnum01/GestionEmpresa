<?php
    $servidor = "mysql:dbname=freedb_crudphp;host=sql.freedb.tech";
    $usuario = "freedb_maremagnum01";
    $password = "qs9weFwDT?Nq&Rn";


    try{
        $pdo= new PDO($servidor,$usuario,$password);
    }catch(PDOException $e){
        echo "no se conecto". $e->getMessage();
    }
?>