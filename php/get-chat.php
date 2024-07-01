<?php
    session_start();    
    if(isset($_SESSION["unique_id"])){
        $output="";
        include_once("config.php");
        $sender_id=mysqli_real_escape_string($conn,$_POST["sender_id"]);
        $receiver_id=mysqli_real_escape_string($conn,$_POST["receiver_id"]);
        $sql=mysqli_query($conn,"SELECT * from message left join users on users.unique_id=message.sender_id where (sender_id={$sender_id} and receiver_id={$receiver_id}) or (sender_id={$receiver_id} and receiver_id={$sender_id}) order by msg_id asc" );
        while($row=mysqli_fetch_array($sql)){
            if($row["sender_id"]==$sender_id){   
            $output.= '<div class="chat outgoing">
                        <div class="details">
                            <p>'.$row['message'].'</p>
                        </div>
                        </div>';
            }
            else{
                $output.= '<div class="chat incoming">
                            <img src="php/image/'.$row['image'].'" alt="">
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                            </div>';
            }
        }




        echo $output;

    }
    else{
        header("../login.php");
    }
    

?>