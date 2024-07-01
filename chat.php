<?php
    session_start();    
    if (!isset($_SESSION["unique_id"])){
        header("location: login.php");
    }
?>
<?php include_once("header.php"); ?>
<body>
    <?php
        include_once("php/config.php");
        $user_id=mysqli_real_escape_string($conn, $_GET["user_id"]);
        $sql=mysqli_query($conn,"SELECT * from users where unique_id = '{$user_id}'");
        $row=mysqli_fetch_array($sql);
    ?>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/image/<?php echo $row['image']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['first_name']." ". $row['last_name']; ?></span>
                    <p><?php echo $row['status'];?></p>
                </div>                
            </header> 
            <div class="chat-box">

                
            </div>

            <form action="#" class="typing-area">
                <input type="text" hidden name="sender_id" value="<?php echo $_SESSION["unique_id"]; ?>">
                <input type="text" hidden name="receiver_id" value="<?php echo $user_id; ?>">
                <input type="text" name="message" class="Message" placeholder="Type Message">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>



        </section>

    </div>
    <script src="js/chat.js"></script>
</body>
</html>