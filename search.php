<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Example.com - Staff Details - Welcome</title>
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
				<h3>Search information <?php echo $login_session; ?></h3> 

					<form action="results.php" method="post">
						<p><strong>Search:</strong><br/>
						<input type="text" name="search"></p>
						<p><input type="submit" value="Submit"></p>
					</form>
								
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