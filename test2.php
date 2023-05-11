<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="deadline.css" />
<title>Sign Up</title>
<link rel = "icon" href ="siteresources/silkart.png" type = "image/x-icon">
</head>

<body>
    <div class ="signup-box">
   <h1> Sign up</h1>
   <form action="signupval.php"method="post">
        <?php if (isset($_GET['message'])) { ?>
        <div class="container" style="color:#05386B; text-align:center;"> 
        <p> <?php echo $_GET['message']; ?> </p>
        </div>
        <?php } ?>
       <label> First Name</label>
       <input type="text"placeholder=""name="fname" autocomplete="off" required>
       <label> Last Name</label>
       <input type="text"placeholder=""name="lname" autocomplete="off" requied>
       <label> Phone Number</label>
       <input type="number"placeholder=""name="phone" autocomplete="off" required>
       <label> Email</label>
       <input type="email"placeholder=""name="email" autocomplete="off" required>
       <label> Password</label>
       <input type="password"placeholder=""name="psd" autocomplete="off" required>
       <label> Confirm Password</label>
       <input type="password"placeholder=""name="psdchk" autocomplete="off" required>
       <!-- <input type="submit"value="Submit"> -->
       <button type="submit" style="width: 320px;height: 35px;margin-top:20px;border:none;background-color: #49c1a2;color: white;font-size: 18px;border-radius: 6px;
">Submit</button>
   </form>
   <p> By clicking the Sign up button, you agree to our<br>
    <a href="#">Terms and Coditions</a> and <a href="#">Policy and Privacy</a>

   </p>
</div>
<p> Already have an account?<a href="login.php"> Login Here</a></p>

</body>

</html>