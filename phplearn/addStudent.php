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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students (name, age, registration_number) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $name, $age, $registration_number);

// Set parameters and execute
$name = $_POST['name'];
$age = $_POST['age'];
$registration_number = $_POST['registration_number'];
$stmt->execute();

echo "New student added successfully";

$stmt->close();
$conn->close();
?>
