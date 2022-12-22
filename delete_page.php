<?php include ('connect.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "DELETE FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($con,$query);

if(!$result){
    die("Failed".mysqli_error($con));
}else{
    header("location:display.php");
}

?>