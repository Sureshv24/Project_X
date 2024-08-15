<?php
// Database configuration
$host = 'localhost'; // Hostname
$dbname = 'restaurant'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];

$email = $_POST['email'];

$message = $_POST['message'];

// Validate and sanitize input
$name = $conn->real_escape_string($name);

$email = $conn->real_escape_string($email);

$message = $conn->real_escape_string($message);

// SQL query to insert data into the database
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    $message = "MESSAGE SENT SUCCESSFULLY!!!!!";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}


echo '
<script>
       alert("Updated sucessfully!");
       window.location = "index.html";
</script>
';

// Close the connection
$conn->close();
?>


