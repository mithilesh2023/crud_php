<?php include("connection.php"); ?>

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
        <h1 class="text-primary">Form Application</h1>
        <form action="" method="post">
          <div class="row">
            <div class="mb-2 ">
                  <label for="" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-2 ">
                  <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-2 ">
                  <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-1">
                  <button class="btn btn-success w-100" name="submit" type="submit">Submit</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    $query = "INSERT INTO form (name,email,password) VALUES('$name','$email','$password')";
    $data =  mysqli_query($conn,$query);

    if($data){
      echo "Data Inserted successfully";
    }else{
      echo "Data Insert Failed";
    }
}
?>