<?php 
    class PhieunhapModel extends BaseModel
    {
        const TABLE = "donnhap";
        public function getAll_phieunhap($column = ['*'], $order = [], $limit = 15)
        {
            return $this->getOrderBy(self::TABLE, $column, $order, $limit);
        }
        // public function insert($table, $data){
        //     $cols = implode(', ', array_keys($data));
        //     $arrayVal = [];
        //     foreach($data as $key => $value){
        //         array_push($arrayVal, "'$value'");
        //     }
        //     $vals = implode(', ', $arrayVal);
        //     $sql = "INSERT INTO $table($cols) VALUES($vals)";
        //     $this->_query($sql);
        // }

        public function add_loaisanpham($data)
        {
            return $this->insert(self::TABLE ,$data);
        }
    }