<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật bài viết</h1>
    </div>

    <!-- Content Row -->
    <div class="col-md-6">
        <?php
        foreach ($postbyid as $pro) {
            extract($pro);
        ?>
            <form class="bg-light p-4 m-1" action="<?php echo BASE_URL ?>/post/update_post/<?= $id_post ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tenloai">Tên bài viết</label>
                    <input type="text" class="form-control" name="title_post" id="tenloai" value="<?= $title_post ?>">
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh bài viết</label>
                    <input type="file" class="form-control" name="img_post" id="img" value="<?= $img_post ?>">
                    <p><img src="<?= BASE_URL ?>/public/uploads/post/<?= $img_post ?>" height="100" width="100"></p>
                </div>
                <div class="form-group">
                    <label for="mota">Danh mục bài viết</label>
                    <select name="cate_post" class="form-control">
                        <?php
                        foreach ($category as $cate) {
                        ?>
                            <option <?php if ($cate['id_category_post'] == $id_category_post) {
                                        echo 'selected';
                                    }
                                    ?> value="<?= $cate['id_category_post'] ?>">
                                <?= $cate['title_category_post'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mota">Nội dung bài viết</label>
                    <textarea class="form-control" name="content_post" style="resize: none;" id="mota" rows="10"><?= $content_post ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="CẬP NHẬT BÀI VIẾT" class="btn btn-success">
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