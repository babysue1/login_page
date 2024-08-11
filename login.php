<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if all fields are filled
    if (empty($username) || empty($password)) {
        die("All fields are required.");
    }

    // Check credentials against saved user data
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);

    foreach ($users as $user) {
        list($saved_username, $saved_email, $saved_password) = explode(",", $user);

        if ($username === $saved_username && password_verify($password, $saved_password)) {
            echo "Login successful. Welcome, " . htmlspecialchars($username) . "!";
            exit;
        }
    }

    die("Invalid username or password.");
}
?>
