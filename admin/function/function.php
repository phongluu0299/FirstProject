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
function CreatePaginate($page_number,$current_page){

    $html = "<ul class='pagination pagination-sm m-0 float-right'>";
    
    $page_number_show = 5;
    if($current_page > $page_number || $current_page < 1){
        $current_page = 1;
    }

    $count_li = 0;
    if($current_page > 1){
        $html .= "<li class='page-item'><a class='page-link' href='?component=users&page=".($current_page- 1)."'>«</a></li>";
    }

    $start = (($current_page - 2) > 1) ? ($current_page - 2) : 1;

    if($page_number - $start < $page_number_show - 1){
        $start -= ($page_number_show - 1) - ($page_number - $start);
    }
    for($i = $start ;$i <= $page_number;$i++)
    {
        if($count_li == $page_number_show){
            break;
        }
       if($i > 0){
        $html .= "<li class='page-item ".(($current_page == $i) ? "active" : "") ."'><a class='page-link' href='?component=users&page=".$i."'>".$i."</a></li>";
       }
        $count_li++;
    }
   
    if($current_page < $page_number){
        $html .= "<li class='page-item'><a class='page-link' href='?component=users&page=".($current_page + 1)."'>»</a></li>";
    }

    $html .= "</ul>";

    return $html;
}
?>