<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'css/connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $empname=$_POST['empname'];
    $emppasw=$_POST['epasword'];
   
    if($username!=""){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "Select * from usess where usename = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num==1){
            while($row=mysqli_fetch_assoc($result))
            {
                if (password_verify($password, $row['userpassword'])){ 
                    $login = true;
                    session_start();
                    $_SESSION['loggedinn'] = true;
                    $_SESSION['sno']=$row['Sno'];
                    $_SESSION['usename'] = $username;
                    echo $_SESSION['username'];
                    header("location: /projects/index.php");
                }
            }
        }

        else
        {
            $showError = "Cheak your account detail";
        } 
    }
    elseif($empname!=""&&$emppasw!=""){
        
        $sql = "Select * from emplogin where username = '$empname'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num==1){
            while($row=mysqli_fetch_assoc($result))
            {
                if ($emppasw == $row['userpass']){ 
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['sn']=$row['Sno'];
                    $_SESSION['empname'] = $empname;
                    echo $_SESSION['empname'];
                    header("location: /projects/index.php");
                }
                           }
        }

        else
        {
            $showError = "Cheak your account detail";
        } 

    }
    else{
        $showError="Fill the detail first";
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
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .section {
        width: 50%;
        height: auto;
        margin: 0 auto 0 auto;
        margin-top: 100px;
    }

    .name {
        margin-bottom: 15px;
    }

    .text_area {
        width: 50%;
        height: auto;
        margin: 0 auto 0 auto;
    }
    </style>
</head>

<body style="background-image: url(css/bg2.jpg)">
    <?php require 'css/navbar.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrates:-)!</strong> You have succesfully logged in 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry :-(!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="section my-4">
        <h1 class="text-center text-white">Login to our website</h1>
        <h3 class="text-white">User login</h3>
        <form action="/projects/login.php" method="POST">
            <div class="form-row name">

                <div class="col">
                    <label for="inputAddress2" class="text-white">Username</label>
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                </div>
                <div class="col">
                    <label for="inputAddress2" class="text-white">Pasword</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary my-3">Login</button>

            <h3 class="text-white">Employee login</h3>

            <div class="form-row name ">
                <div class="col">
                    <label for="inputAddress2" class="text-white">Employee Id</label>
                    <input type="text" class="form-control" id="empname" name="empname">
                </div>
                <div class="col">
                    <label for="inputAddress2" class="text-white">Password</label>
                    <input type="password" class="form-control" placeholder="" id="epasword" name="epasword">
                </div>
            </div>


            <button type="submit" class="btn btn-primary my-3">Login</button>
        </form>
    </div>

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