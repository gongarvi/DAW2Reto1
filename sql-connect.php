<?php
    $servername="localhost";
    $username="root";
    $passwordDB="";
    $databasename="blog_wiki";
    
    $hostdb="mysql:host=$servername;dbname=$databasename";
    $conn = new PDO($hostdb,$username,$passwordDB);
?>