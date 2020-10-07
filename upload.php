<?php 
/* mysql_connect("localhost","root","");
mysql_select_db("file"); */
include 'css/connection.php';
if(isset($_REQUEST["submit"]))
{
	 $file=$_FILES["file"]["name"];
    $tmp_name=$_FILES["file"]["tmp_name"];
    echo $tmp_name ;
    echo "<br>";
    echo $file;
	$path="upload/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv","pdf","zip");
	if(in_array($ext,$allowed))
	{
 move_uploaded_file($tmp_name,$path);
$sql= "INSERT INTO upload(file)values('$file')"; 
$result = mysqli_query($conn,$sql);	
	
}
}

?>


<form enctype="multipart/form-data" method="post">

Add screenshot<input type="file" name="file">
<input type="submit" name="submit" value="upload">

</form>



