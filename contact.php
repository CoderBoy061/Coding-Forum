<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>LET'S DISCUSS</title>
    <style>
    .container {
        background-color: #ededed;
    }

    body {
        background-color: #ededed;
    }

    .contact {
        /* border:2px solid red; */
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.12);
        height:70vh

        /* background-color: #ededed; */
    }

    #last {
        margin-left: 20vw;
        align-items: center;
        justify-content: center;
        /* min-height:50vh */
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php';  ?>

    <div class="container my-3">
        <div class="contact">
            <h3 class="text-center">Contact With Us</h3>
            <div class="col-lg-6 m-auto d-block">
                <form action="/forum/partials/_handleContact.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" placeholder="Enter Your Email" class="form-control" id="exampleInputEmail1"
                            name="contactEmail" aria-describedby="emailHelp">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="email" class="form-control" placeholder="Enter Your Phone Number"
                                id="exampleInputEmail1" name="contactPhone" aria-describedby="emailHelp">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Adress</label>
                                <input type="email" class="form-control" placeholder="Enter Your Enter Your Address"
                                    id="exampleInputEmail1" name="contactAddress" aria-describedby="emailHelp">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Explain Your Problem</label>
                                        <textarea class="form-control" placeholder="Explain your problem"
                                            name="contactProblem" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>


                                </div>

                                <button type="submit" name="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>



        </div>
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