<?php include("connection.php"); 

$id = $_GET['id'];
$query ="SELECT * FROM form where id = '$id' ";
$data=mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container border border-black col-5 p-3 mt-3">
        <h2 class="text-primary">Update Students' Application</h2>
        <form action="" method="post">
          <div class="row">
            <div class="mb-2 ">
                  <label for="" class="form-label">Name</label>
                  <input type="text" value="<?php echo $result['name']; ?>" name="name" class="form-control" required>
            </div>
            <div class="mb-2 ">
                  <label for="" class="form-label">Email</label>
                <input type="email" value="<?php echo $result['email']; ?>" name="email" class="form-control" required>
            </div>
            <div class="mb-2 ">
                  <label for="" class="form-label">Password</label>
                <input type="password" value="<?php echo $result['password']; ?>" name="password" class="form-control" required>
            </div>
            <div class="mb-1">
                  <button class="btn btn-success w-100" name="update" type="submit">Submit</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
  if(isset($_POST['update'])){
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    $query = "UPDATE  form set name='$name',email='$email',password='$password' where id='$id' ";
    $data =  mysqli_query($conn,$query);

    if($data){
      echo "Data Updated successfully";
    }else{
      echo "Data Updation Failed";
    }
}
?>