<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
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
            <a class="nav-link navnar-light nav-item" href="login.php">Login</a>
          </nav>
    </div>
    <div id="submenu">
       
    </div>
    <div id="contenido">
        <div class="formularios">
            <form name="login" class="from-group">
                <div>
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="login_email">
                </div>
                <div>
                    <label for="email">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="login_password">
                </div>
                <input class="btn btn-primary mb-2" type="submit">
            </form>
            <form name="register" class="form-group" method="post">
            <div>
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="register_name">
            </div>        
                <div>
                    <label for="surname">Surname</label>
                    <input class="form-control" type="text" name="surname" id="register_surname">    
                </div>
                <div>
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="register_email">
                </div>
                <div>
                    <label for="email">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="register_password">
                </div>
                <input class="btn btn-primary mb-2" type="submit">
            </form>
        </div>
    </div>
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>