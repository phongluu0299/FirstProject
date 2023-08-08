<?php 

$conn = new mysqli("localhost", "First_Project", "123456", "firstproject");

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

?>