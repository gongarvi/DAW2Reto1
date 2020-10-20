<?php
    session_unset();
    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>