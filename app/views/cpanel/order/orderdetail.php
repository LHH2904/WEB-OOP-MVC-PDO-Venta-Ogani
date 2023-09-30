<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">CHI TIẾT ĐƠN HÀNG</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>Tên người đặt</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($order_info as $ord) {
                ?>
                <tr>
                    <td><?php echo $ord['name']; ?></td>
                    <td><?php echo $ord['email']; ?></td>
                    <td><?php echo $ord['phone']; ?></td>
                    <td><?php echo $ord['address']; ?></td>
                    <td><?php echo $ord['noidung']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>SỐ LƯỢNG</th>
                    <th>ĐƠN GIÁ</th>
                    <th>TỔNG TIỀN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $total = 0;
                foreach ($order_detail as $ord) {
                    $total += $ord['price_product'] * $ord['product_quantity'];
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $ord['title_product']; ?></td>
                    <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?= $ord['img_product']; ?>" width="100"
                            height="100">
                    </td>
                    <td><?php echo $ord['product_quantity']; ?></td>
                    <td><?php echo number_format($ord['price_product'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($ord['price_product'] * $ord['product_quantity'], 0, ',', '.'); ?></td>
                    <!-- <td>
                        <a href=" <?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code']; ?>">Xem đơn
                            hàng</a>
                        </td> -->
                </tr>
                <?php
                }
                ?>
                <form action="<?php echo BASE_URL; ?>/order/order_submit/<?php echo $ord['order_code']; ?>"
                    method="post">
                    <tr>
                        <td><input type="submit" name="update_order" value="Đã xử lý" class="btn btn-success"></td>
                        <td colspan="6" align="right">Tổng tiền: <?php echo number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>