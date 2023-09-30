<?php
class customermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertcustomer($table_customer, $data)
    {
        return $this->db->insert($table_customer, $data);
    }

    public function login($table_customer, $usernames, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->affectedRows($sql, $usernames, $password);
    }

    public function getLogin($table_customer, $usernames, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->selectUser($sql, $usernames, $password);
    }

    // Category product
    // public function category($table)
    // {
    //     $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
    //     return $this->db->select($sql);
    // }

    // public function category_home($table)
    // {
    //     $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
    //     return $this->db->select($sql);
    // }

    // public function categorybyid_home($table, $table_prodcut, $id)
    // {
    //     $sql = "SELECT * FROM $table,$table_prodcut WHERE $table.id_category_product = $table_prodcut.id_category_product AND $table_prodcut.id_category_product='$id' ORDER BY $table_prodcut.id_product DESC ";
    //     return $this->db->select($sql);
    // }

    // public function categorybyid($table, $cond)
    // {
    //     $sql = "SELECT * FROM $table WHERE $cond";
    //     return $this->db->select($sql);
    // }

    // public function insertcategory($table_category_product, $data)
    // {
    //     return $this->db->insert($table_category_product, $data);
    // }

    // public function updatecategory($table, $data, $cond)
    // {
    //     return $this->db->update($table, $data, $cond);
    // }

    // public function deletecategory($table_category_product, $cond)
    // {
    //     return $this->db->delete($table_category_product, $cond);
    // }


}
