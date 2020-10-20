<?php
    session_start();
    $password_regex="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,16}$/";
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    if(isset($email) && $email!="" && isset($password) && $password!=""){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(preg_match($password_regex,$password)==1){
                login($email,$password);
            }else{
                error();
            }
        }else{
            error();
        }
    }else{
        error();
    }
    function login($email,$password){
        include "sql-connect.php";
        $query="SELECT nombre, apellido FROM usuario WHERE correo=:correo";
        $query=$conn->prepare($query);
        $query->execute([":correo"=>$email]);
        $usuario=$query->fetch();
        if($usuario!=null){
            if(base64_decode($usuario["password"])==$password){
                $_SESSION["name"]=$usuario["nombre"];
                $_SESSION["surname"]=$usuario["apellido"];
                $_SESSION["email"]=$email;    
            }else{
                error();
            }
        }else{
            error();
        }
    }
    function error(){
        setcookie("error","Login no valido",time()+60);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>