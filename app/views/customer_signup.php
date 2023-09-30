<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Đăng ký</h2>
                </div>
            </div>
        </div>
        <form action="<?php echo BASE_URL ?>/user/insert_dangky" method="post">
            <div class="row">
                <div class="col-lg-10 col-md-12 ml-auto">
                    <label for="">Họ và tên</label>
                    <input type="text" placeholder="Your Name" name="txtName" required>
                </div>
                <div class="col-lg-10 col-md-12 ml-auto">
                    <label for="">Email</label>
                    <input type="text" placeholder="Your Email" name="txtEmail" required>
                </div>
                <div class="col-lg-10 col-md-12 ml-auto">
                    <label for="">Password</label>
                    <input type="text" placeholder="Your Password" name="txtPassword" required>
                </div>
                <div class="col-lg-10 col-md-12 ml-auto">
                    <label for="">Số điện thoại</label>
                    <input type="number" placeholder="Your Phone Number" name="txtNumber" required>
                </div>
                <div class="col-lg-10 col-md-12 ml-auto">
                    <label for="">Địa chỉ</label>
                    <input type="text" placeholder="Your Address" name="txtAddress" required>
                </div>
                <div class="col-lg-4 text-center m-auto">
                    <input type="submit" class="btn btn-success text-white" value="Register" name="dangky">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue; font-weight:bold">' . $value . '</span>';
    }
}
?>
<!-- Contact Form End -->