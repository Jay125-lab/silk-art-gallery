<!DOCTYPE HTML>
<html>

<head>
     <link rel="stylesheet" href="deadline.css" />
<title> Log in</title>
<link rel = "icon" href ="siteresources/silkart.png" type = "image/x-icon">
</head>
    <body>
        <div class="login-box">
            <h1> Login</h1>
            <form action="loginval.php"method="post">
                <?php if (isset($_GET['message'])) { ?>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
                <?php } ?>
                <label> Email</label>
                <input type="email"placeholder="" name="email" required>
                <label> Password</label>
                <input type="password"placeholder=""name="psd" required>
                <!-- <input type="button"value="Submit"> -->
                <button type="submit" style="width: 320px;height: 35px;margin-top:20px;border:none;background-color: #49c1a2;color: white;font-size: 18px;border-radius: 6px;">Submit</button>
            </form>
        </div>
        <br>
        <p>
            <div class ="para-2"> Don't have an account?<a href="test2.php"> Sign up Here</a></div>
        </p>
    </body>
</html>