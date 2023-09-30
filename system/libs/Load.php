<?php
class Load
{
    protected $load = array();
    public function __construct()
    {
    }

    public function view($filename, $data = false)
    {
        if ($data == true) {
            extract($data);
        }
        include 'app/views/' . $filename . '.php';
    }

    public function model($filename)
    {
        include 'app/models/' . $filename . '.php';
        return new $filename();
    }
}
