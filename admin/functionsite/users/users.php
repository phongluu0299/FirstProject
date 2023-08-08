<?php 
include_once $root_path."/admin/controller/UsersController.php";

$user = new Users();
$user->fullname = "Phạm Lê Phong Lưu";
$user->username = "phongluu";
$user->password = "123456";
$user->email = "phongluu@gmail.com";
$user->gender = 1;
$user->phone = "0123456789";

var_dump($user);
// $user->InsertRecord($user->GetBaseColumn(),$user->ConvertBaseArray());
?>