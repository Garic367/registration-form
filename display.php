<?php
    include ('connect.php');
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

<div class="box">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD USER</button>
</div>
<br><br>
    <div class="container">
        
        <table class="table table-striped table-bordered">
          <br>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>email</th>
              <th>mobile</th>
              <th>Password</th>
              <th></th>
              <th></th>
            </tr>
          </thead>  
         <tbody>
<?php 
 $query = "SELECT * FROM `users`";
 $result = mysqli_query($con, $query);
 if(!$result){
    die("query Failed".mysqli_error($con));
 }else{
    while($row = mysqli_fetch_assoc($result)){
        ?>
             <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $row['password']?></td>            
            <td><a href="update_page.php? id=<?php echo $row['id']; ?>" class="btn btn-secondary" value="Update">Update</a></td>            
            <td><a href="delete_page.php? id=<?php echo $row['id']; ?>" class="btn btn-danger" value="Delete">Delete</a></td>             
            </tr>
        <?php
    }
 }
?>
         </tbody>
        </table>

<?php 
if(isset($_GET['message'])){
    echo"<h6>".$_GET['message']."</h6>";
}
?>
    </div>   

<form action="insert.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label >Mobile number</label>
                <input type="text" class="form-control" name="mobile">
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" name="password">
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="submit" value="Submit"></input>
      </div>
    </div>
  </div>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>