<?php 
$root_path = $_SERVER['DOCUMENT_ROOT'] . "/FirstProject";
include_once $root_path . "/admin/controller/UsersController.php";
include_once $root_path . "/admin/function/function.php";
$check = false;
$user = new Users();
$userid = 0;

try{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $userid = $_GET['UserID'];
    }
    
    $check = $user->DeleteRecord($userid);
}catch(Exception $ex){
    $check = false;
}
if($check){
    ShowNotify(true,"Xóa người dùng thành công");
}else{
    ShowNotify(false,"Có lỗi trong quá trình thực hiện");
}
Redirect("users");
?>