<?php
    class SizeModel extends BaseModel{
        const TABLE = 'size';
        public function getIdSizeByIdSanPham($id){
            $sql = "SELECT idSize FROM chitietsanpham WHERE idSanPham = '$id'";
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row['idSize']);
            }
            // return obj chứa id;
            return $data;
        }
        public function getTenSizeByIdSanPham($id){
            $arrStringIdMau = [];
            foreach($this->getIdSizeByIdSanPham($id) as $value){
                array_push($arrStringIdMau, "'$value'");
            }
            $toStringArrStringIdMau = implode(', ', $arrStringIdMau);
            $sql = "SELECT tenSize FROM size WHERE idSize IN ($toStringArrStringIdMau)";
            // die($sql);
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row['tenSize']);
            }
            return $data;
        }
    }