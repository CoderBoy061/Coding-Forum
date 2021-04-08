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
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .questions {
        margin-right: 30px
    }

    .box {
        /* border:2px solid black; */
        /* text-align: center; */
        /* display: flex; */
        background-color: lightgray;
        height: 30vh;
        /* width :50vh; */
        margin-top: 10px;
        margin-right: 10vw;
        margin-left: 10vw;
        margin-bottom: 5vh;
        /* min-height:90vh; */

    }
    .box2 {
        /* border:2px solid black; */
        /* text-align: center; */
        /* display: flex; */
        /* background-color: lightgray; */
        /* height: 30vh; */
        /* width :50vh; */
        margin-top: 10px;
        margin-right: 10vw;
        margin-left: 10vw;
        margin-bottom: 5vh;
        /* min-height:90vh; */

    }
    </style>
    <title>LET'S DISCUSS</title>
</head>

<body>
    <?php include 'partials/_header.php';  ?>
    <?php include 'partials/_dbconnect.php';  ?>

    <?php
   
   $id = $_GET ['threadid'];
   $sql= "SELECT * FROM `threads` WHERE threads_id=$id";
   $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)){
       $title= $row['thread_title'];
       $desc= $row['threads_description'];
       $thread_user_id= $row['thread_user_id'];
       $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
       $result2 = mysqli_query($conn,$sql2);
       $row2 = mysqli_fetch_assoc($result2);
       error_reporting(0);
       $posted_by =$row2['user_name'];
    }
?>
    <?php
$showAlert = false;
$method = $_SERVER ['REQUEST_METHOD'];
if($method=='POST'){
    $comment= $_POST['comment'];

    $sno= $_POST['sno'];

    $sql= "INSERT INTO `comments` (`comment_content`, `threads_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
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
    <div class="box">
        <div class="card-body">
            <h5 class="card-title "> <?php echo $title; ?></b></h5>
            <p class="card-text "><?php echo $desc; ?></p>
            <div class="">
                <p><b>Posted By : <?php echo $posted_by?></b> </p>
                <p>*Do not post any naughy things , otherwise you will be block by us . so be carefull before posting
                    anything which is against our privacy and policy</p>
            </div>

        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
        echo'
    <div class="box2">
        <h2 class=""><b>Post a Comment</b></h2>
        <form action="'. $_SERVER['REQUEST_URI'].';" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Type your Comment</b></label>
                <textarea class="form-control mt-1" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name = "sno" value="'. $_SESSION["sno"].'">
            </div>
            <button type="submit" class="btn btn-success mt-2">Post Comment</button>
        </form>
    </div>';
    }
    else{
        echo'<div class="container">
        <h2 class="center">Discussion</h2>
    </div>';
      }
    ?>

    <?php
   
   $id = $_GET ['threadid'];
   $sql="SELECT * FROM `comments` WHERE threads_id=$id";
   $result = mysqli_query($conn, $sql);
   $noResult = true;
   while ($row = mysqli_fetch_assoc($result)){
       $noResult = false;
       $content= $row['comment_content'];
       $id= $row['comment_id'];
       $comment_time = $row['comment_time'];
       $thread_user_id = $row['comment_by'];
       $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
       $result2 = mysqli_query($conn,$sql2);
       $row2 = mysqli_fetch_assoc($result2);
       

 
      echo'<div class="box2">  
      <div class="media  my-3">
            <img src="img/user.jpg" width="54px mr-3" class="mr-3" alt="...">
            <div class="media-body ml-3">
            <p class="my-0"><b>'.$row2['user_name'].' at ' .$comment_time. '</b> </p>
                '.$content.';
            </div>
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

    </div>


    <?php include 'partials/_footer.php';  ?>


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