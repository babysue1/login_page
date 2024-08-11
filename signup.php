<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if all fields are filled
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate password
    if (strlen($password) < 5 || 
        !preg_match("/[A-Z]/", $password) || 
        !preg_match("/[0-9]/", $password) || 
        !preg_match("/[\W]/", $password)) {
        die("Password must be at least 5 characters long, contain at least one uppercase letter, one number, and one special character.");
    }

    // Save user data in a text file
    $user_data = $username . "," . $email . "," . password_hash($password, PASSWORD_DEFAULT) . "\n";
    file_put_contents('users.txt', $user_data, FILE_APPEND);

    echo "Signup successful! You can now <a href='login.html'>login</a>.";
}
?>
