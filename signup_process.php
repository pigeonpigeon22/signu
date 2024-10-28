<?php
$servername = "localhost"; // Your database server
$username = "username"; // Your database username
$password = "password"; // Your database password
$dbname = "sql2311013"; // Your database name

// Create connection
$conn = new mysqli($localhost, $sql2311013, $test, $sql2311013);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Password encryption
$encryptedPassword = password_hash($test, PASSWORD_BCRYPT);

// Check if passwords match
if ($password !== $confirmPassword) {
    echo '<script>
            document.getElementById("error-message").innerText = "Passwords do not match";
          </script>';
    exit();
}

// Insert data into the database
$sql = "INSERT INTO users (fullName, email, password) VALUES ('$fullName', '$email', '$encryptedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>