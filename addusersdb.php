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
				<h3>User Added <?php echo $login_session; ?></h3> 

					<?php
					include("config.php");

					$firstname = $_POST["firstname"];
					$lastname = $_POST["lastname"];
					$position = $_POST["position"];
					$phone = $_POST["phone"];
					$email = $_POST["email"];

					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "INSERT INTO StaffDetails (firstname, lastname, position, phone, email)
					VALUES ('$firstname', '$lastname', '$position', '$phone', '$email')";

					if (mysqli_query($conn, $sql)) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}

					mysqli_close($conn);
					?>
					
					<br /><br />
				
				<button onclick="goBack()">Go Back</button>
					<script>
					function goBack() {
					  window.history.back();
					}
					</script>
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
