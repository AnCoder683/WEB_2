<?php
    class MauModel extends BaseModel{
        public function getMauByIdMau($idMau){
            $sql = "SELECT * FROM mau WHERE idMau = '$idMau'";
            // die($sql);
            $query = $this->_query($sql);
            return $this->_getObjData($query);
        }
    }