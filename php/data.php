<?php
    $output.= '<a href="chat.php?user_id='.$row['unique_id'].'">
    <div class="content">
        <img src="php/image/'.$row['image'].'" alt="">
        <div class="details">
            <span>'.$row['first_name']. " ".$row['last_name'].'</span>
            <p>This is test message</p>
        </div>
    </div>
    <div class="status-dot"><i class="fas fa-circle" aria-hidden="true"></i></div>
    </a>';
?>