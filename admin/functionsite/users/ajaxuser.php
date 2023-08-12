<?php 
include_once $root_path."/admin/controller/UsersController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
     $userid = $_GET['UserID'];
}
?>