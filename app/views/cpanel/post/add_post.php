<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới bài viết</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <form class="bg-light p-4 m-1" action="<?php echo BASE_URL ?>/post/insert_post" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenloai">Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="title_post" id="tenloai">
            </div>
            <div class="form-group">
                <label for="img">Hình ảnh bài viết</label>
                <input type="file" class="form-control" name="img_post" id="img">
            </div>

            <div class="form-group">
                <label for="mota">Danh mục bài viết</label>
                <select name="cate_post" class="form-control">
                    <?php
                    foreach ($category as $cate) {
                        extract($cate);
                        echo '
                            <option value="' . $id_category_post . '">' . $title_category_post . '</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mota">Chi tiết bài viết</label>
                <textarea class="form-control" name="content_post" style="resize: none;" id="mota" rows="10"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="THÊM BÀI VIẾT" class="btn btn-success">
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