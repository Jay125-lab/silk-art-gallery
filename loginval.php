<?php
include "dbconn.php";
session_start(); 
if (isset($_POST['email'])&& isset($_POST['psd']))

     {
      function validate($data){
        $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
      $email=validate($_POST['email']);
      $psd=validate($_POST['psd']);
      $cryptpsd=hash('sha512',$psd);
      echo nl2br($email."\r".$psd);

        
		$sql1 = "SELECT * FROM artist WHERE email='$email' AND pswd='$cryptpsd'";
		$result1 = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($result1) === 1) {
			$row = mysqli_fetch_assoc($result1);
            if ($row['email'] === $email && $row['pswd'] === $cryptpsd) {
            	$_SESSION['artistID'] = $row['artistID'];
            	$_SESSION['artistName'] = $row['f_Name']." ".$row['l_Name'];
							$_SESSION['email'] = $row['email'];
              $_SESSION['number']="0".$row['phoneNo'];
            	header("Location: artisthome.php");
            }else{
				header("Location: login.php?message=User account is not found! check your credentials again");
		        exit();
			}
    }
    }else {
      # code...
      header("Location: login.php?message=Kindly fill all entries");
    }
?>