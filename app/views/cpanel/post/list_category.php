<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH DANH MỤC BÀI VIẾT</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered table-info">
            <thead>
                <tr>
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>MÔ TẢ</th>
                    <th>QUẢN LÝ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($category as $cate) {
                    extract($cate);
                    $i++;
                    echo '
                <tr>
                    <td>' . $i . '</td>
                    <td>' . $title_category_post . '</td>
                    <td>' . $desc_category_post . '</td>
                    <td>
                        <a href="' . BASE_URL . '/post/delete_category/' . $id_category_post . '"><input type="button" value="Xóa" class="btn btn-success"></a>
                        <a href="' . BASE_URL . '/post/edit_category/' . $id_category_post . '"><input type="button" value="Sửa" class="btn btn-warning"></a>
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