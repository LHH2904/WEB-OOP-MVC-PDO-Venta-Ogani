<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật sản phẩm</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <?php
        foreach ($productbyid as $prod) {
            extract($prod);
        ?>
        <form class="bg-light p-4 m-1" action="<?php echo BASE_URL ?>/product/update_product/<?= $id_product ?>"
            method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenloai">Tên sản phẩm</label>
                <input type="text" class="form-control" name="title_product" id="tenloai" value="<?= $title_product ?>">
            </div>
            <div class="form-group">
                <label for="img">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" name="img_product" id="img" value="<?= $img_product ?>">
                <p><img src="<?= BASE_URL ?>/public/uploads/product/<?= $img_product ?>" height="100" width="100"></p>
            </div>
            <div class="form-group">
                <label for="gia">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price_product" id="gia" value="<?= $price_product ?>">
            </div>
            <div class="form-group">
                <label for="soluong">Số lượng sản phẩm</label>
                <input type="text" class="form-control" name="quantity_product" id="soluong"
                    value="<?= $quantity_product ?>">
            </div>
            <div class="form-group">
                <label for="mota">Danh mục sản phẩm</label>
                <select name="cate_product" class="form-control">
                    <?php
                        foreach ($category as $cate) {
                        ?>
                    <option <?php if ($cate['id_category_product'] == $id_category_product) {
                                        echo 'selected';
                                    }
                                    ?> value="<?= $cate['id_category_product'] ?>">
                        <?= $cate['title_category_product'] ?></option>
                    <?php
                        }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mota">Mô tả sản phẩm</label>
                <textarea class="form-control" name="desc_product" style="resize: none;" id="mota"
                    rows="5"><?= $desc_product ?></textarea>
            </div>
            <div class="form-group">
                <label for="mota">Sản phẩm hot</label>
                <select name="product_hot" class="form-control">
                    <?php
                    if ($prod['product_hot'] == 0) {
                    ?>
                    <option selected value="0">Không</option>
                    <option value="1">Có</option>
                    <?php
                    } else {
                    ?>
                    <option value="0">Không</option>
                    <option selected value="1">Có</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="CẬP NHẬT SẢN PHẨM" class="btn btn-success">
            </div>
        </form>
        <?php
        }
        ?>

        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span style="color:blue; font-weight:bold">' . $value . '</span>';
            }
        }
        ?>
    </div>