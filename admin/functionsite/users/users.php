<?php 

include_once "controller/UsersController.php";
$fullname = "";
$username = "";
$email = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
     $fullname = $_POST['FullName'];
     $username = $_POST['UserName'];
     $email   = $_POST['Email'];
}

$current_page = 1;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
   // collect value of input field
   if(isset($_GET['page'])) {
      $current_page = $_GET['page'];
   }
}

$arr_search = array(
   'FULLNAME' => $fullname,
   'USERNAME' => $username,
   'EMAIL' => $email
);


$listuser = new Users;


$limit = 1;
$count = $listuser->GetCountUser($arr_search);
$page_number = ceil($count / $limit);
$listdata = $listuser->GetListUser($arr_search, $limit,$current_page);


?> 