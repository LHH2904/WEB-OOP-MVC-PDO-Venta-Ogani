<?php
class order extends Dcontroller
{
    public function __construct()
    {
        Session::checkSession();
        parent::__construct();
    }
    public function index()
    {
        $this->order();
    }
    public function order()
    {
        $table_order = 'tbl_order';
        $ordermodel = $this->load->model('ordermodel');
        $data['order'] = $ordermodel->list_order($table_order);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/order/order', $data);
        $this->load->view('cpanel/footer');
    }

    public function order_details($order_code)
    {

        $table_order_detail = 'tbl_order_detail';
        $table_product = 'tbl_product';
        $ordermodel = $this->load->model('ordermodel');
        $cond = "$table_product.id_product = $table_order_detail.product_id AND $table_order_detail.order_code = $order_code";
        $cond2 = "$table_order_detail.order_code = $order_code";
        $data['order_detail'] = $ordermodel->list_order_detail($table_order_detail, $table_product, $cond);
        $data['order_info'] = $ordermodel->list_order_info($table_order_detail, $cond2);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/order/orderdetail', $data);
        $this->load->view('cpanel/footer');
    }

    public function order_submit($order_code)
    {
        $table_order = 'tbl_order';
        $ordermodel = $this->load->model('ordermodel');
        $cond = "$table_order.order_code='$order_code'";
        $data = array(
            'order_status' => 1,
        );
        $result = $ordermodel->order_submit($table_order, $data, $cond);
        if ($result == 1) {
            $message['msg'] = 'Đã xử lý đơn hàng thành công';
            header("Location:" . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = 'Đã xử lý đơn hàng thất bại';
            header("Location:" . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
        }
    }
}
