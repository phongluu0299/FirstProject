<?php 
$root_path = $_SERVER['DOCUMENT_ROOT'] . "/FirstProject";
include_once $root_path . "/admin/controller/UsersController.php";
$user = new Users();
$userid = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
     $userid = $_POST['UserID'];
}
$data = $user->GetRecordByID($userid);

echo json_encode($data);
?>