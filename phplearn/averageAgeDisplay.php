<?php
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "student_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT AVG(age) AS average_age FROM students";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "The average age of students is: " . $row['average_age'];

$conn->close();
?>
