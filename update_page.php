<?php include ('connect.php'); ?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query = "SELECT * FROM `users`WHERE `id` = '$id' ";
    $result = mysqli_query($con, $query);
    if(!$result){

       die("query Failed".mysqli_error($con));
    }else{
        $row = mysqli_fetch_assoc($result);
    } 
}
?>

    <?php
  if(isset($_POST['update_users'])){
        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
     $password = $_POST['password'];

     $query = "UPDATE `users` SET `name` ='$name', `email`='$email',
     `mobile`='$mobile',`password`='$password' WHERE `id`='$idnew'";
         
         $result = mysqli_query($con, $query);
         if(!$result){
            die("query Failed".mysqli_error($con));
         }else{
            header('location:display.php');
         }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="update_page.php?id_new=<?php echo $id ?>" method="post">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label >Mobile number</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
            </div> 
            <br>
            <input type="submit" class="btn btn-success" name="update_users" value="Update"></input>            
        </form>
    </div>    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>