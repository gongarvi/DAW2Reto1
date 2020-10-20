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
   