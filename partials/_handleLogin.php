<?php
  
  $showError= "false";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      include '_dbconnect.php';
      $user_name = $_POST['loginUserName'];
      // $email = $_POST['loginemail'];
      $pass = $_POST['loginpass'];

      $sql = "SELECT * FROM `users` WHERE user_name = '$user_name'";
      $result = mysqli_query($conn , $sql);
      $numRows = mysqli_num_rows($result);
      if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_pass'])){
        session_start();
        $_SESSION ['loggedin']=true;
        $_SESSION ['sno']=$row['sno'];
        $_SESSION['user_name']= $user_name;
        $_SESSION['user_email']=$row['user_email'];
        // echo "logged in";
        header("Location:/forum/index.php");
        exit();
        }
        else{
          header("Location:/forum/index.php");
          echo '<h1 class="false">Password Does not Matching</h1>';
        }
      }
  }




  ?>