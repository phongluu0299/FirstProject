<?php
include "../../function/connect.php";
include_once "../../controller/UsersController.php";
include_once "../../function/function.php";
$check = false;
$message = "";
$user = new Users();
try {
    $id = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $user->fullname = $_POST['FullName'];
        $user->username = $_POST['UserName'];
        $user->password = $_POST['Password'];
        $user->email = $_POST['Email'];
        $user->gender = $_POST['Gender'];
        $user->phone = $_POST['Phone'];
        $id = $_POST['UserID'];
    }

    if ($id == 0) {
        $check = $user->InsertRecord($user->GetBaseColumn(), $user->ConvertBaseArray());
        $message = "Người dùng " . $user->fullname . " đã được thêm mới";
    } else {
        $check = $user->UpdateRecord($id, $user->GetBaseColumn(), $user->ConvertBaseArray());
        $message = "Người dùng " . $user->fullname . " đã được cập nhật";
    }
} catch (Exception $ex) {
    $check = false;

}
if ($check) {
    
    ShowNotify(true, $message);
} else {
   
    ShowNotify(false, "Có lỗi trong quá trình thực hiện");
}

    Redirect("users");
    ?>