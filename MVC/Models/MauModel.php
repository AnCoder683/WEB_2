<?php
    class MauModel extends BaseModel{
        const TABLE = 'mau';
        public function getIdMauByIdSanPham($id){
            $sql = "SELECT idMau FROM chitietsanpham WHERE idSanPham = '$id'";
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row['idMau']);
            }
            // return obj chứa id;
            return $data;
        }
        public function getTenMauByIdSanPham($id){
            $arrStringIdMau = [];
            foreach($this->getIdMauByIdSanPham($id) as $value){
                array_push($arrStringIdMau, "'$value'");
            }
            $toStringArrStringIdMau = implode(', ', $arrStringIdMau);
            $sql = "SELECT tenMau FROM mau WHERE idMau IN ($toStringArrStringIdMau)";
            // die($sql);
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row['tenMau']);
            }
            return $data;
        }

        public function getMau($id){
            $data = [];
            $sql = "SELECT * FROM mau WHERE idMau  ";
        }
    }