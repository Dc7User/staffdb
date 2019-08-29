<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn, $_POST['username']);
      $mypassword1 = mysqli_real_escape_string($conn, $_POST['password']);
	  
	  $mypassword = md5($mypassword1);
      
      $sql = "SELECT UserID FROM Users WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
		 
		 $_SESSION['myusername'] = "myusername";
         
         header("location: welcome.php");
		 //echo $myusername . " " . $mypassword;
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Example.com - Staff Details - Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="wrapper">
		<header>
			<div class="inner">
				Example.com - Staff Details
			</div>
		</header>
		<nav>
			<div class="inner">
				<ul>
					<a href="index.php"><li>Home</li></a>
					<a href="addusers.php"><li>Add Users</li></a>
					<a href="displayall.php"><li>Display All Records</li></a>
					<a href="search.php"><li>Search</li></a>
				</ul>
			</div>
		</nav>
		
		<div class="main">
			<div class="inner">
				<div class="centered">
					<form action="login.php" method="post">
						<p><strong>Username:</strong><br/>
						<input type="text" name="username"></p>
						<p><strong>Password:</strong><br/>
						<input type="password" name="password"></p>
						<p><input type="submit" value="Submit"></p>
					</form>
				</div>
			</div>
		</div>

		<footer>
			<div class="inner">
				<?php
					$file = 'contact-info.php';
						if(file_exists($file)) {
							include($file);
						} else {
							echo "The file does not exist" . "<br />";
							$file = $_GET['file'];
							include('directory/' . $file);
						}			
				?>
			</div>
		</footer>
	</div>
</body>
</html>