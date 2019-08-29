<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['myusername'];
   
   $ses_sql = mysqli_query($conn,"SELECT username FROM Users WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['myusername'])){
      header("location:login.php");
      die();
   }
?>