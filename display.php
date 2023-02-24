<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <?php include "connection.php" ;
    error_reporting(0);

    $query ="SELECT * FROM form";
    $data=mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);
   if($total != 0){
    ?>
        <div class="container ">
            <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                <div class="row">
                    <div>
                        <table class="table table-striped table-bordered bg-white" >
                            <thead>
                                <h1 class="text-primary bg-white mt-3 py-1">Display Students' Record</h1>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Caste</th>
                                <th scope="col">Language</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                        <?php
                            while($result=mysqli_fetch_assoc($data)){
                                echo "<tr>
                                    <td scope='row'>".$result['id']."</td>
                                    <td><img src='".$result['std_image']."' height='50px' width='50px'></td>
                                    <td>".$result['name']."</td>
                                    <td>".$result['email']."</td>
                                    <td>".$result['password']."</td>
                                    <td>".$result['caste']."</td>
                                    <td>".$result['language']."</td>
                                    <td>
                                    <a href='update_display.php?id=$result[id]' class='btn btn-success'>Update</a>
                                    <a href='delete.php?id=$result[id]' type='delete' class='btn btn-danger' onclick='return checkdelete()'>Delete</a>
                                    </td>
                        
                                </tr>
                                "; 
                        
                            }  
                            }else{
                                echo "No record found";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            <!-- </form> -->
        </div>
</body>

</html>
<script>
    function checkdelete(){
        return confirm('Are you sure you  want to delete data ?');
    }
</script>