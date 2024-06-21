<?php
    session_start();
    include_once("config.php");
    $fname=mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname=mysqli_real_escape_string($conn, $_POST["lname"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql=mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)> 0) {
                echo"$email Already in Database";
            }
            else{
                if(isset($_FILES['image'])){
                    $img_name= $_FILES['image']['name'];
                    $img_size= $_FILES['image']['size'];
                    $img_type= $_FILES['image']['type'];
                    $img_temp=$_FILES['image']['tmp_name'];
                    $extension = pathinfo($img_name, PATHINFO_EXTENSION);
                    $ext = ['jpeg','png','jpg'];
                    if(in_array($extension, $ext)===true){
                        $time=time();
                        $new_img_name=$time.$img_name;
                        if(move_uploaded_file($img_temp,"image/".$new_img_name)){
                            $status="Active now";
                            $random_id=rand($time,100000000);
                            $sql2=mysqli_query($conn,"INSERT into users (unique_id,first_name,last_name,email,password,image,status)
                                                VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}') ");
                            if($sql2){
                                $sql2=mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' and password = '{$password}'");
                                $row=mysqli_fetch_assoc($sql2);
                                $_SESSION['unique_id']= $row['unique_id'];
                                echo "success";
                            }
                            else{
                                echo "not inserted";
                            }
                        }
                        else{
                            echo"image not moved";
                        }
                    }
                    else{
                        echo "Upload png, jpeg, jpg image";
                    }
                    
                }
            }
        }
        else{
            echo"$email Not Valid";
        }
    }
    else{
        echo"All input required";
    }
?>