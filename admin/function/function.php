<?php
session_start();
function ShowNotify($bool, $message)
{
    
    if ($bool) {
        $_SESSION["alert"] = true;
        
        $_SESSION["message"] = $message;
       
    } else {
        $_SESSION["alert"] = false;
        $_SESSION["message"] = $message;
    }
}
function CheckNotify()
{
    if (isset($_SESSION["alert"]) && isset($_SESSION["message"])) {
        if ($_SESSION["alert"] == true) {
            echo " <script> toastr.success('" . $_SESSION["message"] . "') ; </script>";
        } else {
            echo " <script> toastr.error('" . $_SESSION["message"] . "'); </script>";
        }
         unset($_SESSION["alert"]);
         unset($_SESSION["message"]);

    }
}
function Redirect($view) 
{
    header("Location: ../../?component=".$view);
     exit();
}
?>