<?php 
include_once "BaseController.php";
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

    public function GetListUser($arr_search,$limit,$current_page){
        try{
            $start = ($current_page - 1) * $limit;
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
            $sql .= " LIMIT ".$start.", ".$limit."";
            
            $result = conn->query($sql);
            return $result;
        }catch(Exception $ex){
            return null;
        }
    }
    public function GetCountUser($arr_search){
        try{
            $sql = "SELECT COUNT(*) AS COUNT FROM ".$this->model." WHERE 1=1";

            if(array_key_exists('FULLNAME', $arr_search) && $arr_search['FULLNAME'] != ""){
                $sql .= " AND FullName LIKE '%".$arr_search['FULLNAME']."%'";
            }
            if(array_key_exists('USERNAME', $arr_search) && $arr_search['USERNAME'] != ""){
                $sql .= " AND UserName LIKE '%".$arr_search['USERNAME']."%'";
            }
            if(array_key_exists('EMAIL', $arr_search) && $arr_search['EMAIL'] != ""){
                $sql .= " AND Email LIKE '%".$arr_search['EMAIL']."%'";
            }
            
           
            $rw = $this->ConvertCollectionToFirst($sql);
            return $rw["COUNT"];
        }catch(Exception $ex){
            return null; 
        }
    }
}

?>