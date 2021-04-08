<style>
.false{
    display:grid;
    align-items:center;
    justify-content: center;
    margin-top:40vh
}
</style>

<?php
   $showError= "false";
if(isset($_POST['submit'])){
    include '_dbconnect.php';

    $email = $_POST['contactEmail'];
    $phone = $_POST['contactPhone'];
    $address = $_POST['contactAddress'];
    $problem = $_POST['contactProblem'];

    $existsql = "SELECT * FROM `contact` WHERE contact_email= '$email'";
    $result = mysqli_query ($conn , $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email is already registerd";
        echo '<h1 class="false">Email is already registered</h1>';
    }
    else{
        $sql= "INSERT INTO `contact` (`contact_email`, `contact_phone`, `contact_address`, `contact_problem`) VALUES ( '$email', '$phone', '$address', '$problem')";
          $result = mysqli_query($conn,$sql);
     if($result){
        header("Location:/forum/index.php?contactsuccess=true");
        exit();
     }else{
         
        header("Location:/forum/contact.php");
        echo'something wrong!please try again';
     }
    }

    
}

?>