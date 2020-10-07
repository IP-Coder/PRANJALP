<?php

$servername = "localhost";
$username = "root";
$paswowrd = "";
$database = "project";
$conn = mysqli_connect($servername, $username, $paswowrd, $database);
if (!$conn){
    //     echo "success";
    // }
    // else{
        die("Error". mysqli_connect_error());
    }







?>