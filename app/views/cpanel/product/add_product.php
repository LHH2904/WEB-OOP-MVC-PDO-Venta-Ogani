<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <form class="bg-light p-4 m-1" action="<?php echo BASE_URL ?>/product/insert_product" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenloai">Tên sản phẩm</label>
                <input type="text" class="form-control" name="title_product" id="tenloai">
            </div>
            <div class="form-group">
                <label for="img">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" name="img_product" id="img">
            </div>
            <div class="form-group">
                <label for="gia">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price_product" id="gia">
            </div>
            <div class="form-group">
                <label for="soluong">Số lượng sản phẩm</label>
                <input type="text" class="form-control" name="quantity_product" id="soluong">
            </div>
            <div class="form-group">
                <label for="mota">Danh mục sản phẩm</label>
                <select name="cate_product" class="form-control">
                    <?php
                    foreach ($category as $cate) {
                        extract($cate);
                        echo '
                            <option value="' . $id_category_product . '">' . $title_category_product . '</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mota">Mô tả sản phẩm</label>
                <textarea class="form-control" name="desc_product" style="resize: none;" id="mota" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="mota">Sản phẩm hot</label>
                <select name="product_hot" class="form-control">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="THÊM MỚI SẢN PHẨM" class="btn btn-success">
            </div>
        </form>
        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span style="color:blue; font-weight:bold">' . $value . '</span>';
            }
        }
        ?>
    </div>