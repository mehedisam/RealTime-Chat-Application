<?php
    session_start();    
    if(isset($_SESSION["unique_id"])){
        include_once("config.php");
        $sender_id=mysqli_real_escape_string($conn,$_POST["sender_id"]);
        $receiver_id=mysqli_real_escape_string($conn,$_POST["receiver_id"]);
        $message=mysqli_real_escape_string($conn,$_POST["message"]);
        if(!empty($message)){
            $sql=mysqli_query($conn,"INSERT into message (sender_id, receiver_id, message)
                            VALUES({$sender_id},{$receiver_id},'{$message}')") or die();
            // $output="";
            // $sql2=mysqli_query($conn,"SELECT * from message where receiver_id={$receiver_id}");
            // while($row=mysqli_fetch_array($sql2)){
            //     $output.= '<div class="chat outgoing">
            //                 <div class="details">
            //                     <p>'.$row['message'].'</p>
            //                 </div>
            //                 </div>';


            // }




            // echo $output;
        }
    }
    else{
        header("../login.php");
    }
    
?>