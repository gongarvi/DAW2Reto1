<?php
session_start();

include "sql-connect.php";
    $comentario=$_POST['comenta'];
    $tema=$_POST['tema'];
    $apartado=$_POST['apartado'];
    $nombre=$_SESSION['email'];
    $id=$_POST['id'];
?>


<script>

function comentario(){
    alert("ALerta");
    var div =document.getElementById("comentario"+<?php echo $i?>).value;
    alert(this.div);
    if (div.contentEditable == "false") {
                div.contentEditable = "true";
                button.innerHTML = "Enable editing!";
            }
}
</script>