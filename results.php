
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
				<h3>Search results <?php echo $login_session; ?></h3> 

					<?php
					include("config.php");
					$search = $_POST["search"];

					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					//$sql = "SELECT id, firstname, lastname, position, phone, email FROM StaffDetails WHERE firstname='$search'";
					$sql = "SELECT id, firstname, lastname, position, phone, email FROM StaffDetails WHERE firstname LIKE '$search' OR lastname LIKE '$search' OR position LIKE '$search' OR phone LIKE '$search' or email LIKE '$search'";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							echo "ID: " . $row["id"]. "<br/>" . "Name: " . $row["firstname"]. " " . $row["lastname"]. "<br/>" . "Position: " . $row["position"]. "<br />" . "Phone No: " . $row["phone"]. "<br />" . "Email: " . $row["email"]."<br/><br/>";
						}
					} else {
						echo "0 results";
					}

					mysqli_close($conn);
					?>
					
					<br /><br />
								
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