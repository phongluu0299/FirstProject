<?php 
include "../../function/connect.php";
include_once "../../controller/UsersController.php";

$user = new Users();
$userid = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
     $userid = $_POST['UserID'];
}
$data = $user->GetRecordByID($userid);

echo json_encode($data);
?>