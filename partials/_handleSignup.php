<?php
  
  $showError= "false";

  if(isset($_POST['submit'])){
 
    include '_dbconnect.php';
    $user_name = $_POST['signupUserName'];
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];
    // $$user_image = $_FILES["signupPic"];
    
    $existsql = "SELECT * FROM `users` WHERE user_email= '$user_email'";
    $result = mysqli_query ($conn , $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email is already registerd";
    }
    else{
        if($pass==$cpass){
            $hash = password_hash($pass , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_pass`,`user_image`) VALUES ('$user_name', '$user_email', '$hash','$folder')";
            $result = mysqli_query ($conn , $sql);
            if($result){
                $showAlert = true ;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }

        }else{
            $showError = "Password Not matching";
            
        }
    }
    // header("Location: /forum/index.php?signupsuccess=false&error=$showError");

}
?>

