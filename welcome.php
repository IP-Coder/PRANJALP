<?php
session_start();
if (!isset($_SESSION['loggedinn']) || $_SESSION['loggedinn'] = !true) {

  header("location: login.php");
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iSeeyou</title>
</head>

<body style="background-image: url(css/trees.png)">

    <?php
  require 'css/navbar.php'
  ?>
    <div class="container">
        <h1 class="text-center">WELCOME TO OUR WEBSITE </h1>
        <h1 class="text-center"><?php echo $_SESSION['usename'] ?></h1>
    </div>
    <div class="container" style="margin-top: 30%">
        <form action="/projects/logout.php">
            <small id="emailHelp">You need to logout after you work for your own secuity</small>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><a href="/projects/logout.php"
                    style="text-decoration-color: white;"></a>Click to LogOut</button>


        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>