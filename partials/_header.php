<style>
.header_image{
  height:40px;
  width:60px;
  margin-right:5px;
  margin-left:5px
}

</style>
<?php
session_start();
echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">LETS DISCUSS</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="contact.php" tabindex="-1">Contact</a>
      </li>
     
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
      echo'<form class="d-flex" action="search.php" method="get">
      <input class="form-control me-2" name = "search" type="search" placeholder="Search" aria-label="Search">
      <button class="me-0 btn btn-success" type="submit">Search</button>
      <p class="text-light mt-2 font-weight-bold mx-2">'.$_SESSION['user_name'].'</p>
       <a href ="partials/_logout.php" tex="center" class="btn btn-outline-success">LogOut</a>
       </form>';
    }
    else{
     echo'<div class = "mx-2">
       <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
    </div>';
  }
  echo'</div>
       </div>
       </nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset ($_GET['signupsuccess']) && $_GET['signupsuccess']== "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Account created successfully.</strong> You can now log in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<!-- ' . $_SESSION ['user_image'].' -->

<!-- $sql = "SELECT * FROM `users` WHERE user_name = '$user_name'"; -->