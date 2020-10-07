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


    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/3000x900/?coding,java" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/3000x900/?coding,pythobn" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/3000x900/?microsoft,apple" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container my-3">
        <h1 class="text-center">iDiscuss-categories</h1>
        <div class="row md-2">

            <?php
            $limit = $_GET['limit'];
            $sql = "select * from `catagerois` Limit $limit ";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
                $cat = $row['category_name'];
                $catid = $row['category_id'];
                $catthred = $row['category _description'];
                echo  '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/400x300/?coding,' . $cat . '" class="card-img-top" alt="...">
                    <div class="card-body my-2">
                        <h5 class="card-title"><a href="threads.php?catid=' . $catid . '">' . $cat . '</a></h5>
                        <p class="card-text">' . substr($catthred, 0, 50) . '....</p>
                        <a href="threads.php?catid=' . $catid . '" class="btn btn-primary">...more</a>
                    </div>
                </div>
                </div>';
            }

            echo ' </div>
    </div>';


            $limit2 = $limit + 3;
            echo  ' <div class="contaainer">
            <div class="text-center"><a href="index2.php?limit=' . $limit2 . '" class="btn btn-success mx-2">MORE CATEGORY</a>
            </div>
            </div>';
            ?>
            
            <?php include 'css/footer.php' ?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous">
            </script>
</body>

</html>