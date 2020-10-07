<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iDiscuss with PVS</title>
</head>

<body>

    <?php include 'css/connection.php' ?>
    <?php include 'css/navbar.php' ?>
<!--     PHP FOR FETCHING COMMENT FROM THE DATABASE
 -->    <?php
    $id = $_GET['threadid'];

    $sql = "select * from `thread` Where thread_id = $id";
    $result = mysqli_query($conn, $sql);
    $noques = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noques = false;
        $tittle = $row['thread_tittle'];
        $threaddesc = $row['thread_description'];
        $threadid=$row['thread_user_id'];
        $sqle= "SELECT usename FROM `usess` WHERE Sno='$threadid'";
        $result2 = mysqli_query($conn, $sqle);
        $row2= mysqli_fetch_assoc($result2);
        $postby=$row2['usename'];
    }

    ?>
    <!--     PHP FOR INSERTING COMMENT TO THE DATABASE   -->
    <?php
    $showAlert=false;
    $showError=false;
        $METHOD=$_SERVER['REQUEST_METHOD'];
        if($METHOD=='POST'){
            if (isset($_SESSION['loggedinn']) && $_SESSION['loggedinn'] = true) {
                $commentbyuser=$_POST['commentdecription'];
                $id=$_GET['threadid'];
                $cmentby=$_POST['sno'];
                if(!$commentbyuser==""){
                    $commentbyuser= str_replace("<", "&lt", "$commentbyuser");
                    $commentbyuser= str_replace(">", "&gt", "$commentbyuser");

                    $showAlert=true;
                    $sql= "INSERT INTO `comments` (`comment_tittle`, `thread_id`,`comment_by`, `comment_time`) VALUES ('$commentbyuser', '$id','$cmentby', current_timestamp())";;
                    $result=mysqli_query($conn,$sql);
                }
                else{
                    $showError="Plese write a comment to post";
                }
              
            }
            else{
                $showError="Please login to post a comment";
                /* header("location: login.php"); */
            
            }
           
        } 
    ?>
<!--     php for show a alert after submitting comment
 -->    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrates:-)</strong> Your comment is posted succesfully 
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
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $tittle ?></h1>
            <p class="lead"><?php echo $threaddesc ?></p>
            <hr class="my-4">
            <p>Posted By:-<strong><?php echo $postby;?></strong></p>

            
            
            
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

        </div>
    </div>


    <?php
       
        echo '<div class="container">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Add a suggetion about problem</label>
                <textarea class="form-control" id="decription" name="commentdecription"
                    placeholder="Release a helpful comment" rows="3"></textarea>
                    
            </div>
            <button type="submit" class="btn btn-success">Submit</button>';
            if (isset($_SESSION['loggedinn']) && $_SESSION['loggedinn'] = true) {
                echo'<input type="hidden" name="sno" value="'.$_SESSION["sno"].'">';
            }
       
            
        echo'</form>

    </div>';

    ?>

    
    <div class="container">
        <h1 class="py-2">Discussion</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "select * from `comments` Where thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noques = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noques = false;
            $tittle = $row['comment_tittle'];
            $tid = $row['comment_id'];
            $threadid=$row['comment_by'];
            $sqle= "SELECT usename FROM `usess` WHERE Sno='$threadid'";
            
            $result2 = mysqli_query($conn, $sqle);
           
            $row2= mysqli_fetch_assoc($result2);

           /*  $threaddesc = $row['thread_description']; */

            echo '  <div class="media my-3">
        
        <div class="media-body">
            <a class="text-dark" ><h5 class="mt-0 text-black">' . $tittle . '</h5></a>
           
        </div>
        <p>Commented By:-<strong>'.$row2['usename'].'</strong></p>
    </div>';
        }


        if ($noques) {
            echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h2>No Questions found</h2>
          <p class="lead">Enter a question to ask</p>
        </div>
      </div>';
        }



        ?>


</div>





    <?php include 'css/footer.php' ?>
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