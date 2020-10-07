<?php

session_start();
if (isset($_SESSION['loggedinn']) && $_SESSION['loggedinn'] = true ) {

    $loggedin = true;
    $loggedinn=false;
       
} 

elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true ) {

   include 'addthread.php';
   $loggedinn = true;
   $loggedin=false;
  
}

else {
    
    $loggedinn=false;
    $loggedin=false;
    
}


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/projects/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>';
                if ($loggedin or $loggedinn){
                    echo' <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    
                    $sqle= "SELECT category_name, category_id FROM  `catagerois` Limit 3" ;
                    $result2 = mysqli_query($conn, $sqle);         
                    while( $row2= mysqli_fetch_assoc($result2)){
                        $drcat=$row2['category_name'];
                        $id=$row2['category_id'];
                        echo '<a class="dropdown-item" href="threads.php?catid='.$id.'">'.$drcat.'</a>';
                    }
                    if($loggedinn){
                        echo'<div class="dropdown-divider"></div>
                        <button type="button"class="btn btn-outline-success" data-toggle="modal" data-target="#addthread">
                        Add new category
                        </button>
                        </div>';
                    }
                }
           
                
                
                echo '
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/projects/contactus.php">Contact Us</a>
            </li>
        </ul>';

if (!$loggedin && !$loggedinn) {
    echo ' <div class="row mx-1">
                        <form class="form-inline my-2 my-lg-0" action="/projects/search.php" method="get">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <a href="/projects/login.php"> <button class="btn btn-outline-success  mx-2"> Login</button></a>
                        <a href="/projects/signup.php"> <button class="btn btn-outline-success ">Signup</button></a>

                    </div>';
}
if ($loggedin) {
    echo ' <div class="row mx-1">
                        <form class="form-inline my-2 my-lg-0" action="/projects/search.php" method="get">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <a href="/projects/logout.php"> <button class="btn btn-outline-success  mx-2"> Logout</button></a>
                       
                       <img src="https://ui-avatars.com/api/?name=' . $_SESSION['usename'] . ' " width="35px" alt="...">
                       
                    </div>';
}

if ($loggedinn) {
    echo ' <div class="row mx-1">
                        <form class="form-inline my-2 my-lg-0" action="/projects/search.php" method="get">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <a href="/projects/logout.php"> <button class="btn btn-outline-success  mx-2"> Logout</button></a>
                       
                       <img src="https://ui-avatars.com/api/?name=' . $_SESSION['empname'] . ' " width="35px" alt="...">
                       
                    </div>';
}



echo '</div>
</nav>';

