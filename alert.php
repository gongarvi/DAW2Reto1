<div id='modal' class='modal' tabindex='-1' role='dialog'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-body'>
                <div class='alert  alert-danger' role='alert'>
                <?php
                    if(isset($_COOKIE["error"])){
                        $error=$_COOKIE["error"];
                        setcookie("error","",time());
                        echo $error;
                        echo '<script type="text/JavaScript">
                                $(".modal").modal();
                                setTimeout(()=>{$(".modal").modal("hide");},4000);
                            </script>';
                    }else{
                        echo '<script type="text/JavaScript">  
                                console.log("No he entrado a la cookie");
                            </script>'; 
                    }
                ?>
                </div>
            </div>    
        </div>
    </div>
</div>
   
<script type="text/JavaScript"> 
    var alert = document.getElementsByClassName("alert");
    alert.item(0).addEventListener("change",()=>{
        $(".modal").modal();
        setTimeout(()=>{$(".modal").modal("hide");},4000);
    });
</script>