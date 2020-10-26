<?php
    session_start();
    session_unset();
    var_dump($_SESSION);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>