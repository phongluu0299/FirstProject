<?php 


class BASE{
    public $model = "Model";
    public $id = "ID";


    public function InsertRecord($arr_col,$arr_val){
       
        $implode_col = implode(", ",$arr_col);
        $implode_val = implode(", ",$arr_val);

        $sql = "INSERT INTO ".$this->model." (".$implode_col.") VALUES (".$implode_val.")";

        if (conn->query($sql) === TRUE && mysqli_affected_rows(conn) > 0) {
           return true;
        } else {
            return false;
        }
    }

    public function UpdateRecord($id_upd,$arr_col,$arr_val){
       
        $array_col_val = array();
        for($i = 0; $i < count($arr_col);$i++){

            array_push($array_col_val,$arr_col[$i]."=".$arr_val[$i]);

        } 

        $impode_col_val = implode(", ",$array_col_val);

        $sql = "UPDATE ".$this->model." SET ".$impode_col_val." WHERE ".$this->id."=".$id_upd;
        
        
        if (conn->query($sql) === TRUE ) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteRecord($id_del){
       
        $sql = "DELETE FROM ".$this->model." WHERE ".$this->id."=".$id_del;

        if (conn->query($sql) === TRUE && mysqli_affected_rows(conn) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function GetRecordByID($id_val){
        $sql = "SELECT * FROM ".$this->model." WHERE ".$this->id."=".$id_val;
       
        return $this->ConvertCollectionToFirst($sql);
    }
    public function ConvertCollectionToFirst($sql){
        $rs = conn->query($sql);
        $rw = null;
        while ($item = $rs->fetch_array()) { 
            $rw = $item;
            break;
        };
        return $rw;
    }
}

?>