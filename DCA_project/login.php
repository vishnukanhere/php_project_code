<?php 
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"=="POST"]) {
$username=mysql_real_escape_string($db,$_POST['username']);
$username=mysql_real_escape_string($db,$_POST['password']);
$sql = "SELECT id FROM admin WHERE username = '$username' and passcode = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: tpodata.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>