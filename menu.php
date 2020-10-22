<link rel="stylesheet" href="css/menu-submenu.css">
<div id="menu">
  <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <?php
          include "sql-connect.php";
          $query="SELECT  id,nombre, color_asociado, color_texto	 FROM tema";
          $query=$conn->prepare($query);
          $query->execute();
          $temas=$query->fetchAll();
          foreach($temas as $tema){
            echo '<li class="nav-item">
              <button class="navbar-submenu-opener" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"aria-expanded="false" aria-label="Toggle navigation">
                '.$tema["nombre"].'
              </button>
            </li>';
          }
        ?>
          
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

<div id ="submenu">

</div>
<script src="javascript/submenu-activation.js"></script>