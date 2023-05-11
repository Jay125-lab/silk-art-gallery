
<?php
session_start();
include "dbconn.php";
if (isset($_SESSION['artistID']) && isset($_SESSION['artistName'])) {
  $aID=$_SESSION['artistID'];
  $artistname=$_SESSION['artistName'];
  $number=$_SESSION['number'];
  $email=$_SESSION['email'];
  $sqlpic = "SELECT * FROM artprofpic WHERE artistID='$aID' ";
  $resultpic = mysqli_query($conn, $sqlpic);

  if (mysqli_num_rows($resultpic)==1) {
    # code...
    $picres=mysqli_fetch_assoc($resultpic);
    $pic=$picres['imgsrc'];
  }else{
    $pic="avatar.svg";
  }
  var_dump($_FILES);
  var_dump($_POST);
  $price=$_POST['price'];
  $status="available";
  $img_name=$_FILES['uploadfile']['name'];
  $img_size=$_FILES['uploadfile']['size'];
  $tmp_name=$_FILES['uploadfile']['tmp_name'];
  $error=$_FILES['uploadfile']['error'];
  
  if ($error===0) {
    if ($img_size>100000000) {
    $em="File size is too large!";
    header("Location: artupload.php?message=$em");	
    }else{
      $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc=strtolower($img_ex);
      $allowed_exs=array("jpg","jpeg","png","gif","tiff","raw");
  
      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
        $img_upload_path='artistworks/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
  
          //insert into db
            # code...
            $sql="INSERT INTO artwork(`artistID`,`artFileName`,`price`,`status`) VALUES ('$aID','$new_img_name','$price','$status') ";
            $res=mysqli_query($conn,$sql);
        
        if ($res){
         $em="Artwork Uploaded Sucessfully!";
          header("Location: artupload.php?message=$em"); 
        }
        }else{
        $em="You cant upload files of this type!";
        header("Location: artupload.php?message=$em");
        }
      }
    }
}else{

}
?>