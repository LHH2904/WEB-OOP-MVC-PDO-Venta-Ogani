<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>CODE ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT</th>
                    <th>TÌNH TRẠNG</th>
                    <th>QUẢN LÝ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($order as $ord) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $ord['order_code']; ?></td>
                        <td><?php echo $ord['order_date']; ?></td>
                        <td><?php if ($ord['order_status'] == 0) {
                                echo 'Đơn hàng mới';
                            } else {
                                echo 'Đã xử lý';
                            } ?></td>
                        <td>
                            <a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code']; ?>">Xem đơn
                                hàng</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span style="color:blue; font-weight:bold">' . $value . '</span>';
            }
        }
        ?>
    </div>