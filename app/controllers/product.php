6 <?php
class product extends Dcontroller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->add_category();
    }

    public function add_category()
    {  
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/product/add_category');
        $this->load->view('cpanel/footer');
    }

    public function add_product()
    {
        $this->load->view('cpanel/header');
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category($table);
        $this->load->view('cpanel/product/add_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function insert_product()
    {
        $title = $_POST['title_product'];
        $desc = $_POST['desc_product'];
        $price = $_POST['price_product'];
        $quantity = $_POST['quantity_product'];
        $category = $_POST['cate_product'];
        $hot = $_POST['product_hot'];
        $img = $_FILES['img_product']['name'];
        $tmp_img = $_FILES['img_product']['tmp_name'];

        $div = explode('.', $img);
        $file_ext = strtolower(end($div));
        $unique_img = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/product/" . $unique_img;

        $table = "tbl_product";
        $data = array(
            'title_product' => $title,
            'price_product' => $price,
            'desc_product' => $desc,
            'quantity_product' => $quantity,
            'img_product' => $unique_img,
            'id_category_product' => $category,
            'product_hot' => $hot,
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertproduct($table, $data);
        if ($result == 1) {
            move_uploaded_file($tmp_img, $path_uploads);
            $message['msg'] = 'Thêm sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/add_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Thêm sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/add_product?msg=" . urlencode(serialize($message)));
        }
    }

    public function insert_category()
    {
        $title = $_POST['title_category_product'];
        $desc = $_POST['desc_category_product'];
        $table = "tbl_category_product";
        $data = array(
            'title_category_product' => $title,
            'desc_category_product' => $desc
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->insertcategory($table, $data);
        if ($result == 1) {
            $message['msg'] = 'Thêm danh mục sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Thêm danh mục sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }

    public function list_product()
    {
        $this->load->view('cpanel/header');

        $table_product = "tbl_product";
        $table_category = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->product($table_product, $table_category);
        $this->load->view('cpanel/product/list_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function delete_product($id)
    {
        $table = "tbl_product";
        $cond = "id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->deleteproduct($table, $cond);
        if ($result == 1) {
            $message['msg'] = 'Xóa sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Xóa sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }

    public function edit_product($id)
    {
        $table = "tbl_product";
        $table_category = "tbl_category_product";
        $cond = "id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');

        $data['productbyid'] = $categorymodel->productbyid($table, $cond);
        $data['category'] = $categorymodel->category($table_category, $cond);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/product/edit_product', $data);
        $this->load->view('cpanel/footer');
    }

    public function update_product($id)
    {
        $table = "tbl_product";
        $cond = "id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');

        $title = $_POST['title_product'];
        $desc = $_POST['desc_product'];
        $price = $_POST['price_product'];
        $quantity = $_POST['quantity_product'];
        $category = $_POST['cate_product'];
        $hot = $_POST['product_hot'];

        $img = $_FILES['img_product']['name'];
        $tmp_img = $_FILES['img_product']['tmp_name'];
        $div = explode('.', $img);
        $file_ext = strtolower(end($div));
        $unique_img = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/product/" . $unique_img;
        if ($img) {

                $data['productbyid'] = $categorymodel->productbyid($table, $cond);
                foreach ($data['productbyid'] as $value) {
                    if ($value['img_product']) {
                        unlink("public/uploads/product/" . $value['img_product']);
                    }
                }
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'img_product' => $unique_img,
                'id_category_product' => $category,
                'product_hot' => $hot,
            );
            move_uploaded_file($tmp_img, $path_uploads);
        } else {
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'id_category_product' => $category,
                'product_hot' => $hot,
            );
        }

        $result = $categorymodel->updateproduct($table, $data, $cond);
        if ($result == 1) {

            $message['msg'] = 'Cập nhật sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Cập nhật sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }

    public function list_category()
    {
        $this->load->view('cpanel/header');

        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category($table);
        $this->load->view('cpanel/product/list_category', $data);
        $this->load->view('cpanel/footer');
    }

    public function delete_category($id)
    {
        $table = "tbl_category_product";
        $cond = "id_category_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->deletecategory($table, $cond);
        if ($result == 1) {
            $message['msg'] = 'Xóa danh mục sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Xóa danh mục sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }

    public function edit_category($id)
    {
        $table = "tbl_category_product";
        $cond = "id_category_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['categorybyid'] = $categorymodel->categorybyid($table, $cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/product/edit_category', $data);
        $this->load->view('cpanel/footer');
    }

    public function update_category($id)
    {
        $table = "tbl_category_product";
        $cond = "id_category_product='$id'";

        $title = $_POST['title_category_product'];
        $desc = $_POST['desc_category_product'];
        $data = array(
            'title_category_product' => $title,
            'desc_category_product' => $desc
        );
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->updatecategory($table, $data, $cond);
        if ($result == 1) {
            $message['msg'] = 'Cập nhật danh mục sản phẩm thành công';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Cập nhật danh mục sản phẩm thất bại';
            header("Location:" . BASE_URL . "/product/list_category?msg=" . urlencode(serialize($message)));
        }
    }
}