<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute query
    $sql = "SELECT * FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.html"); // Redirect to a welcome page
            exit();
        } else {
            echo "Invalid password.";
            header("Location: restaurant/index.html");
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>
