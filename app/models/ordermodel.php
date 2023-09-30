<?php
class ordermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_order($table_order, $data_order)
    {
        return $this->db->insert($table_order, $data_order);
    }

    public function insert_order_detail($table_order_detail, $data_details)
    {
        return $this->db->insert($table_order_detail, $data_details);
    }

    public function list_order($table_order)
    {
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
        return $this->db->select($sql);
    }

    public function list_order_detail($table_order_detail, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_order_detail,$table_product WHERE $cond ";
        return $this->db->select($sql);
    }

    public function list_order_info($table_order_detail, $cond2)
    {
        $sql = "SELECT * FROM $table_order_detail WHERE $cond2 LIMIT 1 ";
        return $this->db->select($sql);
    }

    public function order_submit($table_order, $data, $cond)
    {
        return $this->db->update($table_order, $data, $cond);
    }
}
