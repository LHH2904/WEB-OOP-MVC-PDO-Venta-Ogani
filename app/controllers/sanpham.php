<?php
class sanpham extends Dcontroller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->all();
    }

    public function all()
    {
        $table = "tbl_category_product";
        $table_prodcut = "tbl_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        $data['list_product'] = $categorymodel->list_product_home($table_prodcut);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('list_product', $data);
        $this->load->view('footer');
    }

    public function danhmuc($id)
    {
        $table = "tbl_category_product";
        $table_prodcut = "tbl_product";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['categorybyid'] = $categorymodel->categorybyid_home($table, $table_prodcut, $id);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('categoryproduct', $data);
        $this->load->view('footer');
    }

    public function chitietsanpham($id)
    {
        $table = "tbl_category_product";
        $table_prodcut = "tbl_product";
        $cond = "$table_prodcut.id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['details_product'] = $categorymodel->details_product_home($table_prodcut, $cond);
        foreach ($data['details_product'] as $cate) {
            $id_cate = $cate['id_category_product'];
        }
        $cond_related = "$table_prodcut.id_category_product=$table.id_category_product AND $table.id_category_product='$id_cate' AND $table_prodcut.id_product NOT IN ('$id')";
        $data['related'] = $categorymodel->related_product_home($table, $table_prodcut, $cond_related);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('details_product', $data);
        $this->load->view('footer');
    }
}
