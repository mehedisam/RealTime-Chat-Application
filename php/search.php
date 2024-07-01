<?php
    include_once("config.php");
    $search_value=mysqli_real_escape_string($conn, $_POST['searchValue']);
    $sql=mysqli_query($conn,"SELECT * FROM users where first_name like '%{$search_value}%' or last_name like '%{$search_value}%'");
    $output="";
    if(mysqli_num_rows($sql)> 0){
        while($row=mysqli_fetch_array($sql)){
            include("data.php");
        }
    }
    else{  $output.="No user found"; }
    echo $output;
?>
