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
                setcookie("error","Contraseña no valida",time()+(60*60*1000));
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }else{
            setcookie("error","Email no valido",time()+(60*60*1000));
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }else{
        setcookie("error","Debes rellenar el email y la contraseña",time()+(60*60*1000));
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    function login($email,$password){
        include "sql-connect.php";
        $query="SELECT nombre, apellido FROM usuario WHERE password=:password AND correo=:correo";
        $query=$conn->prepare($query);
        $query->execute([":correo"=>$email,":password"=>$password]);
        $usuario=$query->fetch();
        if($usuario!=null){
            $_SESSION["name"]=$usuario["nombre"];
            $_SESSION["surname"]=$usuario["apellido"];
            $_SESSION["email"]=$email;
            
        }else{
            setcookie("error","Login no valido",time()+60);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
?>