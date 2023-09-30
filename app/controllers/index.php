<?php
class index extends Dcontroller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {

        $this->homepage();
    }

    public function homepage()
    {
        $table = "tbl_category_product";
        $table_product = "tbl_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['product'] = $categorymodel->list_product_index($table_product);

        $this->load->view('header');
        $this->load->view('hero_index', $data);
        $this->load->view('home', $data);
        $this->load->view('footer');
    }

    public function lienhe()
    {
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function notfound()
    {
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('404');
        $this->load->view('footer');
    }

    public function camon()
    {
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('camon');
        $this->load->view('footer');
    }
}
