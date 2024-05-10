<?php 
    class LoaisanphamModel extends BaseModel
    {
        const TABLE = "loaisanpham";
        public function getAll_loaisanpham($column = ['*'], $order = [], $limit = 15)
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

        public function update_loaisanpham($data, $id)
        {
            return $this->update(self::TABLE, $data, $id);
        }

        public function find_loaisanpham($id)
        {
            return $this->findById(self::TABLE, $id);
        }
    }
?>