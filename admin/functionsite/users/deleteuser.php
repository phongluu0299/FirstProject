<?php 

include_once "../../controller/UsersController.php";
include_once "../../function/function.php";
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