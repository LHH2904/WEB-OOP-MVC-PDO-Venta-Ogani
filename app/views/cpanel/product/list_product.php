<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH SẢN PHẨM</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>SẢN PHẨM HOT</th>
                    <th>DANH MỤC</th>
                    <th>QUẢN LÝ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($product as $prod) {
                    $i++;
                    extract($prod);
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?= $title_product ?></td>
                        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?= $img_product ?>" height="100" width="100"></td>
                        <td><?= number_format($price_product, 0, ',', '.') . ' đ' ?></td>
                        <td><?= $quantity_product ?></td>
                        <td><?php
                            if ($product_hot == 0) {
                                echo 'Không có';
                            } else {
                                echo 'Có';
                            }
                            ?></td>
                        <td><?= $title_category_product ?></td>

                        <td>
                            <a href="<?php echo BASE_URL ?>/product/delete_product/<?= $id_product ?>"><input type="button" value="Xóa" class="btn btn-success"></a>
                            <a href="<?php echo BASE_URL ?>/product/edit_product/<?= $id_product ?>"><input type="button" value="Sửa" class="btn btn-warning"></a>
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