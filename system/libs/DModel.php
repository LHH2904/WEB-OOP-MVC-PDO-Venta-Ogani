<?php
class DModel
{
    protected $db = array();

    public function __construct()
    {
        $dburl = "mysql:host=localhost;dbname=pdo_mvc_asm_php2;charset=utf8";
        $username = 'root';
        $password = '';
        $this->db = new Database($dburl, $username, $password);
    }
}
