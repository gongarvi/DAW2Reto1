<?php
    if(isset($_SESSION["name"]) && isset($_SESSION["surname"]) && isset($_SESSION["email"]) && isset($_SESSION["administrador"])){
        if(!($_SESSION["name"]!="" && $_SESSION["surname"]!="" && $_SESSION["email"]!="" && $_SESSION["administrador"]==true)){
            back();
        }
    }else{
        back();
    }
    function back(){
        setcookie("error","No tienes permiso para entrar a esa página.",time()+60);
        if(isset($_SERVER["HTTP_REFERER"])){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            header("Location: ../index.php");
        }
    }
?>