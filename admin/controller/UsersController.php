<?php 

class Users extends BASE{
    public $model = "users";
    public $id = "ID"; //int
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
}

?>