<?php

  include 'connect.php';
  if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
  
    if(empty($name) || empty($password) || empty($email) || empty($password)){
    header("location:display.php?message=Error");
      
    }else{
  
   $query = "INSERT INTO `users` (`name`, `email`, `mobile`, `password`) 
    VALUES ('$name','$email', '$mobile', '$password')";
     $result=mysqli_query($con,$query);
     
     if(!$result){    
        die("Failed".mysqli_error($con));
      }else{
        header("location:display.php");
      }
    }
  }
?>