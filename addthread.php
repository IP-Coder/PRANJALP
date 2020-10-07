<?php
include 'css/connection.php';
$METHOD = $_SERVER['REQUEST_METHOD'];
if ($METHOD == 'POST') {
   
    $desc=$_POST['categorydesc'];
    $name=$_POST['categoryname'];
    if($name!=""){
        $sql="INSERT INTO `catagerois` (`category_name`, `category _description`, `created`) VALUES ('$name', '$desc', current_timestamp())
    ";
    $result=mysqli_query($conn,$sql);
    header("location: index.php");
    }


}

?>
<div class="modal fade" id="addthread" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/projects/addthread.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category name</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category description</label>
                        <input type="text" class="form-control" id="categorydesc" name="categorydesc">
                    </div>
                  <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            
        </div>
    </div>
</div>