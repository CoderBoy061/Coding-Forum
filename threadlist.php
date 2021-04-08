<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
    .box {
        /* border:2px solid black; */
        /* border:2px solid black; */
        /* text-align: center; */
        display: flex;
        background-color: lightgray;
        height: 30vh;
        margin-top: 10px;
        margin-right: 20vw;
        margin-left: 8vw;
        margin-bottom: 5vh;
        text-align: center;
        /* min-height:90vh; */

    }

    .container1 {
        /* height: 30vh; */
        margin-top: 10px;
        margin-right: 20vw;
        margin-left: 8vw;
        margin-bottom: 5vh;
        /* text-align: center; */
    }

    .bottom {
        margin-top: 5vh;
        
        /* width: 100vw; */
        padding: 3px;
        

    }
    </style>
    <title>LET'S DISCUSS</title>
</head>

<body>
    <?php include 'partials/_header.php';  ?>
    <?php include 'partials/_dbconnect.php';  ?>

    <?php
   
   $id = $_GET ['catid'];
   $sql= "SELECT * FROM `categories` WHERE category_id=$id";
   $result = mysqli_query($conn, $sql);
   
   while ($row = mysqli_fetch_assoc($result)){
       
       $catname= $row['category_name'];
       $catdesc= $row['category_description'];

   }
?>

    <?php
$showAlert = false;
$method = $_SERVER ['REQUEST_METHOD'];
if($method=='POST'){
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sno = $_POST['sno'];
    $th_title = str_replace("<","&lt;",$th_title);
    $$th_title = str_replace(">","$th_title","&gt;");

    $sql= "INSERT INTO `threads` ( `thread_title`, `threads_description`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$sno', '$id', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    $showAlert= true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your Question has been added successfully , please wait for someone who can reply your comment
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    
}
?>
    </div>

    <!-- <div class="card">
  <div class="card-header center">
  <b>  Welcomw to</b>
  </div> -->
    <div class="box">
        <div class="card-body">
            <h5 class="card-title"> <b> Welcomw to <?php echo $catname;    ?> Forum</b></h5>
            <p class="card-text"><?php echo $catdesc;    ?></p>


        </div>
    </div>
    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
    echo'<div class="container">
        <h2 class=""><b>Start The Discussion</b></h2>
        <form action="'.$_SERVER['REQUEST_URI'].';" method="post">
            <div class="fluid">
                <label for="exampleInputEmail1" class="form-label"><b>Problem Title</label></b>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Please use and explain your problems correctly</div>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Explain Your Problems</b></label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
    </div>';
  }
    else{
        echo'<div class="container">
        <p><b>You have to login to post a comment<b></p>
        </div>';
    }
    ?>




    <div class="container">
        <h2 class="py-1 "><b>Browse Questions</b></h2>
        <?php
   $id = $_GET ['catid'];
   $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
   $result = mysqli_query($conn, $sql);
   $noResult = true;
   while ($row = mysqli_fetch_assoc($result)){
       $noResult = false;
       $title= $row['thread_title'];
       $desc= $row['threads_description'];
       $id= $row['threads_id'];
       $thread_time = $row['timestamp'];
       $thread_user_id = $row['thread_user_id'];
       $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
       $len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
       $result2 = mysqli_query($conn,$sql2);
       error_reporting(0);
       $row2 = mysqli_fetch_assoc($result2);
        echo'  <div class="media  my-3">
            <img src="img/user.jpg" width="54px mr-3" class="mr-3" alt="...">
            <div class="media-body ml-3">
            <p class="my-0"><b>'.$row2['user_name'].' at ' .$thread_time. '</b> </p>
                <h5 class="ml-3"><a class="text-decoration-none" href="thread.php?threadid='.$id. '">'.$title.'</h5></a>
                '.$desc.'
            </div>
        </div>';
    }
    if($noResult){
        echo '<div class="card">
        <div class="card-body">
          <h5 class="card-title"><b>No Results Found</b></h5>
          <p class="card-text">Be the Fisrt Person to add a comment</p>
        </div>
      </div>';
    }
    ?>
<div class="bottom">
<?php include 'partials/_footer.php'?>
</div>
       





        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>