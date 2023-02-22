<?php include 'connection.php';

$id = $_GET['id'];

$query=" DELETE FROM form where id='$id'";
$data=mysqli_query($conn,$query);
 
if($data){
    echo 'Record  Deleted Successfully!';
    ?>
      <meta http-equiv="refresh" content="0; url=http://localhost/crud/display.php"/>
    <?php
   
}else{
    echo "Failed";
}
?>