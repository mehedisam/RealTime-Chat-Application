<?php
    session_start();    
    include_once("config.php");
    $sql=mysqli_query($conn,"SELECT * FROM users"); 
    $output="";
   

    if (mysqli_num_rows($sql) == 1) {
        $output.="Nothing";
    }
    else if (mysqli_num_rows($sql) > 1) {
        while($row=mysqli_fetch_assoc($sql)) {
            if($row['unique_id']==$_SESSION["unique_id"]){continue;}
            include("data.php");
        }
    }
    echo $output;
    
?>