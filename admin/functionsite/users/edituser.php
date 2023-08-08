<?php 
$user = new Users();
$userid = 3;
$user->fullname = "Phạm Lê Phong Lưu";
$user->username = "phongluu";
$user->password = "123456";
$user->email = "phongluu@gmail.com";
$user->gender = 1;
$user->phone = "0123456789";

$check = $user->InsertRecord($user->GetBaseColumn(),$user->ConvertBaseArray());
if($check){
    ShowNotify(true,"Người dùng ".$user->fullname." đã được thêm mới");
}else{
    ShowNotify(false,"Có lỗi trong quá trình thực hiện");
}
?>