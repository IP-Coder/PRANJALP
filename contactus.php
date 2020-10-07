<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'css/connection.php';
    $first = $_POST["first"];
    $second = $_POST["second"];
    $email = $_POST["email"];
    $subject=$_POST["sub"];
    $contact=$_POST["contact"];
    $suggetion= $_POST["suggest"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)&& $first!="" && $subject !=""){
        $sql="INSERT INTO `contactus` (`first`, `second`, `email`, `contact`, `subject`, `mesege`) VALUES ('$first', '$second', '$email', '$contact', '$subject', '$suggetion')";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
    
    }
    else{
        $showError="There are any error in information provided by you ";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome to login</title>
    <?php include 'css/connection.php'?>
    <?php require 'css/navbar.php' ?>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        section {
            width: 50%;
            height: auto;
            margin: 0 auto 0 auto;
            margin-top: 100px;
        }
        .name{
            margin-bottom: 15px;
        }
        .text_area{
            width: 50%;
            height: auto;
            margin: 0 auto 0 auto;
        }
    </style>
    
</head>

<body style="background-image: url(css/bg2.jpg)">
<?php
    
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrates:-)</strong> Your request is considerd succesfully we contact you shortly
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
   
    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry :-(</strong> '. $showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
   ?>

 <?php
    echo'<section>
    <h1 class="text-center text-white " >Contact Us</h1>
    <form action="contactus.php" method="POST" class="my-3">
        <div class="form-row name">
            <div class="col">
                <label for="inputAddress2" class="text-white">First name</label>
                <input type="text" class="form-control" placeholder="First name" name="first" id="first">
            </div>
            <div class="col">
                <label for="inputAddress2" class="text-white">Last name</label>
                <input type="text" class="form-control" placeholder="Last name"name="second" id="second">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-white">Email</label>
                    <input type="email" class="form-control" id="inputEmail4"name="email" id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-white">Contact No.</label>
                    <input type="contact" class="form-control" id="inputPassword4" name="contact" id="contact">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress" class="text-white">Subject</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="sub" id="sub">
            </div>            
            
            
            <div class="form-group">
                <label for="inputAddress" class="text-white">Your messege for us</label>
                <textarea name="suggest" id="suggest" class="form-control" cols="30" rows="10" name="suggest" id="suggest" class="text_area" placeholder="Write your suggestion about problem"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
</section>';
    ?> 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>


</html>