<?php
    $sql2=mysqli_query($conn,"SELECT * from message where (sender_id={$row['unique_id']} and receiver_id={$Mainuser_id}) or (receiver_id={$row['unique_id']} and sender_id={$Mainuser_id}) order by msg_id desc limit 1");
    $row2=mysqli_fetch_assoc($sql2);
    $msg="";
    if(mysqli_num_rows($sql2)==1) {
        $msg= $row2['message'];
        (strlen($msg)>28) ? $msg= substr( $msg,0,28).'...': $msg;

        if($row2['sender_id']==$Mainuser_id){
            $msg='You: '. $msg;
        }
    }
    $offline="";
    ($row['status'] == "Offline now") ? $offline= "offline": $offline;
    $output.= '<a href="chat.php?user_id='.$row['unique_id'].'">
                <div class="content">
                    <img src="php/image/'.$row['image'].'" alt="">
                    <div class="details">
                        <span>'.$row['first_name']. " ".$row['last_name'].'</span>
                        <p>'. $msg .'</p>
                    </div>
                </div>
                <div class="status-dot '.$offline.'"><i class="fas fa-circle" aria-hidden="true"></i></div>
                </a>';
?>