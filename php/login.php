<?php
    session_start();
    include_once("config.php");
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);

    if(!empty($email) && !empty($password)){
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $sql=mysqli_query($conn, $query);
        if(mysqli_num_rows($sql)> 0){
            $query2="SELECT * FROM users WHERE email = '{$email}' and password = '{$password}'";
            $sql2=mysqli_query($conn, $query2);
            if(mysqli_num_rows($sql2)>0) {
                $row=mysqli_fetch_assoc($sql2);
                $_SESSION['unique_id']= $row['unique_id'];
                echo"success";
            }
            else {
                echo "Wrong Password";
            }
        }else{
            echo "Wrong Email";
        }
    }
    else{   
        echo"All Input Field Required";
    }
    
?>