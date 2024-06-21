<?php
    session_start();    
    include_once("config.php");
    $sql=mysqli_query($conn,"SELECT * FROM users");
?>