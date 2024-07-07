<?php
    session_start();    
    if (isset($_SESSION["unique_id"])){
        header("location: user.php");
    }
    
?>
<?php include_once("header.php"); ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>RealTime Chat Application</header>
            <form action="#">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field">
                        <label>First Name</label>
                        <input type="text" required name="fname" placeholder="Enter First Name">
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input type="text" required name="lname" placeholder="Enter Last Name">
                    </div>
                </div>
                    <div class="field">
                        <label>Email Address</label>
                        <input type="text" required name="email" placeholder="Enter Email">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" required name="password" placeholder="Enter Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="image">
                        <label>Select Image</label>
                        <input type="file" required name="image">
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                
            </form>
            <div class="link">Already Sign Up? <a href="login.php">Login now</a></div>
        </section>

    </div>
    <script src="js/signup.js"></script>
    <script src="js/pass-hide-show.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>