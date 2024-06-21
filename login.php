<?php include_once("header.php"); ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>RealTime Chat Application</header>
            <form action="#">
                <div class="error-text"></div>
                <div class="field">
                    <label>Email Address</label>
                    <input required type="text" placeholder="Enter Email" name="email">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input required type="password" placeholder="Enter Password" name="password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
                
            </form>
            <div class="link">Not yet Signed Up? <a href="index.php">Signup now</a></div>
        </section>

    </div>
    <script src="js/pass-hide-show.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>