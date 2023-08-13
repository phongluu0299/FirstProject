<?php 
include_once $root_path."/admin/controller/BaseController.php";
class Users extends BASE{
    public $model = "users";
    public $id = "UserID"; //int
    public $fullname; //string
    public $username; //string
    public $password; //string
    public $email; //string
    public $phone; //string
    public $gender; //tinyint
    public function GetBaseColumn(){
        return array("FullName","UserName","Password","Email","Phone","Gender");
    }
    public function ConvertBaseArray(){
        return array("'".$this->fullname."'","'".$this->username."'","'".$this->password."'","'".$this->email."'","'".$this->phone."'",$this->gender);
    }

    public function GetListUser($arr_search){
        try{
            $sql = "SELECT FullName, UserName, Email,Phone,UserID FROM ".$this->model." WHERE 1=1";

            if(array_key_exists('FULLNAME', $arr_search) && $arr_search['FULLNAME'] != ""){
                $sql .= " AND FullName LIKE '%".$arr_search['FULLNAME']."%'";
            }
            if(array_key_exists('USERNAME', $arr_search) && $arr_search['USERNAME'] != ""){
                $sql .= " AND UserName LIKE '%".$arr_search['USERNAME']."%'";
            }
            if(array_key_exists('EMAIL', $arr_search) && $arr_search['EMAIL'] != ""){
                $sql .= " AND Email LIKE '%".$arr_search['EMAIL']."%'";
            }
            
            $result = conn->query($sql);
            return $result;
        }catch(Exception $ex){
            return null;
        }
    }
}

?>