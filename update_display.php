<?php include("connection.php"); 

$id = $_GET['id'];
$query ="SELECT * FROM form where id = '$id' ";
$data=mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
// result will fetch all data from database and keeps add as array form.
$language=$result['language'];
$language1=explode(",",$language);
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
    <div class="container border border-black col-9 p-3 mt-3">
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
            <div class="mb-2 ">
                <label for="" class="form-label " >Caste</label>
                <input type="radio" name="caste" value="General" required 
                <?php
                  if($result['caste']=="General"){
                    echo 'checked';
                  }
                ?>
                ><label>General</label>
                <input type="radio" name="caste" value="OBC"
                <?php
                  if($result['caste']=="OBC"){
                    echo 'checked';
                  }
                  ?>
                ><label>OBC</label>
                 <input type="radio" name="caste" value="SC" 
                 <?php
                  if($result['caste']=="SC"){
                    echo 'checked';
                  }
                  ?>
                 ><label>SC</label>
                <input type="radio" name="caste" value="ST"  
                <?php
                  if($result['caste']=="ST"){
                    echo 'checked';
                  }
                  ?>
                ><label>ST</label>
            </div>
            <div class="mb-2 ">
                <label for="" class="form-label " >Language</label>
                <input type="checkbox" name="language[]" value="Hindi" 
                <?php
                    if(in_array('Hindi',$language1)){
                      echo "checked";
                    }
                ?>
                ><label>Hindi</label>
                <input type="checkbox" name="language[]" value="English"
                <?php
                    if(in_array('English',$language1)){
                      echo "checked";
                    }
                ?>
                ><label>Engilsh</label>
                <input type="checkbox" name="language[]" value="Other" 
                <?php
                    if(in_array('Other',$language1)){
                      echo "checked";
                    }
                ?>
                ><label>Other</label>
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
    $caste  = $_POST['caste'];
    $lang=$_POST['language']; 
    $lang1 = implode(",",$lang);

    $query = "UPDATE  form set name='$name',email='$email',password='$password',caste='$caste',language='$lang1' where id='$id' ";
    $data =  mysqli_query($conn,$query);

    if($data){
      echo "<script>
      alert(' Data updated Successfully!');
      </script>";
      ?>
      <meta http-equiv="refresh" content="0; url=http://localhost/crud/display.php"/>
      <?php
    }else{
      echo "Data Updation Failed";
    }
}
?>