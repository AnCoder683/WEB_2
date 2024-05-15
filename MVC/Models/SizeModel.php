<?php
    class SizeModel extends BaseModel{
        public function getSizeByIdSize($idSize){
            $sql = "SELECT * FROM size WHERE idSize = '$idSize'";
            // die($sql);
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }
    }