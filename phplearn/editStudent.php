<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = "kevoh"; // Update with your MySQL password
$dbname = "student_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    console.log("Connection failed: " . $conn->connect_error);
}

// Get the student's ID from the URL
$id = $_GET['id'];
RRRRRR// Query the database for the specific student
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); // Fetch the result as an associative array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student Details</h2>

<form action="update_student.php" method="POST">
    <!-- Hidden field for student ID -->
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required><br><br>
    
    <label for="registration_number">Registration Number:</label>
    <input type="text" id="registration_number" name="registration_number" value="<?php echo $row['registration_number']; ?>" required><br><br>
    
    <input type="submit" value="Update Student">
</form>

</body>
</html>

<?php
$conn->close();
?>
