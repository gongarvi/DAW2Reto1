<?php
    $caso="";
    if(isset($_COOKIE["error"])){
        $caso="error";
    }elseif(isset($_COOKIE["warning"])){
        $caso="warning";
    }elseif(isset($_COOKIE["success"])){
        $caso="success";
    }
    if($caso===""){
        echo '<script type="text/JavaScript">  
                console.log("No he entrado a la cookie");
            </script>'; 
    }else{
        setcookie($caso,"",time(),"/");
        echo '<script type="text/JavaScript">
                localStorage.setItem("mensaje","'.$_COOKIE[$caso].'");
                localStorage.setItem("tipo","'.$caso.'");
            </script>';
    }
                    
?>

<div id='modal' class='modal' tabindex='-1' role='dialog'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-body'>
                <div class='alert' role='alert'>
                
                </div>
            </div>    
        </div>
    </div>
</div>
<?php
    echo '<script src="http://localhost/generic-alert/alert.js"></script>';
?>
