<?php const conn = new mysqli("localhost", "root", "", "firstproject");

// Check connection
if (conn->connect_errno) {
     echo "Failed to connect to MySQL: " . conn->connect_error;
   exit();
}
?>