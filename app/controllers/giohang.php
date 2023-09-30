<?php
class giohang extends Dcontroller
{

    public function __construct()
    {
        $data = array();

        parent::__construct();
    }

    public function index()
    {
        $this->giohang();
    }

    public function giohang()
    {
        Session::init();
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);

        $this->load->view('header');
        $this->load->view('hero_normal', $data);
        $this->load->view('cart');
        $this->load->view('footer');
    }

    // public function dathang()
    // {
    //     // Session::init();
    //     if (Session::get('shopping_cart') == true) {
    //         $name = $_POST['name'];
    //         $email = $_POST['email'];
    //         $phone = $_POST['phone'];
    //         $address = $_POST['address'];
    //     }
    //     $this->load->view('header');
    //     $this->load->view('hero_normal', $data);
    //     $this->load->view('cart');
    //     $this->load->view('footer');
    // }

    public function themgiohang()
    {
        Session::init();

        if (isset($_SESSION['shopping_cart'])) {
            $available = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['product_id']) {
                    $available++;
                    $_SESSION['shopping_cart'][$key]['product_quantity'] = $_SESSION['shopping_cart'][$key]['product_quantity'] + $_POST['product_quantity'];
                }
            }
            if ($available == 0) {
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_title' => $_POST['product_title'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity'],
                );
                $_SESSION["shopping_cart"][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST['product_id'],
                'product_title' => $_POST['product_title'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity'],
            );
            $_SESSION["shopping_cart"][] = $item;
        }
        header("Location:" . BASE_URL . "/giohang");
    }

    public function updategiohang()
    {
        Session::init();
        if (isset($_POST['delete_cart'])) {
            if (isset($_SESSION['shopping_cart'])) {
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION['shopping_cart'][$key]);
                    }
                }
                header("Location:" . BASE_URL . "/giohang");
            } else {
                header("Location:" . BASE_URL);
            }
        } else {
            foreach ($_POST['qty'] as $key => $qty) {
                foreach ($_SESSION['shopping_cart'] as $session => $value) {
                    if ($value['product_id'] == $key && $qty >= 1) {
                        $_SESSION['shopping_cart'][$session]['product_quantity'] = $qty;
                    } else if ($value['product_id'] == $key && $qty <= 0) {
                        unset($_SESSION['shopping_cart'][$session]);
                    }
                }
            }
            header("Location:" . BASE_URL . "/giohang");
        }
    }

    // public function checkout()
    // {
    //     Session::init();
    //     $table = "tbl_category_product";
    //     $categorymodel = $this->load->model('categorymodel');
    //     $data['category'] = $categorymodel->category_home($table);






    //     $this->load->view('header');
    //     $this->load->view('hero_normal', $data);
    //     $this->load->view('checkout', $_SESSION["shopping_cart"]);
    //     $this->load->view('footer');
    // }

    public function dathang()
    {
        Session::init();
        // form
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $content = $_POST["noidung"];
        $table_order = "tbl_order";
        $table_order_detail = "tbl_order_detail";
        $ordermodel = $this->load->model('ordermodel');

        $order_code = rand(0, 9999);

        date_default_timezone_set('asia/ho_chi_minh');
        $date = date("d/m/Y");
        $hour = date("h:i:sa");
        $order_date = $date . ' ' . $hour;
        $data_order = array(
            'order_status' => '0',
            'order_date' => $order_date,
            'order_code' => $order_code,
        );
        $result_order = $ordermodel->insert_order($table_order, $data_order);
        if (Session::get('shopping_cart') == true) {

            foreach (Session::get('shopping_cart') as $key => $value) {

                $data_details = array(
                    'order_code' => $order_code,
                    'product_id' => $value['product_id'],
                    'product_quantity' => $value['product_quantity'],
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'noidung' => $content,
                );
                $result_order_detail = $ordermodel->insert_order_detail($table_order_detail, $data_details);
            }
            unset($_SESSION['shopping_cart']);
        }
        header("Location:" . BASE_URL . "/index/camon");
    }
}
