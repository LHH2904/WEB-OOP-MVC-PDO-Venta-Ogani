<?php
class user extends Dcontroller
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {

        $this->khachhang();
    }

    public function khachhang()
    {
        // $table = "tbl_category_product";
        // $table_product = "tbl_product";
        // $categorymodel = $this->load->model('categorymodel');
        // $data['category'] = $categorymodel->category_home($table);
        // $data['product'] = $categorymodel->list_product_index($table_product);

        // $this->load->view('header');
        // $this->load->view('hero_index', $data);
        // $this->load->view('home', $data);
        // $this->load->view('footer');
    }
    public function dangnhap()
    {

        $table = "tbl_category_product";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        Session::init();
        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('customer_login');
        $this->load->view('footer');
    }

    public function login_customer()
    {
        echo $usernames = $_POST['username'];
        echo $password = md5($_POST['password']);

        $table_customer = 'tbl_customers';
        $customermodel = $this->load->model('customermodel');

        $count = $customermodel->login($table_customer, $usernames, $password);

        if ($count == 0) {
            $message['msg'] = 'Email hoặc mật khẩu sai, xin vui lòng kiểm tra lại';
            header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urlencode(serialize($message)));
        } else {
            $result = $customermodel->getLogin($table_customer, $usernames, $password);
            Session::init();
            Session::set('customer', true);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('customer_id', $result[0]['customer_id']);
            $message['msg'] = 'Đăng nhập thành công';
            header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urlencode(serialize($message)));
        }
    }

    public function dangky()
    {
        $table = "tbl_category_product";

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);


        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('customer_signup');
        $this->load->view('footer');
    }

    public function insert_dangky()
    {
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtNumber'];
        $address = $_POST['txtAddress'];
        $password = $_POST['txtPassword'];

        $table_customer = "tbl_customers";
        $data = array(
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_email' => $email,
            'customer_password' => md5($password),
            'customer_address' => $address,
        );
        $customermodel = $this->load->model('customermodel');
        $result = $customermodel->insertcustomer($table_customer, $data);
        if ($result == 1) {
            $message['msg'] = 'Đăng ký thành công';
            header("Location:" . BASE_URL . "/user/dangky?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Đăng ký thất bại';
            header("Location:" . BASE_URL . "/user/dangky?msg=" . urlencode(serialize($message)));
        }
    }

    public function dangxuat()
    {
        Session::init();
        Session::destroy();
        $message['msg'] = 'Đăng xuất thành công';
        header("Location:" . BASE_URL . "/user/dangnhap?msg=" . urlencode(serialize($message)));
    }
}
