<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "student_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$registration_number = $_POST['registration_number'];

// Prepare and execute the update query
$sql = "UPDATE students SET name = '$name', age = '$age', registration_number = '$registration_number' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Student details updated successfully.";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

// Redirect back to the students list or edit page
header("Location: view_students.php"); // Adjust to your list page
exit();
?>
