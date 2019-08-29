<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Example.com - Staff Details - Add Users</title>
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
					<a href="logout.php"><li>Logout</li></a>
				</ul>
			</div>
		</nav>
		
		<div class="main">
			<div class="inner">
				<h3>Add User<?php echo $login_session; ?></h3> 
				<div class="main">
					<div class="inner">
							<form action="addusersdb.php" method="post">
								<p><strong>Firstname:</strong><br/>
								<input type="text" name="firstname"></p>
								<p><strong>Lastname:</strong><br/>
								<input type="text" name="lastname"></p>
								<p><strong>Position:</strong><br/>
								<input type="text" name="position"></p>
								<p><strong>Phone No:</strong><br/>
								<input type="text" name="phone"></p>
								<p><strong>Email:</strong><br/>
								<input type="text" name="email"></p>
								<p><input type="submit" value="Submit"></p>
							</form>
					</div>
				</div>
				
				<button class="btnfloat" onclick="goBack()">Go Back</button>
					<script>
					function goBack() {
					  window.history.back();
					}
					</script>
			</div>
		</div>
		
		<br /><br />
		
		<div class="clearfix"></div>
		
		<br />

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