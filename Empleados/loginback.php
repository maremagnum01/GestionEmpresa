<?php
    require "conexion/conexion_db_host.php";

    session_start();
    $mostrarModalLogin= false;
    // error_reporting(0);
    
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }

    if(isset($_POST["login"])){
        $email = $_POST["email_login"];
        $password_login = md5($_POST["password_login"]);

        $sql_bind = $pdo->query("SELECT * FROM usuarios WHERE email='$email' AND password='$password_login'");
        // $sql_bind->bindParam(':email', $email);
        // $sql_bind->bindParam(':password', $password_login);
        $sql_bind->execute();
        // print_r($sql_bind->rowCount());
        $resultado = $sql_bind->rowCount();

        if( $resultado > 0){
            $row = $sql_bind->fetch(PDO::FETCH_ASSOC);
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
        }else{
            echo "<script>alert('La contraseña o email son incorrectos...')</script>";
            $mostrarModalLogin = true;
        }
    }

?>