<div id='modal' class='modal' tabindex='-1' role='dialog'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-body'>
                <div class='alert 
                    <?php
                        $caso="";
                        if(isset($_COOKIE["error"])){
                            echo "alert-danger";
                            $caso="error";
                        }elseif(isset($_COOKIE["warning"])){
                            echo "alert-warning";
                            $caso="warining";
                        }elseif(isset($_COOKIE["success"])){
                            echo "alert-success";
                            $caso="success";
                        }
                    
                    ?>
                    ' role='alert'>
                <?php
                    if($caso===""){
                        echo '<script type="text/JavaScript">  
                                console.log("No he entrado a la cookie");
                            </script>'; 
                    }else{
                        echo $_COOKIE[$caso];
                        setcookie($caso,"",time());
                        echo '<script type="text/JavaScript">
                                $(".modal").modal();
                                setTimeout(()=>{$(".modal").modal("hide");},4000);
                            </script>';
                    }
                ?>
                </div>
            </div>    
        </div>
    </div>
</div>
   
<script type="text/JavaScript"> 
</script>