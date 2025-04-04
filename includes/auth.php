<?php
    session_start();
    function verfiicarLogin(){
        if(!isset($_SESSION['usuario_id'])){
            if(isset($_COOKIE['lembrar_usuario'])){
                require_once('../config/database.php');
                $token = $_COOKIE['lembrar_usuario'];
                $token = mysqli_real_escape_string($conn,$token);
                $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE token = '$token'");
                $usuario = mysqli_fetch_assoc($result);

                if($usuario){
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_nome'] = $usuario['nome'];
                    return true;
                }
            }
            header("Location:login.php");
            exit();
        }
        return true;
    }

?>