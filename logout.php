<?php
    session_start();
    if (isset($_SESSION["unique_id"])){
        $logout_id= $_SESSION["unique_id"];
        include_once("php/config.php");
        $sql="UPDATE users set status='Offline now' where unique_id={$logout_id}";
        $result=mysqli_query($conn,$sql);
        session_destroy();
        header("location: login.php");

    }
    else{
        header("location: login.php");
    }
?>