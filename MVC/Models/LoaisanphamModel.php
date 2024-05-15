<?php 
    class LoaisanphamModel extends BaseModel
    {
        const TABLE = "loaisanpham";
        public function getAll_loaisanpham($column = ['*'], $order = [], $limit = 15)
        {
            return $this->getAll(self::TABLE, $column, $order, $limit);
        }
    }
?>