<?php
    $nombre=$_POST["name"];
    $apellido=$_POST["surname"];
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(isset($nombre) && isset($apellido) &&  isset($email) &&  isset($password) && $nombre!="" && $apellido!="" && $email!="" && $password!=""){
        $password_regex="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,16}$/";
        if(preg_match($password_regex,$password)==1){
            $password=base64_encode($password);
            var_dump($password);
            include "sql-connect.php";
            $query="INSERT INTO usuario(`nombre`,`apellido`,`correo`,`password`) VALUES (:nombre,:apellido,:correo,:contrasenia)";
            $query=$conn->prepare($query);
            $query->execute(
                array(
                    ":nombre"=>$nombre,
                    ":apellido"=>$apellido,
                    ":correo"=>$email,
                    ":contrasenia"=>$password
                )
            );  
            //header("Location: " . $_SERVER["HTTP_REFERER"]);          
        }
    }else{
        
        setcookie("error","Registro no valido",time()+60);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        
    }
?>