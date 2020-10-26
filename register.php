<?php
    $nombre=$_POST["name"];
    $apellido=$_POST["surname"];
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(isset($nombre) && isset($apellido) &&  isset($email) &&  isset($password) && $nombre!="" && $apellido!="" && $email!="" && $password!=""){
        $password_regex="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,16}$/";
        if(preg_match($password_regex,$password)==1){
            $password=base64_encode($password);
            include "sql-connect.php";
            $query="INSERT INTO usuario(`nombre`,`apellido`,`correo`,`password`) VALUES (?,?,?,?)";
            $query=$conn->prepare($query);
            $datos=array($nombre,$apellido,$email,$password);
            $query->execute($datos);  
            $error=$query->errorCode();
            if($error!=0){
                setcookie("error","Error ($error): al registrar",time()+60);
            }else{
                setcookie("success","Se registro correctamente",time()+60);           
            }
            header("Location: " . $_SERVER["HTTP_REFERER"]);          
        }else{
            setcookie("error","Registro no valido",time()+60);
            header("Location: " . $_SERVER["HTTP_REFERER"]);          
        }
    }else{
        
        setcookie("error","Registro no valido",time()+60);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        
    }
?>