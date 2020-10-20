<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <div id="cabecera">
        <h1>Blog Servidor</h1>
    </div>
    <div id="menu">
        <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#">Servidor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
            </div>
            <?php
                $login='<a class="nav-link navnar-light nav-item" href="login.php">Login</a>';
                $logout='<a class="nav-link navnar-light nav-item" href="logout.php">Logout</a>';
                if(isset($_SESSION["name"]) && isset($_SESSION["surname"]) && isset($_SESSION["email"])){
                    if($_SESSION["name"]!="" && $_SESSION["surname"]!="" && $_SESSION["email"]!=""){
                        echo $logout;
                    }else{
                        echo $login;
                    }
                }else{
                    echo $login;
                }
            ?>
          </nav>
    </div>
    <div id="submenu">
       
    </div>
    <div id="contenido">
        <form name="login" class="from-group" method="post" action="logeo.php">
        <h2>Login</h2>
            <div>
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="login_email" required>
            </div>
            <div>
                <label for="email">Contraseña</label>
                <input class="form-control" type="password" name="password" id="login_password" required>
            </div>
            <input class="btn btn-primary mb-2" type="submit" value="Login">
        </form>
        <form name="register" class="form-group" method="post" action="register.php">
            <h2>Registro</h2>
            <div>
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="register_name" required>
            </div>        
            <div>
                <label for="surname">Surname</label>
                <input class="form-control" type="text" name="surname" id="register_surname" required>    
            </div>
            <div>
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="register_email" required>
            </div>
            <div>
                <label for="email">Contraseña</label>
                <input class="form-control" type="password" name="password" id="register_password" required>
            </div>
            <input class="btn btn-primary mb-2" type="submit" value="Registrar">
        </form>
    </div>
    <div id="modal">
    <?php
        
        
        if( isset($_COOKIE["error"])){
            $error=$_COOKIE["error"];
            setcookie("error","",time());
            echo "<div  class='modal' tabindex='-1' role='dialog'>
                <div class='modal-body'>
                    <div class='alert  alert-danger' role='alert'>
                        $error
                    </div>
                </div>
                   
            </div>";
            echo '<script type="text/JavaScript">  
                   /*
                   var timeout=setTimeout(function(){
                        $(".modal").hide();
                    },1000);
                    */
                </script>'; 
        }else{
            echo '<script type="text/JavaScript">  
                    console.log("No he entrado a la cookie");
                </script>'; 
        }
    ?>
    </div>
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/login-register.js   "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>