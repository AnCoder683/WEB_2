<?php
class PaginationModel extends Database{
    public function pagination($query, $limit, $offset)
    {
        $sql = "$query LIMIT $offset, $limit";
        $con = $this->connectDatabase();
        $result = mysqli_query($con, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    function getTotalPages($query, $limit)
    {
        $con = $this->connectDatabase();
        $result = mysqli_query($con, $query);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $limit);
        return $total_pages;
    }
}
?>