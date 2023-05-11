<?php
include "dbconn.php";
if (isset($_POST['fname']) && isset($_POST['lname'])&& isset($_POST['phone'])
    && isset($_POST['email'])&& isset($_POST['psd'])&& isset($_POST['psdchk']))
     {
      function validate($data){
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
      $fname=validate($_POST['fname']);
      $lname=validate($_POST['lname']);
      $phone=validate($_POST['phone']);
      $email=validate($_POST['email']);
      $psd=validate($_POST['psd']);
      $psdchk=validate($_POST['psdchk']);
      //echo nl2br($fname."\r".$lname."\r".$phone."\r".$email."\r".$psd."\r".$psdchk);
      //check if email is taken
      $sql1 = "SELECT * FROM artist WHERE email='$email' ";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1)>0) {
          header("Location: test2.php?message=The email address is alredy taken. Kindly use another email.");
        }else {
          # check if passwords match
          if ($psd!=$psdchk) {
            header("Location: test2.php?message=Password match fail. Kindly fill in the details and ensure the pasword matches with the repeated password.");
          }else{
            //hashing the password
            $cryptpsd=hash('sha512',$psd);
            //insering the values in the database
            $sql2 = "INSERT INTO artist(`f_Name`,`l_Name`,`phoneNo`,`email`,`pswd`) VALUES('$fname', '$lname','$phone','$email', '$cryptpsd')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
              header("Location: login.php?message=Account Created Successfully! Kindly log into your account. ");
            }
            else {
              header("Location: test2.php?message=Account Not created! Kindly try again");
              echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
          }
        }
     }else{
      header("Location: test2.php?message=Kindly fill all entries");
     }
?>