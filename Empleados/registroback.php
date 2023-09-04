<?php 
    include('../conexion/conexion.php');

    session_start();
    $mostrarModalRegister = false;

    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
    if(isset($_POST['register'])){


        $user = $_POST['user'];
        $email = $_POST['email'];
        $password_user = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);

        if($password_user == $confirm_password){
            $sql_bind = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
            $sql_bind->bindParam(':email', $email);
            $sql_bind->execute();
            $resultadoA = $sql_bind->rowCount();
            // $resultado_usuario = $sql_bind->fetchAll(PDO::FETCH_ASSOC);
            if(!$resultadoA > 0){
                $sql_bind = $pdo->prepare("INSERT INTO usuarios (usuario, email, password) VALUES (:user, :email, :password)");
                $sql_bind->bindParam(':email', $email);
                $sql_bind->bindParam(':user', $user);
                $sql_bind->bindParam(':password', $password_user);
                $sql_bind->execute();

                if($sql_bind){
                    echo "<script>alert('Usuario registrado!')</script>";
                    $user = "";
                    $email = "";
                    $_POST["password"] = "";
                    $_POST["confirm_password"] = "";
                }else{
                    echo "<script>alert('Error al registrarse')</script>";
                    $mostrarModalRegister = true;
                }
            }else{
                echo "<script>alert('El email ya existe!')</script>";
                $mostrarModalRegister = true;
            }
        }else{
            echo "<script>alert('Las contraseñas no coinciden')</script>";
            $mostrarModalRegister = true;
        }
    }

?>