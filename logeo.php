<?php
    session_start();
    $password_regex="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{6,16}$/";
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
    function login($email,$contrasenia){
        
        include "sql-connect.php";
        $query="SELECT nombre, apellido, password,administrador FROM usuario WHERE correo=:correo";
        $query=$conn->prepare($query);
        $query->execute([":correo"=>$email]);
        $usuario=$query->fetch();
        
        if($usuario!=null){
            
            if(password_verify($contrasenia,$usuario["password"])){
                $_SESSION["name"]=$usuario["nombre"];
                $_SESSION["surname"]=$usuario["apellido"];
                $_SESSION["email"]=$email;
                $_SESSION["administrador"]=($usuario["administrador"]==1)?true:false;
                setcookie("success","Login correcto",time()+60);
                header("Location: index.php");
            }else{
                error();
            }
        }else{
            error();
        }
    }
    function error(){
        setcookie("error","Login no valido",time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>