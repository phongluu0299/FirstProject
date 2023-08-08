<?php 
$user = new Users();
$userid = 3;

$check = $user->DeleteRecord($userid);
if($check){
    ShowNotify(true,"Xóa người dùng thành công");
}else{
    ShowNotify(false,"Có lỗi trong quá trình thực hiện");
}
?>