<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục hàng hóa</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <?php
        foreach ($categorybyid as $cate) {
            extract($cate);
            echo '
            <form class="bg-light p-4 m-1" action="' . BASE_URL . '/product/update_category/' . $id_category_product . '"
            method="post">
            <div class="form-group">
                <label for="tenloai">Tên danh mục</label>
                <input type="text" class="form-control" name="title_category_product" id="tenloai"
                    value="' . $title_category_product . '">
            </div>
            <div class="form-group">
                <label for="mota">Mô tả danh mục</label>
                <textarea type="text" class="form-control" style="resize: none;" name="desc_category_product" id="mota"
                    rows="5">' . $desc_category_product . '</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="CẬP NHẬT" class="btn btn-success">
            </div>
            </form>
        ';
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