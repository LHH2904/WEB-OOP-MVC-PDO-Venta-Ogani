<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới danh mục hàng hóa</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <form class="bg-light p-4 m-1" action="<?php echo BASE_URL ?>/product/insert_category" method="post">
            <div class="form-group">
                <label for="tenloai">Tên danh mục</label>
                <input type="text" class="form-control" name="title_category_product" id="tenloai">
            </div>
            <div class="form-group">
                <label for="mota">Mô tả danh mục</label>
                <input type="text" class="form-control" name="desc_category_product" id="mota">
            </div>
            <div class="form-group">
                <input type="submit" value="THÊM MỚI" class="btn btn-success">
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