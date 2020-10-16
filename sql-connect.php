<?php
    $servername="localhost";
    $username="root";
    $password="";
    $databasename="blog_wiki";

    
    $hostdb="mysql:host=$servername;dbname=$databasename";
    $conn = new PDO($hostdb,$username,$password);
    
    
?>