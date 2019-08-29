<?php
include("config.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql .= "INSERT INTO StaffDetails (firstname, lastname, position, phone, email)
VALUES ('Mary', 'Moe', 'CEO', '46478415155456', 'mary@example.com');";
$sql .= "INSERT INTO StaffDetails (firstname, lastname, position, phone, email)
VALUES ('Julie', 'Dooley', 'Human Resources', '46457131654', 'julie@example.com')";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>