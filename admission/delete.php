<?php

$conn=mysqli_connect("localhost","root","","student");

$id=$_GET['id'];

$query="DELETE FROM admission WHERE id =$id";

$run=mysqli_query($conn,$query);

echo "Data deleted Successfully !";
header('location:show.php');

?>
