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
        $sql=mysqli_query($conn,"SELECT * from users where unique_id = '{$_SESSION["unique_id"]}'");
        $row=mysqli_fetch_array($sql);
        if($row['status']=='Offline now'){
            session_destroy();
            header("location: login.php");
        }
    ?>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="php/image/<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['first_name'] . " " .$row['last_name'];  ?></span>
                        <p><?php echo $row['status'];  ?></p>
                    </div>
                </div>
                <a href="logout.php" class="logout">Logout</a>
            </header> 
            <div class="search">
                <span>Select an user to chat</span>
                <input type="text" placeholder="Enter Name">
                <button><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>  
            <div class="users-list">
                
            </div>       
        </section>

    </div>
    <script src="js/user.js"></script>
</body>
</html>