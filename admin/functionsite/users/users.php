<?php 
include_once $root_path."/admin/controller/UsersController.php";

$fullname = "";
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
     $fullname = $_GET['FullName'];
     $username = $_GET['UserName'];
     $email   = $_GET['Email'];

}

$arr_search = array(
   'FULLNAME' => $fullname,
   'USERNAME' => $username,
   'EMAIL' => $email
);


$listuser = new Users;
$listdata = $listuser->GetListUser($arr_search);
?>