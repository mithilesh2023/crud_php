<?php
$servername="localhost";
$username="root";
$password="";
$dbname="crud";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    // echo "connection ok";
}else{
    echo "failed";
}
?>