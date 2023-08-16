<?php 
include_once "BaseController.php";
class Category extends BASE{
    public $model = "category";
    public $id = "CategoryID"; //int
    public $categoryname; //string
    public $categoryimage; //string
    public function GetBaseColumn(){
        return array("CategoryName","CategoryImage");
    }
    public function ConvertBaseArray(){
        return array("'".$this->categoryname."'","'".$this->categoryimage."'");
    }

    public function GetListCategory($arr_search,$limit,$current_page){
        try{
            $start = ($current_page - 1) * $limit;
            $sql = "SELECT * FROM ".$this->model." WHERE 1=1";

            if(array_key_exists('CATEGORYNAME', $arr_search) && $arr_search['CATEGORYNAME'] != ""){
                $sql .= " AND CategoryName LIKE '%".$arr_search['CATEGORYNAME']."%'";
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
            
            $result = conn->query($sql);

            $rw = null;
            while ($item = $result->fetch_array()) { 
                $rw = $item["COUNT"];
                break;
            };
            return $rw;
        }catch(Exception $ex){
            return null;
        }
    }
}

?>