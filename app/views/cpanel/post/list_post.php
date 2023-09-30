<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH BÀI VIẾT</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TIÊU ĐỀ BÀI VIẾT</th>
                    <th>HÌNH</th>
                    <th>DANH MỤC</th>
                    <th>QUẢN LÝ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($post as $pos) {
                    extract($pos);
                    $i++;
                    echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td>' . $title_post . '</td>
                        <td><img src="' . BASE_URL . '/public/uploads/post/' . $img_post . '" height="100" width="100"></td>
                        <td>' . $title_category_post . '</td>
                        <td>
                            <a href="' . BASE_URL . '/post/delete_post/' . $id_post . '"><input type="button" value="Xóa" class="btn btn-success"></a>
                            <a href="' . BASE_URL . '/post/edit_post/' . $id_post . '"><input type="button" value="Sửa" class="btn btn-warning"></a>
                        </td>
                    </tr>
                    ';
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